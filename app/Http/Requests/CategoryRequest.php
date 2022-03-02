<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'unique:categories',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Đã tồn tại hãng này'
        ];
    }
}
