<?php

namespace App\Core;

class Request
{
    public function getUri(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        return parse_url($path)['path'];
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


}