<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest): Response
    {
        // 获取校验通过的参数
        $params = $loginRequest->validated();
        return new Response(json_encode($params));
    }

    public function register(Request $request): Response
    {
        $validator = Validator::make($request->toArray(),
            [
                'phone' => 'bail|required|string|length:11',
                'pwd' => 'bail|required|string|max:16|min:8'],
            [
                'required' => ':attribute为必填项',
                'max' => ':attribute不能大于:max',
                'min' => ':attribute不能小于:min'
            ],
            [
                'pwd' => '密码',
                'phone' => '手机号',
            ]
        );
        $validator->validate();
        return new Response(200);
    }
}
