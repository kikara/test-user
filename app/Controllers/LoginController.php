<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{

    public static function index()
    {
        self::checkAndLogout();
        view('login');
    }

    public static function auth() {
        self::checkAndLogout();
        if (isAuth()) {
            header('Location: /');
        }
        $user = new User();
        $result = $user->getAll();
        $userID = self::checkUser($result);
        if (is_null($userID)) {
            view('login', ['error-msg' => 'Логин или пароль неверный']);
        } else {
            login($userID);
            header('Location: /');
        }
    }

    /**
     * Проверка существующего пользователя
     * @param $users
     * @return int|string|null
     */
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

    /**
     * Выход из системы
     */
    public static function checkAndLogout(): void
    {
        if (! empty($_GET) && isset($_GET['logout'])) {
            logout();
            header('Location: /');
        }
    }
}