<?php

namespace Tests\Feature;

use App\Services\Cor\ChainOfResponsibilityHandler;
use App\Services\Cor\Handler\MagicGoodCourseCreateHandler;
use App\Services\Cor\Handler\SuperCoursewareCreateHandler;
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
            ->send($type)
            ->through([
                MagicGoodCourseCreateHandler::class,
                SuperCoursewareCreateHandler::class,
            ])
            ->then(function ($content) {
                echo '我最后被触发。。。' . $content . PHP_EOL;
            });
    }
}
