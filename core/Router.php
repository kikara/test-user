<?php

namespace App\Core;

use App\Core\Request;

class Router
{
    /**
     * Массив маршрутов по типу ['get' => ['uri' => 'callback']]
     * @var array
     */
    private static array $routes = [];

    public static function get($uri, $action)
    {
        self::$routes['get'][$uri] = $action;
    }

    public static function post($uri, $action)
    {
        self::$routes['post'][$uri] = $action;
    }

    /**
     * Вызов callback функции указанном в роутере по указанному запросу
     * @param \App\Core\Request $request
     */
    public function response(Request $request)
    {
        $uri = $request->getUri();
        $method = $request->getMethod();
        $action = self::$routes[$method][$uri] ?? false;
        if ($action) {
            call_user_func($action);
        } else {
            echo '404';
        }
    }
}