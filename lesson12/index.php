<?php
require_once("functions.php");
clear();
$arrayFromDB = readFromDB(trim($_GET["name"]),trim($_GET["author"]),trim($_GET["year"]));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Библиотека успешного человека</title>
        <style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }
    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    table th {
        background: #eee;
    }
        </style>
    </head>
    <body>
        <center><h2> Библиотека успешного человека </h2>
        <?php formToScreen($_GET["name"],$_GET["author"],$_GET["year"]);?>
    </br>
        <table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>
<?php
if ($arrayFromDB != NULL) {
    foreach ($arrayFromDB as $row){
        echo "<tr><td> ";
        echo $row["name"];
        echo "</td><td>";
        echo $row["author"];
        echo "</td><td>";
        echo $row["year"];
        echo "</td><td>";
        echo $row["genre"];
        echo "</td><td>";
        echo $row["isbn"];
        echo "</td></tr>";
    }
}
?>
</table></center>
    </body>
</html>
