<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:ingredients,Name'],
            'Unit' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên nguyên liệu là bắt buộc.',
            'Name.unique' => 'Tên nguyên liệu đã tồn tại.',
            'Unit.required' => 'Đơn vị tính là bắt buộc.',
        ];
    }
}
