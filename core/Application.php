<?php

namespace App\Core;

use App\Core\Router;
use App\Core\Request;

class Application
{
    public Router $router;
    private Request $request;

    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request();
    }

    public function run()
    {
        $this->router->response($this->request);
    }
}