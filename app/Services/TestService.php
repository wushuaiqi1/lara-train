<?php

namespace App\Services;

class TestService
{
    protected $params;

    public function __construct($param)
    {
        $this->params = $param;
    }
}
