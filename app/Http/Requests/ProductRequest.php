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
            'name' => 'unique:products|max:50',
            'description_product' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg'
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Tên không được quá 50 ký tự',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'description_product.required' => 'Nội dung không được để trống',
            'image.mimes' => 'Ảnh phải thuộc định dạng jpg,png,jpeg,gif,svg'
        ];
    }
}
