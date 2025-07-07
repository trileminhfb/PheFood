<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ID_Table' => ['required', 'integer', 'exists:tables,id'],
            'ID_User' => ['nullable', 'exists:users,id'],
            'ID_Customer' => ['nullable', 'exists:customers,id'],
            'ID_Sale' => ['nullable', 'integer', 'exists:sales,id'],
            'Total' => ['required', 'integer', 'min:0'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1, 2])],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Table.required' => 'Bàn là bắt buộc.',
            'ID_Table.exists' => 'Bàn không tồn tại.',
            'ID_User.exists' => 'Người xử lý không tồn tại.',
            'ID_Customer.exists' => 'Khách hàng không tồn tại.',
            'ID_Sale.exists' => 'Chương trình khuyến mãi không hợp lệ.',
            'Total.required' => 'Tổng hóa đơn là bắt buộc.',
            'Total.integer' => 'Tổng hóa đơn phải là số nguyên.',
            'Total.min' => 'Tổng hóa đơn phải lớn hơn hoặc bằng 0.',
            'Status.in' => 'Trạng thái hóa đơn không hợp lệ.',
        ];
    }
}
