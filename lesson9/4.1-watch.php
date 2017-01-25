<?php
  class Watch {
    private $type; //тип
    private $caseМaterial; //материал корпуса
    public $color; //цвет
    private $manufacturer; //производитель
    private $productionDate; //дата производства

    private $gps; //наличие GPS
    private $alarmClock; //наличие будильника
    private $timer; //наличие таймера


    public function __construct($type, $caseМaterial, $color, $manufacturer, $productionDate, $gps, $alarmClock, $timer ) {
      $this->type = $type;
      $this->caseМaterial = $caseМaterial;
      $this->color = $color;
      $this->manufacturer = $manufacturer;
      $this->productionDate = $productionDate;
      $this->gps = $gps;
      $this->alarmClock = $alarmClock;
      $this->timer = $timer;
}

//показать время
public function showTime() {
    echo date("H:i:s");
    }
//разбудить
public function wakeUp($aTime) {
//может быть не валидный код - написал для передачи общего смысла
    if ($this->alarmClock = 1 && isset($aTime = date("H:i:s"))) echo 'Проснись и пой!!!';
    }
//если есть GPS, показать где я
public function showWay() {
    if ($this->gps = 1) echo 'Вы сейчас'.$currentPosition;
    }
//установить таймер
public function setTimer($tTime) {
    if ($this->timer = 1) return $tTime;
    else return false;
    }
//запуск таймера
public function getTimer($tTime) {
    sleep($tTime);
    echo 'Дзинь - Дзинь';
    }

$watch1 = new Watch ('Мужские','Золото','Желтые','Orient','12.01.2015', '1', '1', '1');
$watch2 = new Watch ('Мужские','Алюминий','Белые','Seiko','15.11.2013', '0', '1', '1');
$watch3 = new Watch ('Женские','Дерево','Коричневые','Romanson','02.01.2013', '0', '1', '1');
$watch4 = new Watch ('Унисекс','Пластик','Черные','Casio','30.12.2010', '1', '1', '1');
$watch5 = new Watch ('Женские','Золото','Желтые','Q&Q','05.05.2016', '0', '1', '1');

//показать время
$wath1->showTime();

//разбудить
$aTime = 6:0:0; //можно сделать сеттер будильника
$wath2->wakeUp($aTime);

//показать дорогу
$wath3->showWay();  //не покажут - потому что на часах нет GPS

//установить таймер
$tTime = 10;
$wath4->setTimer($tTime);

//запустить таймер
$wath4->getTimer($tTime);


