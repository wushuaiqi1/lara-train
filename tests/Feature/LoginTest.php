<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        $res = $this->post('/api/login', [
            'account' => 'login_user',
            'pwd' => '123456',
        ]);
        $this->assertEquals(200, $res->getStatusCode());
    }
}
