<?php
namespace Patient;
echo 'Класс Пациент загружен!<br/>';
interface PatientMethod
{
  public function takeDrag(array $drugs);
}

class Patient implements PatientMethod
{
  public $namePatient;

  function __construct($namePatient)
  {
    $this->namePatient=$namePatient;
  }

  public function takeDrag(array $drugs)
  {
        foreach($drugs as $nameDrug)
        {
        $nD = New \Drug\Drug($nameDrug);
        $nD->takeMe();
        }

  }
}


