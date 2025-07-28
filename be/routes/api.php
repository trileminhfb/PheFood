<?php

use App\Http\Controllers\Auth\CustomerForgotPasswordController;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\GeminiController;
use Illuminate\Support\Facades\Route;

Route::post('/login-user', [LoginController::class, 'login']);
Route::post('/login-customer', [CustomerLoginController::class, 'login']);

Route::post('/register', [CustomerRegisterController::class, 'register']);
Route::post('/verify-otp', [CustomerRegisterController::class, 'verifyOtp']);
Route::post('/resend-otp', [CustomerRegisterController::class, 'resendOtp']);

Route::post('forgot-password', [CustomerForgotPasswordController::class, 'sendResetOtp']);
Route::post('reset-password', [CustomerForgotPasswordController::class, 'resetPassword']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout-user', [LoginController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout-customer', [CustomerLoginController::class, 'logout']);
});

Route::post('/chat', [ChatbotController::class, 'send']);
