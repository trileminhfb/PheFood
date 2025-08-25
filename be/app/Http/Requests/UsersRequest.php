<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
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
            'Phone' => ['required', 'string', 'max:15', 'unique:users,Phone'],
            'Birth' => ['required', 'date', 'before:today'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1, 2])],
            'is_Active' => ['nullable', 'integer', Rule::in([0, 1])],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'Phone.required' => 'Số điện thoại là bắt buộc.',
            'Phone.unique' => 'Số điện thoại đã được sử dụng.',
            'Birth.required' => 'Ngày sinh là bắt buộc.',
            'Birth.before' => 'Ngày sinh không hợp lệ.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Định dạng email không đúng.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'Status.in' => 'Trạng thái người dùng không hợp lệ.',
            'is_Active.in' => 'Trạng thái kích hoạt không hợp lệ.',
        ];
    }
}
