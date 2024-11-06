<?php

namespace App\Services;

class OrderService
{
    /**
     *
     * @param string $orderId
     * @return array
     */
    public function getOrderById(string $orderId)
    {
        return [
            'id' => $orderId,
            'userId' => '7750',
            'createDate' => date('Y-m-d H:i:s')
        ];
    }
}
