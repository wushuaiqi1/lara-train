<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @Author: 武帅祺
 * @Date: 2024/11/5
 * @Time：15:42
 * @Description：通用校验消息格式
 */
class CommonRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'required' => ':attribute为必填项',
            'min' => ':attribute最小为:min',
            'max' => ':attribute最大为:max',
            'between' => '长度在:min和:max之间',
            'integer' => '必须为整数',
            'array' => '必须为数组',
            'in' => '可选值为:values',
            'regex' => ':attribute格式不正确',
            'unique' => ':attribute已经存在',
            'date' => ':attribute格式不合法',
            'required_if' => ':attribute参数错误',
        ];
    }
}
