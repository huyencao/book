<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|unique:contact,name|max:50|mix:5',
            'phone' => 'required|unique:contact,phone|max:12|min:10',
            'email' => 'required|email|unique:contact,email',
//            'content' => 'max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập họ tên!',
            'name.min' => 'Họ tên không thể nhỏ hơn 5 ký tự!',
            'name.max' => 'Họ tên không thể lớn hơn 50 ký tự!.',
            'phone.required' => 'Bạn chưa nhập số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'phone.min' => 'Số điện thoại bạn nhập không đúng định dạng!',
            'phone.max' => 'Số điện thoại bạn nhập không đúng định dạng!',
            'email.required'        => 'Bạn chưa nhập email!',
            'email.unique'          => 'Email đã tồn tại!',
            'email.email'           => 'Email không đúng định dạng!',
//            'content.max' => 'Nội dung không thể lớn hơn 500 ký tự!',
        ];
    }
}
