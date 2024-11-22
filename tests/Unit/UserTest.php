<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_insert()
    {
        $res = DB::table('user')
            ->insert([
                'id'=>0,
                'username'=> 'odod',
                'password'=>123456,
                'created_at' => time(),
            ]);
        $this->assertTrue($res);
    }

    public function test_get()
    {
        $res = DB::table('user')
            ->where('id',1)
            ->get();
        $this->assertNotNull($res);
    }

    public function test_find()
    {
        $res = DB::table('user')->find(1);
        $this->assertNotNull($res);
    }

    public function test_value()
    {
        $res = DB::table('user')->where('id',1)
            ->value('username');
        $this->assertNotNull($res);
        $this->assertEquals('111sasa',$res);
    }

    /**
     * 如果你想获取包含单列值的集合，则可以使用 pluck 方法。在下面的例子中，我们将获取角色表中标题的集合：
     * 你还可以在返回的集合中指定字段的自定义键名：(会将 user 表中的 id 字段当做键名，username 字段当做键值返回)
     * @return void
     */
    public function test_pluck()
    {
        $res = DB::table('user')
            ->pluck('username');
        foreach ($res as $username){
            $this->assertNotNull($username);
        }

        // ID作为key
        DB::table('user')->pluck('username','id');
    }
}
