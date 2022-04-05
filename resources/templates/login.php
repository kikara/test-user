<?php
    $error = $_SESSION['data']['login']['error'] ?? '';
    unset($_SESSION['data']['login']['error']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <form action="/login" class="form-container" method="POST">
            <label class="form-container__label">Логин</label>
            <input name="login" type="text" class="form-container__login" required>
            <label class="form-container__label">Пароль</label>
            <input name="password" type="password" class="form-container__login" required>
            <input type="submit" class="form__btn" value="Войти">
            <span class="msg-error"><?=$error?></span>
        </form>
    </div>
</body>
</html>
