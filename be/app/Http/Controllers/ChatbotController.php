<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot.chatbot');
    }

    public function send(Request $request)
    {
        $message = $request->input('message');
        $systemPrompt = "Trả lời ngắn gọn, hài hước, phá cách, GenZ, trending.
        Bạn là một trợ lý ảo chuyên tư vấn của nhà hàng PheFood Restaurant.
        Chủ nhà hàng là Trí Lê Minh, Địa chỉ nhà hàng: 282 Nguyễn Văn Cừ, Hải Vân, Liên Chiểu, Đà Nẵng.";

        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";

        $response = Http::post($url, [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $systemPrompt . "\n\nCâu hỏi: " . $message]
                    ]
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Lỗi khi gọi Gemini API.',
                'error' => $response->body()
            ], $response->status());
        }

        $data = $response->json();
        $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Không có phản hồi từ Gemini.';

        return response()->json(['reply' => $reply]);
    }
}
