<?php
    $data = $_SESSION['create']['data'];
    unset($_SESSION['create']['data']);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать пользователя</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <form action="/create" class="form-container" method="POST">
            <label class="form-container__label">Имя</label>
            <input name="name" type="text" class="form-container__login" required>
            <label class="form-container__label">Фамилия</label>
            <input name="surname" type="text" class="form-container__login" required>
            <label class="form-container__label">Возраст</label>
            <input name="age" type="text" class="form-container__login" required>
            <label class="form-container__label">Логин</label>
            <input name="login" type="text" class="form-container__login" required>
            <label class="form-container__label">Пароль</label>
            <input name="password" type="password" class="form-container__login" required>
            <input type="submit" class="form__btn" value="Создать">
            <span class="msg-error"><?=$data['error'] ?? ''?></span>
        </form>
    </div>
</body>
</html>
