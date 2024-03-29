<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name' => 'required|unique:subject|max:191',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên môn học!',
            'name.unique' => 'Tên môn học đã tồn tại!',
            'name.max' => 'Tên không đúng định dạng!',
            'status.required' => 'Bạn chưa chọn trạng thái môn học!'
        ];
    }
}
