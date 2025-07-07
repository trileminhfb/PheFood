<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ID_Ingredient' => ['required', 'exists:ingredients,id'],
            'Amount' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Ingredient.required' => 'Nguyên liệu là bắt buộc.',
            'ID_Ingredient.exists' => 'Nguyên liệu không tồn tại.',
            'Amount.required' => 'Số lượng là bắt buộc.',
            'Amount.integer' => 'Số lượng phải là số nguyên.',
            'Amount.min' => 'Số lượng không được âm.',
        ];
    }
}
