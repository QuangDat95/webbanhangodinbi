<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20|unique',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Hãng không được để trống',
            'name.max' => 'Nội dung hãng không được quá 20 ký tự',
            'name.unique' => 'Đã tồn tại hãng này'
        ];
    }
}
