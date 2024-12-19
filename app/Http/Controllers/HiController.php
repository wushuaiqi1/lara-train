<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HiController extends Controller
{
    public function hi(Request $request)
    {
        $res = $request->input('min_student_amount',5);
        // null值直接插入数据库报错。
        $insertRes = DB::table('user')
            ->insert([
                'username'=>'李四',
                'password'=>'sss',
                'created_at'=>null,
            ]);
        var_dump($insertRes);
        var_dump($res);
    }
}
