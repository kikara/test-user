<?php

use App\Core\Router;

Router::get('/server', function() {
    dump($_SERVER);
});

Router::get('/', ['App\\Controllers\\MainController', 'index']);

Router::get('/login', ['App\\Controllers\\LoginController', 'index']);
Router::post('/login', ['App\\Controllers\\LoginController', 'auth']);

Router::get('/register', ['App\\Controllers\\RegisterController', 'register']);
Router::post('/register', ['App\\Controllers\\RegisterController', 'create']);

Router::get('/create', ['App\\Controllers\\CreateController', 'index']);
Router::post('/create', ['App\\Controllers\\CreateController', 'create']);