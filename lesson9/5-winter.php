<?php
  class Winter {

    public $year; //год
    public $averageTemperature; //средняя температура
    public $snowLevel; //количество снега
    public $sunnyDays; //количество солнечных дней
    public $windPower; //средняя сила ветра
    

    public function __construct($year, $averageTemperature, $snowLevel, $sunnyDays, $windPower) {
      $this->year = $year;
      $this->averageTemperature = $averageTemperature;
      $this->snowLevel = $snowLevel;
      $this->sunnyDays = $sunnyDays;
      $this->windPower = $windPower;
}

//приходить
public function come() {
    }
//уходить
public function leave() {
    }
//радовать
public function delight() {
    }
//злиться
public function angry() {
    }
//морозить
public function freeze() {
    }

}

$winter1 = new Winter('2011','-23','36','44','5');
$winter2 = new Winter('2012','-30','20','60','15');
$winter3 = new Winter('2013','-11','60','25','3');
$winter4 = new Winter('2014','-22','38','50','8');
$winter5 = new Winter('2015','-5','80','12','12');


?>
