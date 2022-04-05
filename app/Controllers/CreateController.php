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
            if (self::checkUserLogin($userModel->getAll(), $_POST['login'])) {
                view('create', ['error-msg' => 'Пользователь с таким логином уже существует']);
            }
            $userModel->create($_POST);
            header('Location: /');
        } else {
            view('create', ['error-msg' => 'Заполните все поля']);
        }
    }


    /**
     * Проверка пользователся с существующим логином
     * @param $users
     * @param $login
     * @return bool
     */
    public static function checkUserLogin($users, $login): bool
    {
        foreach ($users as $user) {
            if ($user['login'] === $login) {
                return true;
            }
        }
        return false;
    }
}

