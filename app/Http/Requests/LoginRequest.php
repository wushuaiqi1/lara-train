<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 确认用户是否有权限发送请求
     * false：拦截请求，403
     * true：程序继续
     *
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 参数校验规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'pwd' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A title is required',
            'pwd.required' => 'A message is required',
        ];
    }
}
