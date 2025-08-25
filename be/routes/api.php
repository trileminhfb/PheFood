<?php

use App\Http\Controllers\Auth\CustomerForgotPasswordController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\CustomerOtpController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::post('/login-user', [UserLoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout-user', [UserLoginController::class, 'logout']);
});

Route::post('/login-customer', [CustomerLoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout-customer', [CustomerLoginController::class, 'logout']);
});

Route::post('/register', [CustomerRegisterController::class, 'register']);
Route::post('/register/verify-otp', [CustomerOtpController::class, 'verifyOtp']);
Route::post('/register/resend-otp', [CustomerOtpController::class, 'resendOtp']);

Route::post('/forgot-password', [CustomerOtpController::class, 'sendResetOtp']);
Route::post('/forgot-password/verify-otp', [CustomerOtpController::class, 'verifyResetOtp']);
Route::post('/forgot-password/reset', [CustomerForgotPasswordController::class, 'resetPassword']);
Route::post('/forgot-password/resend-otp', [CustomerOtpController::class, 'resendResetOtp']);

Route::post('/chat', [ChatbotController::class, 'send']);
