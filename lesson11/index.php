<?php
require ('autoload.php');
echo '<hr/>';

//создаем сначала новые объекты - доктор - пациент - лекарство
//вариант 1
$doctor = New Doctor\Doctor("Иван Васильевич Трегубов");
$patient = New Patient\Patient('Миша');
$drugs= ['Аспирин','Пурген', 'Новокаин','Глазные капли','Клизма'];

//вариант 2
$doctor1 = New Doctor\Doctor("Василий Викторович Мальчиков");
$patient1 = New Patient\Patient('Анастасия');
$drugs1 = ['Новокаин','Глазные капли'];


//описываем действия 1
$doctor->getPatient($patient);
echo "<hr/>";
$doctor->writingRecipe($drugs, $patient);
echo "<hr/>";

//описываем действия 2
$doctor1->getPatient($patient1);
echo "<br/> а также <br/>";
$doctor1->getPatient($patient);
echo "<hr/>";
$doctor1->writingRecipe($drugs, $patient1);
echo "<hr/>";
$doctor1->writingRecipe($drugs1, $patient);
