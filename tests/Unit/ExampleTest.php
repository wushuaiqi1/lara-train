<?php

namespace Tests\Unit;

use App\Services\UserService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use function Sodium\compare;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCompact()
    {
        $concrete = UserService::class;
        $shared = true;
        $res = compact('concrete', 'shared');
        $this->assertEquals('App\Services\UserService', $res['concrete']);
        $this->assertEquals('true', $res['shared']);
    }

    public function test_array_diff()
    {
        $verbs = ['get', 'post'];
        $res = array_diff($verbs, ['get']);
        $this->assertEquals([1 => 'post'], $res);

        var_dump(array_values($res));
    }

    public function test_array_filter()
    {
        $source = 'post';
        $verbs = ['get', 'post'];
        // array_values重新排列
        $res = array_values(array_filter($verbs, function ($verb) use ($source) {
            return $source == $verb;
        }));
        $this->assertEquals(['post'],$res);
    }

    public function test_header_bag()
    {

        $UPPER = '-mp4';
        $LOWER = '-jpg';
        // 翻译，第一个参数是元数据，第二个是from字符串，第三个是to字符串。
        $key = strtr('mps', $UPPER, $LOWER);
        $this->assertEquals('jps',$key);
    }

    public function test_date()
    {
        // GMT时间
        $res = gmdate('D, d M Y H:i:s').' GMT';
        echo $res;
    }

    public function test_return_param()
    {
        // ['variable']从数组中读取变量
        [$name, $nihao] = ['hello', 'nihao'];
        $this->assertEquals('hello', $name);
        $this->assertEquals('nihao', $nihao);
    }
}
