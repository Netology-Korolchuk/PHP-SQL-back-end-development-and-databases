<!doctype html>
<html>
<head>
    <meta charset="UTF-8" lang="ru">
    <title>Загрузите тест</title>
</head>
<body>
<form action="upload.php" method="post" id="upload_test" enctype="multipart/form-data">
    Выберите файл теста для загрузки в формате JSON:
    <input type="file" name="test" id="test">
    <button name="submit" type="submit" value="submit">Загрузить</button>
</form>
<hr/>
    <a href="help.php">Справка по структуре теста</a>
</body>
</html>
