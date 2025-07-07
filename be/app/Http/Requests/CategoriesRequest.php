<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:categories,Name'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1])],
            'ID_Type' => ['required', 'integer', 'exists:types,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên danh mục là bắt buộc.',
            'Name.unique' => 'Tên danh mục đã tồn tại.',
            'Status.in' => 'Trạng thái danh mục không hợp lệ.',
            'ID_Type.required' => 'Loại món ăn là bắt buộc.',
            'ID_Type.exists' => 'Loại món ăn không hợp lệ.',
        ];
    }
}
