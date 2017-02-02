<?php
error_reporting(E_ALL);
require_once "config.php";
require_once "autoload.php";
$db = new DataBase();
$db->connectToDB();
$tasks = new Tasks($db);
$tasks->action();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TO-DO List</title>
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
<center>
<h1>Список дел</h1>

    <form method="POST">
        <label for="new_task">Новая задача: </label><input type="text" name="new_task" value=""/>
        <input type="submit" name="save" value="Добавить"/>
        <label for="sort">Сортировать по:</label>
        <select name="sort_by">
            <option value="date_added">Дате добавления</option>
            <option value="is_done">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" name="sort" value="Отсортировать" />
    </form>
<?php $allTasks = $tasks->allTasks(); ?>
<table>
    <tr>
        <th>Дата добавления</th>
        <th>Описание задачи</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($allTasks as $task): ?>
    <tr>
        <td>
            <?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
            <form method="post">
                <input type="text" name="new_date_added" value="<?php echo $task['date_added']?>">
            <?php else: echo $task['date_added'];
            endif; ?>
        </td>
        <td><?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
                    <input type="text" name="new_description" value="<?php echo $task['description']?>">
            <?php else: echo $task['description'];
            endif; ?></td>
        <td><?php if (isset($_POST['change']) && $_POST['change'] == $task['id']): ?>
                <select name="new_is_done">
                    <option value="0">Не выполнено</option>
                    <option value="1">В процессе</option>
                    <option value="2">Выполнено</option>
                </select>
                    <button type="submit" name="change_id" value="<?php echo $task['id']?>">Сохранить</button>
                </form>
            <?php else: echo $task['is_done'];
            endif; ?></td>
        <td>
            <form method="post">
                <?php if ($task['is_done'] !== 'Выполнено') : ?>
                    <button type="submit" value="<?php echo $task['id']?>" name="mark_as_done">Выполнить</button>
                <?php endif; ?>
                <button type="submit" value="<?php echo $task['id']?>" name="change">Изменить</button>
                <button type="submit" value="<?php echo $task['id']?>" name="delete">Удалить</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</center>
</body>
</html>

