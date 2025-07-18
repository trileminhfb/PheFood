<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ID_Food' => ['required', 'exists:foods,id'],
            'ID_Table' => ['required', 'exists:tables,id'],
            'Amount' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Food.required' => 'Món ăn là bắt buộc.',
            'ID_Food.exists' => 'Món ăn không tồn tại.',
            'ID_Table.required' => 'Bàn là bắt buộc.',
            'ID_Table.exists' => 'Bàn không tồn tại.',
            'Amount.required' => 'Số lượng là bắt buộc.',
            'Amount.integer' => 'Số lượng phải là số nguyên.',
            'Amount.min' => 'Số lượng phải lớn hơn 0.',
        ];
    }
}
