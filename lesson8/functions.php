<?php
error_reporting(E_ALL);

/**
 * Авторизация
 */
function authorize($user,$user_pass)
{
$path = __DIR__.'/'.'assets'.'/'.'admin.json';
$user_data = json_decode(file_get_contents($path), true);

if($user == $user_data['username'] && $user_pass == $user_data['password'])
    {
    $_SESSION['login'] =  $user_data['username'];
    $_SESSION['password'] =  $user_data['password'];

    header('Location: admin.php');
    }
else
    {
    echo "Логин и пароль не верны, попробуйте еще раз...";
    logout();
    }
}

/**
 * Закрыть сессию
 */

function logout()
{
    session_destroy();
}

/**
 * +++Выводит на экран список тестов
 */
function show_tests ($upload_dir)
{
    if ($current_dir = opendir($upload_dir))
        {
        $i = 1;
        $tests = [];
        while (false !== ($zap = readdir($current_dir)))
            {
            $file_name = basename($zap);
            $file_type = substr($file_name, -4, 4);
            echo "<table><tr>";
            if ($file_type === 'json')
                {
                $tests[$i] = $file_name;
                echo '<td bgcolor="#D3EDF6">Тест № '.$i. ' (файл: '.$tests[$i].')</td>';

//Проверяем авторизацию
                    if (isset($_SESSION['login']))
                    {
                    echo '<td bgcolor="#FFC7CD"><a href="'.'delete.php?filename='.$file_name.'">Удалить</a></td>';
                    }

                $i++;
                }
            echo "</tr></table>";
            }
         }
    return $tests;
}

/**
 * Проверяет правильность ответов
 */
function check_answers ($submitted_answer, $correct_answer)
{
    if (!empty($submitted_answer))
        {
        if ($submitted_answer == $correct_answer)
            {
            echo "<h2>Все ответы правильные!</h2>";
            }
            else
            {
            echo "<h2>Тест решен не верно, попробуйте еще раз...</h2></br>";
            $GLOBALS['incorrect_answer'] = true;
            }
        }
}

/**
 * Показывает выбранный тест, проверяет и выдает сертификат если все ответы верны
 */
function show_one_test ($test_decoded)
{
echo "<form method=\"post\">";
foreach($test_decoded as $key => $val)
    {
//читаем корректные ответы
    $correct_answer[$key] = $test_decoded[$key]['r_answer'];
//выводим вопрос
    echo "<h2>".$test_decoded[$key]['question']."</h2>";
//выводим варианты ответов
    for($i=1; $i < (count($test_decoded[$key])-2); $i++)
        {
        echo $i." - ";
        echo $test_decoded[$key]['answer'.$i]."<br/>";
        }
    echo "<p>Введите номер варианта ответа:</p>";
    echo "<input id=\"answer[$key]\" name=\"answer[$key]\" value=\"\"/>";
    echo "</br>";
    if (!empty($_POST))
        {
        $users_answer[$key] = $_POST['answer'][$key];
        }
    else
        {
        $users_answer[$key] = "";
        }
    }
    echo "<button type=\"submit\">Проверить</button>";
    echo "</form></br>";

//проверяем все ли поля заполнены
    if (in_array("", $users_answer))
        {
        echo "Заполните, пожалуйста, все поля...";
        $all_answer_filled = false;
        }
    else
        {
        echo "Спасибо!";
        $all_answer_filled = true;
        //проверяем правильность решения теста
        check_answers ($correct_answer, $users_answer);
        }

//если все ответы заполнены плавильно рисуем форму получения сертификата
    if ($all_answer_filled !== false && !isset($GLOBALS['incorrect_answer']))
        {
//        echo '<form method="post" action="cert.php">
//        <label for="test_num">Для получения сертификата введите свое ФИО:</label>
//        <input id="user_name" name="user_name" value="Иванов Петр Сергеевич" />
//        <button type="submit">Получить сертификат</button>
//        </form>';
        echo '<h2>Поздравляю Вас ';
        echo $_SESSION['fio'];
        echo '!</h2>';
        echo '<h1><a href="cert.php">Получить сертификат</a></h1>';
//        header('Location: cert.php');
        }
}

 /**
 * +++ Рисует сертификат
 */
function draw_cert ($blank_cert, $font_path, $font_size, $name, $x, $y)
{
//Подключаем изображение
    $real_font_path = realpath(__DIR__ . $font_path);
    $real_image_path = realpath(__DIR__ . $blank_cert);
    $image = imagecreatefrompng($real_image_path);

    $text_color = imagecolorallocate($image, 00, 00, 00);
//Вставляем текст
    imagettftext($image, $font_size, 0, $x, $y, $text_color, $real_font_path, $name);

    imagepng($image);
    imagedestroy($image);
}
