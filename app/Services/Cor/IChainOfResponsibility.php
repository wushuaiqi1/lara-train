<?php

namespace App\Services\Cor;

/**
 * @Author: 武帅祺
 * @Date: 2024/11/7
 * @Time：10:46
 * @Description：责任链模式接口
 */
interface IChainOfResponsibility
{
    public static function rule(string $type): string;

    public static function handle($request);
}
