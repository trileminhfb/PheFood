<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'Name' => ['required', 'string', 'max:255', 'unique:sales,Name'],
            'Start' => ['required', 'date', 'before:End'],
            'End' => ['required', 'date', 'after:Start'],
            'Percent' => ['required', 'numeric', 'min:0', 'max:100'],
            'Status' => ['required', 'integer', Rule::in([0, 1])],
        ];
    }

    public function messages(): array
    {
        return [
            'Name.required' => 'Tên chương trình khuyến mãi là bắt buộc.',
            'Name.unique' => 'Tên chương trình đã tồn tại.',
            'Start.required' => 'Thời gian bắt đầu là bắt buộc.',
            'End.required' => 'Thời gian kết thúc là bắt buộc.',
            'Start.before' => 'Thời gian bắt đầu phải trước thời gian kết thúc.',
            'End.after' => 'Thời gian kết thúc phải sau thời gian bắt đầu.',
            'Percent.required' => 'Phần trăm giảm giá là bắt buộc.',
            'Percent.numeric' => 'Phần trăm phải là số.',
            'Percent.min' => 'Phần trăm không được nhỏ hơn 0.',
            'Percent.max' => 'Phần trăm không được lớn hơn 100.',
            'Status.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
