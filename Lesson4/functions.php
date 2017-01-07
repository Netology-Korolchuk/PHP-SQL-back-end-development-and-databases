<?php

/** операции с названием
 * @return string|mixed
 */

//убрать лишние символы и сделать проверку на знаки препинания
function limit_words($string, $word_limit)
{
    $words = strip_tags ($string);
    $words = explode(" ",$string);
    $words = implode(" ",array_splice($words,0,$word_limit))."...";

//очень странная конструкция но по другому придумать времени не хватает
    if (strpos($words, ".")> 0) $words=substr($words, 0, strpos($words, "."));
    if (strpos($words, ",")> 0) $words=substr($words, 0, strpos($words, ","));
    if (strpos($words, "!")> 0) $words=substr($words, 0, strpos($words, "!"));
    if (strpos($words, "?")> 0) $words=substr($words, 0, strpos($words, "?"));
    if (strpos($words, "#")> 0) $words=substr($words, 0, strpos($words, "#"));
    if (strpos($words, '"')> 0) $words=substr($words, 0, strpos($words, '"'));
    if (strpos($words, ':')> 0) $words=substr($words, 0, strpos($words, ':'));

    return $words;
}


/** получаем результирующий массив только с фото
 * @return array|mixed
 */

function get_result_arr($result)
{
$arr_r[]=''; $j=0; $k=0;
for($i=0; $i < count($result->response); $i++)
    {
//проверяем есть ли вообще вложение
    if (isset($result->response[$i]->attachments))
        {
//+++преобразуем array/stdClass -> array
        $arr1[$j] = json_decode(json_encode($result->response[$i]->attachments), true);

        for($k=0; $k < count($arr1[$j]); $k++)
            {
//если во вложении есть фотография
            if ($arr1[$j][$k]['type'] == 'photo')
                {
                $path_big_photo[$j] = $arr1[$j][$k]['photo']['src_big'];
                $arr_text[$j] = limit_words ($result->response[$i]->text , 5); // текст записи
                $arr_likes[$j] = $result->response[$i]->likes->count; // количество лайков
//формируем результтирующий массив
                $arr_r[$j] = array ("Text" => $arr_text[$j], "Likes" => $arr_likes[$j], "Photo" => $path_big_photo[$j]);
                }
            }
        $j++;
        }
    }
//сортируем по количеству лайков
usort($arr_r, function($a, $b)
        {
        if ($a['Likes'] === $b['Likes'])
        return 0;
        return $a['Likes'] < $b['Likes'] ? 1 : -1;
        });

return $arr_r;
}
