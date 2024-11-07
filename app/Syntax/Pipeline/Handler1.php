<?php

namespace App\Syntax\Pipeline;

use Closure;

class Handler1
{
    public function handle($passable, Closure $next)
    {
        echo 'Handler1 handle...' . $passable . PHP_EOL;
        $next($passable);
    }

}
