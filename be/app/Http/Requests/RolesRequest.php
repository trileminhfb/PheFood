<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RolesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:roles,Name'],
            'Status' => ['nullable', 'integer', Rule::in([0, 1])],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên vai trò là bắt buộc.',
            'Name.unique' => 'Tên vai trò đã tồn tại.',
            'Status.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
