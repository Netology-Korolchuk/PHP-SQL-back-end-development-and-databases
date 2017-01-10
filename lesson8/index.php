<?php
session_start();
include 'functions.php';
if (isset($_SESSION['login']))
{
echo 'Вы уже авторизованы как ';
echo "<b>".$_SESSION['login']."</b>";
echo '<a href="logout.php"> выйти?</a>';
echo '  или  ';
echo '<a href="admin.php"> перейти на страницу загрузки тестов</a>';
echo '<hr/>';
}

if (!empty($_POST['Auth']['login'])) authorize($_POST['Auth']['login'],$_POST['Auth']['password']);

if (!empty($_POST['fio']))
{
    $_SESSION['fio'] = $_POST['fio'];
    header('Location: list.php');
}
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8" lang="ru">
    <title>Система тестирования</title>
</head>
<body>
<h1>Добро пожаловать в систему тестирования!</h1>
<p>Пожалуйста, авторизуйтесь</p>

        <form method="post">
            <label for="login" >Логин</label>
            <input id="login" name="Auth[login]" />

            <label for="password" >Пароль</label>
            <input type="password" id="password" name="Auth[password]" />
            <button type="submit">Отправить</button>
        </form>

<hr/>

    <form method="post" action="">
        <label for="fio">Чтобы перейти к списку тестов введите свое ФИО: </label>
        <input id="fio" name="fio" value="Иванов Петр Сергеевич" />
        <button type="submit">Перейти</button>
        </form>
</body>
</html>
