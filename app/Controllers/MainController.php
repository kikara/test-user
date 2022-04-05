<?php

namespace App\Controllers;

use App\Models\User;

class MainController
{
    public static function index()
    {
        if (isAuth()) {
            $user = new User();
            $_SESSION['data']['main'] = $user->getAll();
            view('main');
        } else {
            header('Location: /login');
        }
    }
}