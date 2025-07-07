<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RanksRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:ranks,Name'],
            'Image' => ['nullable', 'string', 'max:255'],
            'Percent' => ['required', 'numeric', 'min:0', 'max:100'],
            'Points' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên hạng là bắt buộc.',
            'Name.unique' => 'Tên hạng đã tồn tại.',
            'Percent.required' => 'Phần trăm giảm giá là bắt buộc.',
            'Percent.numeric' => 'Phần trăm phải là số.',
            'Percent.min' => 'Phần trăm không được nhỏ hơn 0.',
            'Percent.max' => 'Phần trăm không được lớn hơn 100.',
            'Points.required' => 'Điểm tích lũy là bắt buộc.',
            'Points.integer' => 'Điểm tích lũy phải là số nguyên.',
            'Points.min' => 'Điểm tích lũy không được nhỏ hơn 0.',
        ];
    }
}
