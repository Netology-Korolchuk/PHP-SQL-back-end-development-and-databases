<?php error_reporting(E_ALL); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Жестокое обращение с животными</title>
</head>
<body>
<h1>Жестокое обращение с животными</h1>

<?php
$all_animals = array("Eurasia" => array("Giant Panda", "Gharial crocodile", "Mouflon", "Tapir", "Red deer", "Pond turtle", "Indian Rhinoceros", "Praying Mantis", "Bison", "Anser"),
                     "Africa" => array("African Elephant", "Arabian Camel", "Assassin Bug", "Chimpanzee", "Crab", "Fennec Fox", "Forest Giraffe", "Golden Eagle", "Hedgehog", "Redbilled Oxpecker"),
                     "North America" => array("Agouti", "Alaskan Malamute", "American Buffalo", "Baltimore Oriole", "Bighorn Sheep", "Blue Heron", "Bobcat", "Brown Pelican", "Canada Goose", "Crocodile"),
                     "South America" => array("Black Caiman", "Capybara", "Common Iguana", "Dogfish Shark", "Guinea Pig", "Hare", "Hermit Crab", "Lowland Tapir", "Paint Horse", "Plain Xenops"),
                     "Australia" => array("Black Swan", "Dingo", "Frilled Lizard", "Kangaroo", "Minke Whale", "Red Kangaroo", "Sugar Glider", "Ringtail Possum", "Tasmanian Tiger", "Wombat"),
                     "Antarctica" => array("Antarctic Krill", "Arctic Tern", "Emperor Penguin", "Humpback Whale", "Octopus", "Penguin", "Sea Star", "Spectacled Porpoise", "Squid", "Weddell Seal"));


//разделяем массив на массивы первых и вторых слов
foreach ($all_animals as $continents => $animals)
{
    foreach ($animals as $key => $val)
    {
        if (strpos ( $val, ' '))
        {
            $first_words["$continents"][$key] =  substr($val, 0 , strpos ( $val, ' '));
            $second_words["$continents"][$key] = trim(substr($val, (strpos ($val, ' '))));
        }
    }
}

//делаем одномерный массив вторых слов
$only_seconds_words = array();
foreach($second_words as $arr1)
{
        $only_seconds_words = array_merge($only_seconds_words, array_values($arr1));
}

//перемешиваем массив первых слов сохраняя континенты
foreach ($first_words as $key => $val)
{
    shuffle($first_words[$key]);
}
//перемешиваем массив вторых слов
    shuffle($only_seconds_words);

//выводим на экран

$j=0;
foreach ($first_words as $key => $val)
{
    echo "<h1>$key</h1>";
    for($i = 0; $i<count($val); $i++)
    {
        echo $val[$i]." ";
        echo $only_seconds_words[$j];
            if ($i<count($val)-1) echo ", ";
            $j++;
    }
}
?>
</body>
</html>