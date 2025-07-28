<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Customers;
use Carbon\Carbon;
use App\Mail\CustomerOtpMail;

class CustomerForgotPasswordController extends Controller
{
    public function sendResetOtp(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:customers,email',
        ]);

        $title = random_int(100000, 999999);
        $otp = random_int(100000, 999999);
        $otpExpiresAt = Carbon::now()->addMinutes(15);

        try {
            $customer = Customers::where('email', $validated['email'])->first();
            $customer->update([
                'title' => $title,
                'OTP' => $otp,
                'otp_expires_at' => $otpExpiresAt,
            ]);

            Mail::to($customer->email)->send(
                new CustomerOtpMail($customer->name, $otp, $otpExpiresAt, 'Quên mật khẩu')
            );

            return response()->json([
                'message' => 'Mã OTP đã được gửi đến email.',
                'otp_expires_at' => $otpExpiresAt->toDateTimeString(),
            ], 200);
        } catch (\Exception $e) {
            Log::error('Lỗi gửi OTP quên mật khẩu: ' . $e->getMessage());

            return response()->json([
                'message' => 'Không thể gửi OTP. Vui lòng thử lại.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:customers,email',
            'otp' => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customers::where('email', $validated['email'])->first();

        if (
            !$customer ||
            $customer->OTP !== $validated['otp'] ||
            Carbon::now()->greaterThan($customer->otp_expires_at)
        ) {
            return response()->json([
                'message' => 'Mã OTP không hợp lệ hoặc đã hết hạn.',
            ], 422);
        }

        try {
            $customer->update([
                'password' => bcrypt($validated['password']),
                'OTP' => null,
                'otp_expires_at' => null,
            ]);

            return response()->json([
                'message' => 'Mật khẩu đã được đặt lại thành công.',
            ]);
        } catch (\Exception $e) {
            Log::error('Lỗi đặt lại mật khẩu: ' . $e->getMessage());

            return response()->json([
                'message' => 'Có lỗi khi đặt lại mật khẩu.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
