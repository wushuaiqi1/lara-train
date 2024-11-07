<?php

namespace Tests\Feature;

use App\Services\Cor\ChainOfResponsibilityHandler;
use App\Syntax\Pipeline\Handler1;
use App\Syntax\Pipeline\Handler2;
use Illuminate\Pipeline\Pipeline;
use Tests\TestCase;

class ChainOfResponsibilityHandlerTest extends TestCase
{
    public function test_super()
    {
        (new ChainOfResponsibilityHandler())->handle('super', 'content');
        self::assertTrue(true);
    }

    public function test_magic()
    {
        (new ChainOfResponsibilityHandler())->handle('magic', 'content');
        self::assertTrue(true);
    }

    public function test_pipeline()
    {
        $type = '管道类型';
        app(Pipeline::class)
            ->through([
                Handler2::class,
                Handler1::class,
            ])
            ->send($type)
            ->then(function ($content) {
                echo '我最后被触发。。。' . $content . PHP_EOL;
            });
    }
}
