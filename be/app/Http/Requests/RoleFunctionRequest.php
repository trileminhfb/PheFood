<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFunctionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'ID_Role' => ['required', 'exists:roles,id'],
            'ID_Function' => ['required', 'exists:functions,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'ID_Role.required' => 'Vai trò là bắt buộc.',
            'ID_Role.exists' => 'Vai trò không tồn tại.',
            'ID_Function.required' => 'Chức năng là bắt buộc.',
            'ID_Function.exists' => 'Chức năng không tồn tại.',
        ];
    }
}
