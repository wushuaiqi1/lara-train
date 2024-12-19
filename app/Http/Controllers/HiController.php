<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// 类名大驼峰，方法名小驼峰。
class HiController extends Controller
{
    public function hi(Request $request)
    {
        $res = $request->input('min_student_amount', 5);
        // null值直接插入数据库报错。
        $insertRes = DB::table('user')
            ->insert([
                'username' => '李四',
                'password' => 'sss',
                'created_at' => null,
            ]);
        var_dump($insertRes);
        var_dump($res);
    }

    public function hiPost(Request $request)
    {
        //当前端传递的参数是null的场景，导致后端匹配是的null，从而引发数据库报错“Column 'password' cannot be null”
        $data = $request->input("password", "123456");
        $res = DB::table('user')
            ->insert([
                'username' => '高铁',
                'password' => $data,
                'created_at' => '11223',
            ]);
        var_dump($res);
    }
}
