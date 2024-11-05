<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login(LoginRequest $loginRequest)
    {
        var_dump('login ...');
    }
}
