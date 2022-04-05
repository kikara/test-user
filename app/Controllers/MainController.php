<?php

namespace App\Controllers;

use App\Models\User;

class MainController
{
    public static function index()
    {
        if (! isAuth()) {
            header('Location: /login');
        }
        $user = new User();
        view('main', $user->getAll());
    }
}