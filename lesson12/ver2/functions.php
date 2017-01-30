<?php
require_once("config.php");

function formToScreen($name, $author, $year){
    echo '
    <form action = "'.htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES).'" method = "POST">
            <input type = "text" name = "name" placeholder="Название книги" value = "'.htmlspecialchars($name, ENT_QUOTES).'"/>
            <input type = "text" name = "author" placeholder="Автор" value = "'.htmlspecialchars($author, ENT_QUOTES).'"/>
            <input type = "text" name = "year" placeholder="Год" value = "'.htmlspecialchars($year, ENT_QUOTES).'"/>
            <input type = "submit" value = "Поиск" />
            <a href="?"> Сброс фильтров </a>
    </form>
    ';
}

function connectToDB()
    {
// Параметры задают что в качестве ответа получаем ассоциативный массив
    $options = array(PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
                     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
// Проверка корректности подключения
    global $pdo;
    try { $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS, $options);
          $pdo->exec("SET NAMES 'utf8'"); }
    catch (PDOException $e) { die('Подключение не удалось: ' . $e->getMessage()); }
    }


function readFormField($field)
    {
       if(!isset($_POST[$field])) {
        $_POST[$field]=NULL;
        } else {
        $field = htmlspecialchars(trim($_POST[$field]));
        return $field;
        }
   }

function readFromDB($pdo, $name, $author, $year){

    $where = [];
    $inputVars = [];

    $sql = "select * from books";

    if ($name) {
        $where[] = "name like :name";
        $inputVars["name"] = $name;
    }
    if ($author) {
        $where[] = "author like :author";
        $inputVars["author"] = $author;
    }
    if ($year) {
        $where[] = "year =:year";
        $inputVars["year"] = $year;
    }
    if (count($where)) {
    $sql .= " WHERE " . join(" AND ", $where);
    }

    $query = $pdo->prepare($sql);
    $query->execute($inputVars);
    $result = $query->fetchall(PDO::FETCH_ASSOC);

return $result;
}

?>
