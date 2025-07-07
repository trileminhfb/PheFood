<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TablesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Number' => ['required', 'integer', 'unique:tables,Number', 'min:1'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1, 2, 3])],
            'Amount' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'Number.required' => 'Số bàn là bắt buộc.',
            'Number.unique' => 'Số bàn đã tồn tại.',
            'Number.integer' => 'Số bàn phải là số nguyên.',
            'Number.min' => 'Số bàn phải lớn hơn 0.',
            'Status.in' => 'Trạng thái bàn không hợp lệ.',
            'Amount.required' => 'Số lượng người là bắt buộc.',
            'Amount.integer' => 'Số lượng người phải là số nguyên.',
            'Amount.min' => 'Số lượng người phải lớn hơn 0.',
        ];
    }
}
