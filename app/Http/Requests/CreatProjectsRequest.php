<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            //
            'name'=>'required|unique:projects,name',
            'thumbnail'=>'image|dimensions:min_width=261,min_height:98'
        ];
    }
    public function messages()
    {
       return [
           'name.required'=>'必填项',
           'name.unique'=>'已存在此项目，请更名',
           'thumbnail.image'=>'请上传标准格式图片',
           'thumbnail.dimensions'=>'图片最小261*98'
       ];
    }
}
