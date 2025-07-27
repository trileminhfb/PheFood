<?php

use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [CustomerRegisterController::class, 'register']);
Route::post('/verify-otp', [CustomerRegisterController::class, 'verifyOtp']);
Route::post('/resend-otp', [CustomerRegisterController::class, 'resendOtp']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
