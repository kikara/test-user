<?php

namespace App\Controllers;

use App\Models\User;

class RegisterController
{
    public static function register()
    {
        view('register');
    }

    public static function create()
    {
        if (isset($_POST['login']) && isset($_POST['password']))
        {
            if (self::checkLogin($_POST['login'])) {
                $_SESSION['data']['register']['error'] = 'Пользователь с таким логином уже существует.';
                view('register');
            }
            $user = new User;
            $userID = $user->create($_POST);
            login($userID);
            header('Location: /');
        }
    }

    public static function checkLogin($login)
    {
        $user = new User;
        $users = $user->getAll();
        foreach ($users as $row) {
            if ($row['login'] === $login) {
                return true;
            }
        }
        return false;
    }
}