<?php

namespace Tests\Feature;

use App\Services\TestService;
use App\Services\UserService;
use Tests\TestCase;

class IocRequest extends TestCase
{
    public function test_instance()
    {
        $res = $this->app->bound(TestService::class);
        $res = $this->app->instance(TestService::class, new TestService('哈哈'));
        $res = $this->app->bound(TestService::class);
        $res = $this->app->instance(TestService::class, new TestService('你好'));
        var_dump($res);
    }
}
