<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Customers\ActiveCustomers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $customer = Customers::where('email', $credentials['email'])->first();

        if (!$customer || !Hash::check($credentials['password'], $customer->password)) {
            return response()->json([
                'message' => 'Thông tin đăng nhập không chính xác.'
            ], 401);
        }

        $token = $customer->createToken('customer_token')->plainTextToken;

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'user' => new CustomerResource($customer),
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
