<?php


namespace App\Services;

class UserService
{
    public function getUserById(string $userId)
    {
        return [
            'id' => $userId,
            'userId' => '7750',
            'userName' => '武帅祺'
        ];
    }
}
