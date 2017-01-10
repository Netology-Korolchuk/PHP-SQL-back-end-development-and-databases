<?php
session_start();
include 'functions.php';
error_reporting(E_ALL);

if (isset($_SESSION['fio']))
{
header('Content-Type: image/png');
header('Content-Disposition: inline; filename="certificate.png"');

//$name = htmlspecialchars($_POST['user_name']);
$name = htmlspecialchars($_SESSION['fio']);
draw_cert('/assets/certificate.png', '/assets/font.ttf', 50, $name, 200, 305);
}
else echo "Not FIO...";