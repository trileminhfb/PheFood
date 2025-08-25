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
        $otpExpiresAt = Carbon::now()->addMinutes(Customers::OTP_EXPIRE_MINUTES);

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

            Mail::to($customer->email)->send(
                new CustomerOtpMail(
                    $customer->name,
                    $otp,
                    $otpExpiresAt,
                    'Xác nhận đăng ký tài khoản'
                )
            );

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
}
