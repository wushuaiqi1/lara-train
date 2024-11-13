<?php

namespace Tests\Unit;

use App\Services\UserService;
use PHPUnit\Framework\TestCase;
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
}
