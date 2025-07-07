<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceFoodsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ID_Food' => ['required', 'exists:foods,id'],
            'ID_Invoice' => ['required', 'exists:invoices,id'],
            'Amount' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Food.required' => 'Món ăn là bắt buộc.',
            'ID_Food.exists' => 'Món ăn không tồn tại.',
            'ID_Invoice.required' => 'Hóa đơn là bắt buộc.',
            'ID_Invoice.exists' => 'Hóa đơn không tồn tại.',
            'Amount.required' => 'Số lượng là bắt buộc.',
            'Amount.integer' => 'Số lượng phải là số nguyên.',
            'Amount.min' => 'Số lượng phải lớn hơn 0.',
        ];
    }
}
