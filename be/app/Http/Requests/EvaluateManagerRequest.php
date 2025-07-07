<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateManagerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ID_User' => ['required', 'exists:users,id'],
            'ID_Evaluate' => ['required', 'exists:evaluates,id'],
            'Comment' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_User.required' => 'Người phản hồi là bắt buộc.',
            'ID_User.exists' => 'Người phản hồi không hợp lệ.',
            'ID_Evaluate.required' => 'Đánh giá cần phản hồi là bắt buộc.',
            'ID_Evaluate.exists' => 'Đánh giá không tồn tại.',
            'Comment.required' => 'Phản hồi không được để trống.',
            'Comment.string' => 'Phản hồi phải là văn bản.',
            'Comment.min' => 'Phản hồi cần ít nhất 3 ký tự.',
        ];
    }
}
