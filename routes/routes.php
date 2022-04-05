<?php

use App\Core\Router;


Router::get('/', ['App\\Controllers\\MainController', 'index']);

Router::get('/login', ['App\\Controllers\\LoginController', 'index']);
Router::post('/login', ['App\\Controllers\\LoginController', 'auth']);

Router::get('/create', ['App\\Controllers\\CreateController', 'index']);
Router::post('/create', ['App\\Controllers\\CreateController', 'create']);