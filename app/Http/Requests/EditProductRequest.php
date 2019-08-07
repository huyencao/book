<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required',
            'cate_id' => 'required',
            'price_old' => 'required',
            'publishing_company' => 'required',
            'number_page' => 'required',
            'total' => 'required',
            'detail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'cate_id.required' => 'Danh mục sản phẩm chưa có',
            'price_old.required' => 'Bạn chưa nhập giá sản phẩm',
            'publishing_company.required' => 'Bạn chưa nhập tên nhà xuất bản',
            'number_page.required' => 'Bạn chưa nhập số trang',
            'total.required' => 'Bạn chưa nhập số quyển sách',
            'detail.required' => 'Bạn chưa nhập thông tin sản phẩm',
        ];
    }
}
