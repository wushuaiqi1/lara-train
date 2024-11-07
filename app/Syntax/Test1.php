<?php

namespace App\Syntax;

use Closure;

/**
 * @Author: 武帅祺
 * @Date: 2024/11/7
 * @Time：16:55
 * @Description：闭包测试
 */
function getClosure(): Closure
{
    return function () {
        return function () {
            return true;
        };
    };
}

$closure1 = getClosure();
$closure2 = $closure1();
$res = $closure2();
var_dump($res);
