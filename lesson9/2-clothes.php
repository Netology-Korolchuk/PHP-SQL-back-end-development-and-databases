<?php
  class Сlothes {
    public $size; //размер
    public $color; //цвет
    public $season; //сезон
    public $material; //материал
    private $productionDate; //дата производства



    public function __construct($size, $color, $season, $material, $productionDate) {
      $this->size = $size;
      $this->color = $color;
      $this->season = $season;
      $this->material = $material;
      $this->productionDate = $productionDate;
}

//греть, когда холодно
public function warm() {
    }
//охлаждать, когда жарко
public function cool() {
    }
//защищать от ветра
public function protectWind() {
    }
//защищать от дождя
public function protectRain() {
    }
//улучшать имидж
public function improveImage() {
    }

}

$clothes1 = new Сlothes ('52','Красный','Лето','Хлопок','01-10-2016');
$clothes2 = new Сlothes ('48','Черный','Зима','Пух','10-12-2015');
$clothes3 = new Сlothes ('36','Коричневый','Осень','Шерсть','30-11-2014');
$clothes4 = new Сlothes ('44','Зеленый','Весна','Норка','01-11-2012');
$clothes5 = new Сlothes ('56','Черный','Лето','Хлопок','01-10-2013');


?>
