<?php

namespace Tests\Feature;

use App\Services\Cor\ChainOfResponsibilityHandler;
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
}
