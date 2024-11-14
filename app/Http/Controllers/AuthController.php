<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(): string
    {
        return 'auth';
    }

    public function testPath(Request $request): string
    {
        return $request->path();
    }
}
