<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTasksRequest extends FormRequest
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
            'name'=>'required|max:20|unique:tasks,title'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'必填项',
           'name.unique'=>'已使用',
            'name.max' =>'任务名称太长'
        ];
    }
}
