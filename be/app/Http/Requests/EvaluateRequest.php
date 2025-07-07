<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ID_Food' => ['required', 'exists:foods,id'],
            'ID_Customer' => ['required', 'exists:customers,id'],
            'Image' => ['nullable', 'string', 'max:255'],
            'Stars' => ['required', 'numeric', 'min:0', 'max:5'],
            'Comment' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Food.required' => 'Món ăn là bắt buộc.',
            'ID_Food.exists' => 'Món ăn không tồn tại.',
            'ID_Customer.required' => 'Khách hàng là bắt buộc.',
            'ID_Customer.exists' => 'Khách hàng không tồn tại.',
            'Stars.required' => 'Vui lòng đánh giá số sao.',
            'Stars.numeric' => 'Số sao phải là số.',
            'Stars.min' => 'Số sao phải từ 0 đến 5.',
            'Stars.max' => 'Số sao không được vượt quá 5.',
            'Image.string' => 'Ảnh phải là chuỗi đường dẫn.',
            'Comment.string' => 'Bình luận phải là dạng văn bản.',
        ];
    }
}
