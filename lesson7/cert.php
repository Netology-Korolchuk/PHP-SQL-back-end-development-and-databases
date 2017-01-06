<?php
include 'functions.php';
error_reporting(E_ALL);

header('Content-Type: image/png');
header('Content-Disposition: inline; filename="certificate.png"');

$name = htmlspecialchars($_POST['user_name']);
draw_cert('/assets/certificate.png', '/assets/font.ttf', 50, $name, 200, 305);