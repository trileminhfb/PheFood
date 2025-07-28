<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;


Route::get('/chatbot', [ChatbotController::class, 'index']);
Route::post('/chatbot/send', [ChatbotController::class, 'send']);
