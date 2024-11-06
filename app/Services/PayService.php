<?php


namespace App\Services;

use App\Constants\BusinessStatusCode;
use App\Exceptions\GlobalException;

class PayService
{
    private $userService;
    private $orderService;

    public function __construct(UserService $userService, OrderService $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    /**
     * 支付回调
     * @param string $orderNo
     * @return void
     */
    public function callback(string $orderNo): bool
    {
        $order = $this->orderService->getOrderById($orderNo);
        if (empty($order)) {
            throw new GlobalException(BusinessStatusCode::ORDER_NOT_EXIST, BusinessStatusCode::ORDER_NOT_EXIST_MSG);
        }
        $userId = $order['userId'];
        $user = $this->userService->getUserById($userId);
        if (empty($user)) {
            throw new GlobalException(BusinessStatusCode::ORDER_NOT_EXIST, BusinessStatusCode::USER_NOT_EXIST_MSG);
        }
        // 执行后续逻辑
        echo '支付回调====执行成功====';
        return true;
    }
}
