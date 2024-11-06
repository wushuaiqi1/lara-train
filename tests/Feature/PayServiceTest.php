<?php

namespace Tests\Feature;

use App\Constants\BusinessStatusCode;
use App\Services\OrderService;
use App\Services\PayService;
use App\Services\UserService;
use Exception;
use Mockery;
use Tests\TestCase;

class PayServiceTest extends TestCase
{

    protected $orderServiceMock;
    protected $userServiceMock;
    protected $payServiceReal;

    /**
     * 测试函数前置使用
     * @return void
     */
    public function setUp(): void
    {
        // 初始化订单服务Mock对象
        $this->orderServiceMock = Mockery::mock(OrderService::class);
        // 初始化用户服务Mock对象
        $this->userServiceMock = Mockery::mock(UserService::class);
        // 初始化真实的支付服务对象
        $this->payServiceReal = new PayService($this->userServiceMock, $this->orderServiceMock);
    }

    /**
     * 测试callback函数订单不存在的场景
     * @return void
     */
    public function test_callback_order_not_exist()
    {
        $this->orderServiceMock->shouldReceive('getOrderById')
            ->withAnyArgs()
            ->andReturnNull();
        $this->userServiceMock->shouldReceive('getUserById')
            ->with('358')
            ->andReturn();
        try {
            $this->payServiceReal->callback(1);
        } catch (Exception $e) {
            self::assertEquals(BusinessStatusCode::ORDER_NOT_EXIST_MSG, $e->getMessage());
        }
    }

    /**
     * 测试callback函数用户不存在的场景
     * @return void
     */
    public function test_callback_user_not_exist()
    {
        $this->orderServiceMock->shouldReceive('getOrderById')
            ->withAnyArgs()
            ->andReturn(
                [
                    'userId' => '358'
                ]
            );
        $this->userServiceMock->shouldReceive('getUserById')
            ->with('358')
            ->andReturnNull();
        try {
            $this->payServiceReal->callback(1);
        } catch (Exception $e) {
            self::assertEquals(BusinessStatusCode::USER_NOT_EXIST_MSG, $e->getMessage());
        }
    }

    /**
     * 测试callback函数成功的场景
     * @return void
     */
    public function test_callback_success()
    {
        $this->orderServiceMock
            ->shouldReceive('getOrderById')
            ->withAnyArgs()
            ->andReturn([
                'userId' => '1'
            ]);
        $this->userServiceMock
            ->shouldReceive('getUserById')
            ->withAnyArgs()
            ->andReturnTrue();
        $res = $this->payServiceReal->callback(1);
        self::assertTrue($res);
    }
}
