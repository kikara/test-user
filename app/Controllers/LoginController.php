<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{

    public static function index()
    {
        self::checkLogout();
        view('login');
    }

    public static function auth() {
        self::checkLogout();
        if (isAuth()) {
            header('Location: /');
        } else {
            $user = new User();
            $result = $user->getAll();
            $userID = self::checkUser($result);
            dump($userID);
            if (is_null($userID)) {
                $_SESSION['data']['login']['error'] = 'Логин или пароль неверный.';
                header('Location: /login');
            } else {
                $_SESSION['user'] = $userID;
                header('Location: /');
            }
        }
    }

    public static function checkUser($users)
    {
        if (isset($_POST['login']) && isset($_POST['password'])){
            foreach ($users as $id => $user) {
                if ($user['login'] == $_POST['login'] && password_verify($_POST['password'], $user['password'])) {
                    return $id;
                }
            }
        }
        return null;
    }

    /*
     *  Проверка запроса на выход
     */
    public static function checkLogout(): void
    {
        if (! empty($_GET) && isset($_GET['logout'])) {
            logout();
            header('Location: /');
        }
    }
}