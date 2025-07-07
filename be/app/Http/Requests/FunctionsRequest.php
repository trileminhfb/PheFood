<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FunctionsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:functions,Name'],
            'Code' => ['required', 'string', 'max:255', 'unique:functions,Code'],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên chức năng là bắt buộc.',
            'Name.unique' => 'Tên chức năng đã tồn tại.',
            'Code.required' => 'Mã chức năng là bắt buộc.',
            'Code.unique' => 'Mã chức năng đã tồn tại.',
        ];
    }
}
