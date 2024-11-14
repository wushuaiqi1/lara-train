<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_path()
    {
        $response = $this->get('/api/path');
        $this->assertNotNull($response);
        $this->assertEquals('api/path',$response->getContent());
    }
}
