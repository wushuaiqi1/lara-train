<?php

namespace App\Services\Cor\Handler;

use App\Services\Cor\IChainOfResponsibility;
use Closure;

class SuperCoursewareCreateHandler implements IChainOfResponsibility
{

    public static function rule(string $type): string
    {
        return $type == 'super';
    }

    public static function handle($request)
    {
        echo 'SuperCoursewareCreateHandler Handle...' . PHP_EOL;
    }
}
