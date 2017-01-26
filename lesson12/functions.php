<?php
require_once("config.php");

function formToScreen($name, $author, $year){
    echo '
    <form action = "'.$_SERVER['PHP_SELF'].'" method = "GET">
            <input type = "text" name = "name" placeholder="Название книги" value = "'.$name.'"/>
            <input type = "text" name = "author" placeholder="Автор" value = "'.$author.'"/>
            <input type = "text" name = "year" placeholder="Год" value = "'.$year.'"/>
            <input type = "submit" value = "Поиск" />
            <input type="submit" name="clearfilter" value="Сброс фильтров" />
    </form>
    ';
}

function readFromDB($name, $author, $year){
    $pdo = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PASS);
    $query = $pdo->prepare("select * from books WHERE name like :name and author like :author and year like :year");
    $query->bindValue(':name', "%$name%", PDO::PARAM_STR);
    $query->bindValue(':author', "%$author%", PDO::PARAM_STR);
    $query->bindValue(':year', "%$year%", PDO::PARAM_STR);
    $pdo->exec("SET NAMES 'utf8'");
    $query->execute();
    $result = $query->fetchall(PDO::FETCH_ASSOC);
return $result;
}

function clear(){
    if(isset($_GET["clearfilter"])){
        $_GET["name"]=NULL; $_GET["author"]=NULL;$_GET["year"]=NULL;
    }
    if(!isset($_GET["name"])){
        $_GET["name"]=NULL;
    }
    if(!isset($_GET["author"])){
        $_GET["author"]=NULL;
    }
    if(!isset($_GET["year"])){
        $_GET["year"]=NULL;
    }
}
?>
