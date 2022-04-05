<?php
    $data = $_SESSION['data']['main'];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Template</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container-table">
        <h1 class="container-table__title">Список пользователей</h1>
        <table class="container-table__table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Возраст</th>
                <th>Авторизован</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $id => $user) :?>
                <tr>
                    <td><?= $id?></td>
                    <td><?= $user['login']?></td>
                    <td><?= $id === $_SESSION['user'] ? 'Текущий' : ''?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <div class="wrapper-buttons">
            <a href="/login?logout=true" class="wrapper-buttons__ref">Выйти</a>
            <a href="/create" class="wrapper-buttons__ref">Создать</a>
        </div>
    </div>
</body>
</html>
