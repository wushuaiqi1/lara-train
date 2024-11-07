<?php

namespace App\Syntax\Pipeline;

use Closure;

class Handler2
{
    public function handle($passable, Closure $next)
    {
        echo 'Handler2 handle...' . $passable . PHP_EOL;
        $next($passable);
    }
}
