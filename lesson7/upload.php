<meta charset="utf-8">
<?php
$upload_dir = "uploads/";
$error_dir = "errors/";

//если директории нет - создаем
if (!file_exists($upload_dir) || (file_exists($upload_dir) && !is_dir($upload_dir)))
    {
    mkdir($upload_dir);
    }

//проверить файл на соответствие структуре шаблона
$test_content = file_get_contents($_FILES['test']['tmp_name']);
$arr_test = @json_decode($test_content, true);
//если файл JSON
    if (!empty($arr_test))
        {
//есть ли в структуре такие ключи
        if
        ((array_key_exists('id', $arr_test[0])) &&
        (array_key_exists('question', $arr_test[0])) &&
        (array_key_exists('r_answer', $arr_test[0])))
            {
//название файла теста будет состоять из текущей даты и времени
            $d1 = date("d-m-y");
            $d2 = date("H-i-s");
            $new_file_name = ($d1.'-'.$d2.'.json');
            $upload_file = $upload_dir . $new_file_name;

            if (move_uploaded_file($_FILES['test']['tmp_name'], $upload_file))
                {
//если все нормально - редирект на список тестов
                header('Location: list.php');
                }
            else
                {
//если нет - редирект на ошибку
                header('Location:'.$error_dir.'notest.php');
                }
            }
        else die('Файл JSON не соответствует струтктуре теста...');
        }
//если файл не JSON
    else
        {
        die ('Файл теста не JSON...');
        }
