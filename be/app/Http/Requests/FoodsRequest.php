<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoodsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:foods,Name'],
            'Image_Main' => ['nullable', 'string', 'max:255'],
            'Image' => ['nullable', 'string', 'max:255'],
            'ID_Type' => ['required', 'integer', 'exists:types,id'],
            'BestSeller' => ['nullable', 'integer', Rule::in([0, 1])],
            'Status' => ['nullable', 'integer', Rule::in([0, 1])],
            'Cost' => ['required', 'integer', 'min:0'],
            'Detail' => ['nullable', 'string'],
            'Rates' => ['nullable', 'numeric', 'min:0', 'max:5'],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên món ăn là bắt buộc.',
            'Name.unique' => 'Tên món ăn đã tồn tại.',
            'ID_Type.required' => 'Loại món ăn là bắt buộc.',
            'ID_Type.exists' => 'Loại món ăn không hợp lệ.',
            'Cost.required' => 'Giá món ăn là bắt buộc.',
            'Cost.integer' => 'Giá món ăn phải là số nguyên.',
            'Rates.numeric' => 'Đánh giá phải là số.',
            'Rates.max' => 'Đánh giá không được lớn hơn 5.',
        ];
    }
}
