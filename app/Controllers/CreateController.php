<?php

namespace App\Controllers;

use App\Models\User;

class CreateController
{
    public static function index()
    {
        isAuth() ? view('create') : header('Location: /');
    }

    public static function create()
    {
        if (! isAuth()) {
            header('Location: /login');
        }
        $userModel = new User();
        if ($userModel->validate($_POST)) {
            $userModel->create($_POST);
            header('Location: /');
        } else {
            //TODO view('create', msg-error);
            header('Location: /create');
        }
    }
}

