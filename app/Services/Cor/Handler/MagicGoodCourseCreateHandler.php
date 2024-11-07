<?php

namespace App\Services\Cor\Handler;


use App\Services\Cor\IChainOfResponsibility;
use Closure;

class MagicGoodCourseCreateHandler implements IChainOfResponsibility
{

    public static function rule(string $type): string
    {
        return $type == 'magic';
    }

    public static function handle($request)
    {
        echo 'MagicGoodCourseCreateHandler Handle...' . PHP_EOL;
    }
}
