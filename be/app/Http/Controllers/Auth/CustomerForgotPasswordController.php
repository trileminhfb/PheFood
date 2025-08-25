<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Customers;

class CustomerForgotPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:customers,email',
            'otp' => 'required|string|size:6',
            'password' => 'required|string|min:6',
        ]);

        $customer = Customers::where('email', $validated['email'])->first();

        if (!$customer) {
            return response()->json([
                'message' => 'Không tìm thấy tài khoản với email này.',
            ], 404);
        }

        if ($customer->OTP !== $validated['otp']) {
            return response()->json([
                'message' => 'OTP không chính xác.',
            ], 422);
        }

        if (now()->greaterThan($customer->otp_expires_at)) {
            return response()->json([
                'message' => 'OTP đã hết hạn.',
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
