<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'title' => 'required',
            'author' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Bạn chưa nhập tên bài viết!',
            'author.required' => 'Bạn chưa nhập tên tác giả',
            'cate_id.required' => 'Chưa chọn danh mục bài viết',
            'status.required' => 'Chưa chọn trạng thái bài viết',
        ];
    }
}
