<?php
session_start();
//если запрос пустой, то 400 ошибка
if (empty($_GET["filename"]))
    {
    http_response_code(400);
    die;
    }
//если авторизован админом, то удаляем
if (isset($_SESSION['login']))
    {
    unlink(__DIR__.'/uploads/'.$_GET["filename"]);
    header('Location: list.php');
    }
// если авторизован гостем, то 403 ошибка
else http_response_code(403);
