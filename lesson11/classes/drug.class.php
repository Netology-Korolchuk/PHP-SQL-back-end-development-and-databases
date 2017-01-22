<?php
namespace Drug;
echo 'Класс Лекарства загружен!<br/>';
interface DrugMethod
{
  public function takeMe();
}

class Drug implements DrugMethod
{
  private $nameDrug;

  public function __construct($nameDrug)
  {
    $this->nameDrug=$nameDrug;
  }

  public function takeMe()
  {
    echo "Лекарство <b>". $this->nameDrug . "</b> говорит: 'Я выпито!'.<br/>";
  }
}


