<?php


namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * @Author: 武帅祺
 * @Date: 2024/11/5
 * @Time：10:41
 * @Description：定义全局异常处理类
 */
class GlobalException extends HttpException
{
    protected $message;
    protected $customCode;


    public function __construct(int $customCode, string $message)
    {
        parent::__construct($customCode, $message);
        $this->message = $message;
        $this->customCode = $customCode;
    }
}
