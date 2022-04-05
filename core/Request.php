<?php

namespace App\Core;

class Request
{
    /**
     * Получить URI пути => '/login
     * @return string
     */
    public function getUri(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        return parse_url($path)['path'];
    }

    /**
     * Получить метод запроса => post / get
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


}