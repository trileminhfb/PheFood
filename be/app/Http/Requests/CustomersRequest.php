<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'Image' => ['nullable', 'string', 'max:255'],
            'Phone' => ['required', 'string', 'max:15', 'unique:customers,Phone'],
            'OTP' => ['nullable', 'string', 'max:10'],
            'Birth' => ['required', 'date', 'before:today'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1, 2])],
            'Points' => ['nullable', 'integer', 'min:0'],
            'is_Active' => ['nullable', 'integer', Rule::in([0, 1])],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên khách hàng là bắt buộc.',
            'Phone.required' => 'Số điện thoại là bắt buộc.',
            'Phone.unique' => 'Số điện thoại đã tồn tại.',
            'Birth.required' => 'Ngày sinh là bắt buộc.',
            'Birth.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'Status.in' => 'Trạng thái không hợp lệ.',
            'is_Active.in' => 'Trạng thái hoạt động không hợp lệ.',
        ];
    }
}
