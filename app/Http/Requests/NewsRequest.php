<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|unique:news',
            'author' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Bạn chưa nhập tên bài viết!',
            'title.unique'      => 'Tên bài viết đã tồn tại!',
            'author.required' => 'Bạn chưa nhập tên tác giả',
            'cate_id.required' => 'Chưa chọn danh mục bài viết',
            'status.required' => 'Chưa chọn trạng thái bài viết'
        ];
    }
}
