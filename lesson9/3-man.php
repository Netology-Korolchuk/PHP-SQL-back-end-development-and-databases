<?php
  class Man {
    private $age; //возраст
    public $weight; //вес
    public $growth; //рост
    public $name; //имя
    private $birthdate; //дата рождения
    private $gender; //пол


    public function __construct($age, $weight, $growth, $name, $birthdate, $gender) {
      $this->age = $age;
      $this->weight = $weight;
      $this->growth = $growth;
      $this->name = $name;
      $this->birthdate = $birthdate;
      $this->gender = $gender;
}

//родиться
public function born() {
    }
//жениться/выйти замуж
public function marriage() {
    }
//работать
public function work() {
    }
//отдыхать
public function rest() {
    }
//умереть
public function passAway() {
    }

}

$man1 = new Man ('33','100','180','Василий','01.12.1984','М');
$man2 = new Man ('20','45','160','Елена','01.12.1997','Ж');
$man3 = new Man ('37','90','180','Геннадий','01.12.1980','М');
$man4 = new Man ('19','55','156','Ольга','05.04.1998','Ж');
$man5 = new Man ('23','50','167','Марина','07.11.1994','Ж');


?>
