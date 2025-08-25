<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'Image' => ['nullable', 'string', 'url', 'max:255'],
            'Phone' => ['required', 'string', 'max:15', 'unique:customers,Phone'],
            'Birth' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email'],
            'password' => 'required|string|min:6',
            'otp' => ['nullable', 'string', 'size:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên khách hàng là bắt buộc.',
            'name.string' => 'Tên khách hàng phải là chuỗi ký tự.',
            'name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
            'Image.url' => 'Hình ảnh phải là một URL hợp lệ.',
            'Image.max' => 'URL hình ảnh không được vượt quá 255 ký tự.',
            'Phone.required' => 'Số điện thoại là bắt buộc.',
            'Phone.unique' => 'Số điện thoại đã được sử dụng.',
            'Phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'Birth.required' => 'Ngày sinh là bắt buộc.',
            'Birth.date' => 'Ngày sinh không đúng định dạng.',
            'Birth.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'otp.size' => 'OTP phải gồm đúng 6 ký tự.',
        ];
    }
}
