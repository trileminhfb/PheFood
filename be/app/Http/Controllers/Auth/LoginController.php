<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Users\ActiveUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Thông tin đăng nhập không chính xác.'
            ], 401);
        }

        if ($user->is_Active === ActiveUsers::UNACTIVATED) {
            return response()->json([
                'message' => 'Tài khoản chưa được kích hoạt.'
            ], 403);
        }

        $token = $user->createToken('user_token')->plainTextToken;

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công'
        ]);
    }
}
