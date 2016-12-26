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
$Eurasia = array("Giant Panda", "Gharial crocodile", "Mouflon", "Tapir", "Red deer", "Pond turtle", "Indian Rhinoceros", "Praying Mantis", "Bison", "Anser");
$Africa = array("African Elephant", "Arabian Camel", "Assassin Bug", "Chimpanzee", "Crab", "Fennec Fox", "Forest Giraffe", "Golden Eagle", "Hedgehog", "Redbilled Oxpecker");
$North_A = array("Agouti", "Alaskan Malamute", "American Buffalo", "Baltimore Oriole", "Bighorn Sheep", "Blue Heron", "Bobcat", "Brown Pelican", "Canada Goose", "Crocodile");
$South_A = array("Black Caiman", "Capybara", "Common Iguana", "Dogfish Shark", "Guinea Pig", "Hare", "Hermit Crab", "Lowland Tapir", "Paint Horse", "Plain Xenops");
$Australia = array("Black Swan", "Dingo", "Frilled Lizard", "Kangaroo", "Minke Whale", "Red Kangaroo", "Sugar Glider", "Ringtail Possum", "Tasmanian Tiger", "Wombat");
$Antarctica = array("Antarctic Krill", "Arctic Tern", "Emperor Penguin", "Humpback Whale", "Octopus", "Penguin", "Sea Star", "Spectacled Porpoise", "Squid", "Weddell Seal");

//откидываем названия состоящие из одного слова
function only_two_word($arr_tw) {
		for ($i = 0; $i < count($arr_tw); $i++) {
				$space = (strrpos($arr_tw[$i], ' '));
				if ($space === false) {
				}
				else {
						$otw[$i] = $arr_tw[$i];
				}
		}
		return $otw;
}
//возвращаем массив первых слов
function first_word($arr_fw) {
		$im_str = implode(' ', $arr_fw);
		$ex_str = explode(' ', $im_str);
		for ($i = 0; $i < count($ex_str); $i++) {
				if ($i % 2 === 0) {
						$arr_w1[$i] = $ex_str[$i];
				}
		}
		return $arr_w1;
}
//возвращаем массив вторых слов
function second_word($arr_sw) {
		$im_str = implode(' ', $arr_sw);
		$ex_str = explode(' ', $im_str);
		for ($i = 0; $i < count($ex_str); $i++) {
				if ($i % 2 != 0) {
						$arr_w2[$i] = $ex_str[$i];
				}
		}
		return $arr_w2;
}
//делаем общий массив первых слов с привязкой к континентам
$arr_fw_all = array("Eurasia" => first_word(only_two_word($Eurasia)),
                    "Africa" => first_word(only_two_word($Africa)),
                    "North America" => first_word(only_two_word($North_A)),
                    "South America" => first_word(only_two_word($South_A)),
                    "Australia" => first_word(only_two_word($Australia)),
                    "Antarctica" => first_word(only_two_word($Antarctica)));

//делаем общий массив вторых слов с переиндексацией
$arr_sw_all = array_merge(second_word(only_two_word($Eurasia)),
                          second_word(only_two_word($Africa)),
                          second_word(only_two_word($North_A)),
                          second_word(only_two_word($South_A)),
                          second_word(only_two_word($Australia)),
                          second_word(only_two_word($Antarctica)));

//перемешиваем значения массива вторых слов
shuffle($arr_sw_all);

foreach ($arr_fw_all as $key => $vol) {
//выводим континенты
		echo "<h2>" . $key . "</h2>";
//переиндексируем ключи в массиве первых слов
		$res = array_merge($arr_fw_all[$key]);

		for ($i = 0; $i < count($res); $i++) {
				$j = 0;
				echo $res[$i] . " " . $arr_sw_all[$j];
//уменьшаем массив вторых слов на одно значение
				array_shift($arr_sw_all);
//не рисоуем запятую в конце строки
				if ($i < count($arr_fw_all[$key]) - 1) {
						echo ", ";
				}
		}
}
?>

</body>
</html>