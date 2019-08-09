<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'fullname' => 'required|unique:orders|max:50|mix:5',
            'phone' => 'required|unique:orders|max:12|min:10',
            'email' => 'required|email',
            'province' => 'required',
            'district' => 'required',
            'payment_method' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Bạn chưa nhập họ tên!',
            'fullname.min' => 'Họ tên không thể nhỏ hơn 5 ký tự!',
            'fullname.max' => 'Họ tên không thể lớn hơn 50 ký tự!.',
            'phone.required' => 'Bạn chưa nhập số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'phone.min' => 'Số điện thoại bạn nhập không đúng định dạng!',
            'phone.max' => 'Số điện thoại bạn nhập không đúng định dạng!',
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'province' => 'Bạn chưa chọn tỉnh/thành phố!',
            'district' => 'Bạn chưa chọn quận/huyện!',
            'payment_method' => 'Bạn chưa chọn phương thức thanh toán!',
        ];
    }
}
