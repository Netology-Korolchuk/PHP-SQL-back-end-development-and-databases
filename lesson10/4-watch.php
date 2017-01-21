<?php
//родительский класс - устройство
class Device {
    public $size; //размер
    public $color; //цвет
    }

interface WatchInterface {
    public function someFunction($argument1, $argument2);
    }

//дочерний класс - часы
  class Watch extends Device implements WatchInterface {
    public $type; //тип
    public $caseМaterial; //материал корпуса
    public $color; //цвет
    private $manufacturer; //производитель
    private $productionDate; //дата производства


    public function __construct($type, $caseМaterial, $color, $manufacturer, $productionDate) {
      $this->type = $type;
      $this->caseМaterial = $caseМaterial;
      $this->color = $color;
      $this->manufacturer = $manufacturer;
      $this->productionDate = $productionDate;
    }

}

$watch1 = new Watch ('Мужские','Золото','Желтые','Orient','12.01.2015');
$watch2 = new Watch ('Мужские','Алюминий','Белые','Seiko','15.11.2013');
$watch3 = new Watch ('Женские','Дерево','Коричневые','Romanson','02.01.2013');
$watch4 = new Watch ('Унисекс','Пластик','Черные','Casio','30.12.2010');
$watch5 = new Watch ('Женские','Золото','Желтые','Q&Q','05.05.2016');


?>
