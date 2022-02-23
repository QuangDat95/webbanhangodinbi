<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:50',
            'price' => 'required',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không được quá 50 ký tự',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Giá không được để trống',
            'description.required' => 'Nội dung không được để trống'
        ];
    }
}
