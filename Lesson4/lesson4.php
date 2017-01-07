<?php include 'functions.php';
error_reporting(E_ALL);

if (isset($_POST['q'])) {
// преобразуем запрос в URL
		$query = urlencode($_POST['q']);
// отправляем запрос
		$result = file_get_contents("https://api.vk.com/method/newsfeed.search?q=" . $query);
		$result = json_decode($result); // Преобразуем JSON-строку в массив
// проверяем вернулось ли что-нибудь
		if ($result->response[0] == null) {
				echo "Вконтакт не отвечает... попробуйте другой запрос";
		}
		$a=get_result_arr($result);
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Читаем новости Вконтакте</title>
</head>
<body>
<h1>Сервис вывода новостей из Вконтакта</h1>
<p>Введите запрос:</p>
                <form method="POST">
                <input name="q" size="30" value="с новым годом"/>
                <input type="submit" value="Получить данные">
                </form>

<?php
//можно было подключить bootstrap - но не успел
if (isset($a))
    {
    for($i=0; $i < count($a); $i++)
        {
        echo "<h2>".$a[$i]['Text']."</h2>";
        echo '<img src="';
        echo $a[$i]['Photo'];
        echo '"/>';
        echo '<br/>Лайкнуло: ';
        echo $a[$i]['Likes']."<br/>";
        }
    }
?>

</body>
</html>
