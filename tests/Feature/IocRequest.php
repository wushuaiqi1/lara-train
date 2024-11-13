<?php

namespace Tests\Feature;

use App\Services\OrderService;
use App\Services\PayService;
use App\Services\TestService;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
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

    public function test_get()
    {
        $payService = app(PayService::class);
        $payService->callback(1);
        $payService = app(UserService::class);
        $payService->getUserById(1);
        $payService = app(OrderService::class);
        $payService->getOrderById(1);
        $this->assertNotNull($payService);
    }

    public function test_capture()
    {
        $request = Request::createFromGlobals();
        $this->assertNotNull($request);
    }
}
