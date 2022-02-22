<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required",
            "phone" => "required|min:9",
            "address" => "required|max:255"
        ];
    }
    public function messages()
    {
        return[
            "name.required" => "Tên không được để trống",
            "phone.required" => "Số điện thoại không được để trống",
            "phone.min" => "Số điện thoại ít nhất 9 số",
            "address.requied" => "Địa chỉ không được để trống",
            "address.max" => "Địa chỉ không quá 255 ký tự"
        ];
    }
}
