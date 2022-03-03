<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "phone" => "min:9",
            "address" => "max:255"
        ];
    }
    public function messages()
    {
        return[
            "phone.min" => "Số điện thoại ít nhất 9 số",
            "address.max" => "Địa chỉ không quá 255 ký tự"
        ];
    }
}
