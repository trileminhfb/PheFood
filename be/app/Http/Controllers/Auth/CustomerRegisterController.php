<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Customers\ActiveCustomers;
use App\Enums\Customers\StatusCustomers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomersRequest;
use App\Models\Customers;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerOtpMail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CustomerRegisterController extends Controller
{
    public function register(CustomersRequest $request)
    {
        $validated = $request->validated();

        $otp = random_int(100000, 999999);
        $otpExpiresAt = Carbon::now()->addMinutes(15);

        if (Customers::where('email', $validated['email'])->exists()) {
            return response()->json([
                'message' => 'Email đã được sử dụng.',
            ], 422);
        }

        try {
            $customer = Customers::create([
                'name' => $validated['name'],
                'Image' => $validated['Image'] ?? null,
                'Phone' => $validated['Phone'],
                'Birth' => $validated['Birth'],
                'Status' => StatusCustomers::PENDING,
                'Points' => 0,
                'is_Active' => ActiveCustomers::UNACTIVATED,
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'OTP' => $otp,
                'otp_expires_at' => $otpExpiresAt,
            ]);

            Mail::to($customer->email)->send(new CustomerOtpMail($customer->name, $otp, $otpExpiresAt));

            return response()->json([
                'message' => 'Đăng ký thành công! Vui lòng kiểm tra email để xác nhận OTP.',
                'otp_expires_at' => $otpExpiresAt->toDateTimeString(),
            ], 201);
        } catch (\Exception $e) {
            Log::error('Lỗi gửi OTP: ' . $e->getMessage(), [
                'email' => $validated['email'],
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => 'Đăng ký thành công nhưng không thể gửi email xác nhận. Vui lòng thử lại sau.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:customers,email',
            'otp' => 'required|digits:6',
        ]);

        $customer = Customers::where('email', $validated['email'])->first();

        if (
            !$customer ||
            $customer->OTP !== $validated['otp'] ||
            Carbon::now()->greaterThan($customer->otp_expires_at)
        ) {
            return response()->json([
                'message' => 'Mã OTP không chính xác hoặc đã hết hạn.',
            ], 422);
        }

        try {
            $customer->update([
                'is_Active' => ActiveCustomers::ACTIVATED,
                'OTP' => null,
                'otp_expires_at' => null,
                'email_verified_at' => now(),
            ]);

            return response()->json([
                'message' => 'Tài khoản đã được kích hoạt thành công!',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Lỗi xác minh OTP: ' . $e->getMessage(), [
                'email' => $validated['email'],
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => 'Lỗi khi kích hoạt tài khoản. Vui lòng thử lại.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function resendOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:customers,email',
        ]);

        $customer = Customers::where('email', $validated['email'])->first();

        if ($customer->is_Active === ActiveCustomers::ACTIVATED) {
            return response()->json([
                'message' => 'Tài khoản đã được kích hoạt.',
            ], 422);
        }

        $otp = random_int(100000, 999999);
        $otpExpiresAt = Carbon::now()->addMinutes(15);

        try {
            $customer->update([
                'OTP' => $otp,
                'otp_expires_at' => $otpExpiresAt,
            ]);

            Mail::to($customer->email)->send(new CustomerOtpMail($customer->name, $otp, $otpExpiresAt));

            return response()->json([
                'message' => 'OTP mới đã được gửi đến email của bạn.',
                'otp_expires_at' => $otpExpiresAt->toDateTimeString(),
            ], 200);
        } catch (\Exception $e) {
            Log::error('Lỗi gửi lại OTP: ' . $e->getMessage(), [
                'email' => $validated['email'],
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'message' => 'Không thể gửi OTP mới. Vui lòng thử lại sau.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
