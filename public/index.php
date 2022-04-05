<?php
require_once '../core/functions.php';
require_once '../core/Router.php';
require_once '../core/Request.php';
require_once '../core/Database/Model.php';
require_once '../core/Database/DatabaseConnection/DatabaseConnection.php';
require_once '../routes/routes.php';
require_once '../app/Controllers/MainController.php';
require_once '../app/Controllers/LoginController.php';
require_once '../app/Controllers/CreateController.php';
require_once '../app/Models/User.php';
require_once '../core/Application.php';

session_start();
$app = new \App\Core\Application();
$app->run();

//dump($_SERVER);