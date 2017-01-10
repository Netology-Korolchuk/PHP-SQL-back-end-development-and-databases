<?php
session_start();
include 'functions.php';
error_reporting(E_ALL);
if (isset($_SESSION['login']))
{
    echo 'Вы авторизованы как ';
    echo "<b>".$_SESSION['login']."</b>";
    echo '<a href="logout.php"> выйти?</a>';
    echo '<hr/>';
}
else
{
    echo 'Вы авторизованы как ';
    echo "<b>".$_SESSION['fio']."</b>";
    echo '<a href="logout.php"> выйти?</a><hr/>';
}
?>

    <!doctype html>
    <html>
     <head>
        <meta charset="UTF-8" lang="ru">
        <title>Список тестов</title>
    </head>

    <body>
    <b>Список доступных тестов:</b>
        <?php
        $upload_dir = "uploads/";
        $tests = show_tests($upload_dir);
        ?>
    <hr/>
    <form method="get">
        <label for="test_num">Введите номер теста для прохождения:</label>
        <input id="test_num" name="test_num" />
        <button type="submit">Запустить</button>
    </form>
    <hr/>
<?php
    if (!empty($_GET["test_num"]) && (!is_numeric($_GET["test_num"]) || $_GET["test_num"] <= 0))
    {
        http_response_code(400);
        echo 'Введите правильный номер теста';
        die;
    }
    else
    {
        if (!empty($_GET["test_num"]))
            {
            if (array_key_exists($_GET["test_num"], $tests))
                {
                $test_file_path = $upload_dir . $tests[$_GET["test_num"]];
                $test_content = file_get_contents($test_file_path);
                $test_decoded = json_decode($test_content, true);
                //var_dump($test_decoded);
                show_one_test($test_decoded);

                }
                else
                {
                http_response_code(404);
                echo "Ошибка 404. Введите правильный номер теста.";
                die;
                }
            }
    }
?>
    </body>
</html>
