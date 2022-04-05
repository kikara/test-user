<?php

function dump($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function isAuth(): bool
{
    return isset($_SESSION['user']);
}

function logout(): void
{
    unset($_SESSION['user']);
}

function login($userID)
{
    $_SESSION['user'] = $userID;
}

function view($nameView, $data = null)
{
    $_SESSION[$nameView]['data'] = $data;
    include $_SERVER['DOCUMENT_ROOT'] . '/resources/templates/' . $nameView . '.php';
    die();
}