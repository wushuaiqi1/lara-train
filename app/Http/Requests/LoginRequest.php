<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends CommonRequest
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
            // 首次验证停止运行
            'name' => 'bail|required|int|max:255',
            'pwd' => 'required',
            'age' => 'nullable',
        ];
    }
}
