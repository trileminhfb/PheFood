<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'Phone' => ['required', 'string', 'max:15', 'unique:customers,Phone'],
            'Birth' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên khách hàng là bắt buộc.',
            'Phone.required' => 'Số điện thoại là bắt buộc.',
            'Phone.unique' => 'Số điện thoại đã được sử dụng.',
            'Birth.required' => 'Ngày sinh là bắt buộc.',
            'Birth.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu cần ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
