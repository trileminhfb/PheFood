<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ID_Customer' => ['required', 'exists:customers,id'],
            'Time' => ['required', 'date', 'after_or_equal:now'],
            'Amount' => ['required', 'integer', 'min:1'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1, 2, 3])],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Customer.required' => 'Khách hàng là bắt buộc.',
            'ID_Customer.exists' => 'Khách hàng không tồn tại.',
            'Time.required' => 'Thời gian đặt bàn là bắt buộc.',
            'Time.after_or_equal' => 'Thời gian đặt bàn phải là thời gian hiện tại hoặc tương lai.',
            'Amount.required' => 'Số người là bắt buộc.',
            'Amount.integer' => 'Số người phải là số nguyên.',
            'Amount.min' => 'Số người phải lớn hơn 0.',
            'Status.in' => 'Trạng thái đặt bàn không hợp lệ.',
        ];
    }
}
