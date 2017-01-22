<?php
namespace Doctor;
echo 'Класс Доктор загружен!<br/>';
interface DoctorMethod
{
    public function getPatient($patient);
    public function writingRecipe(array $drugs, $patient);
}

class Doctor implements DoctorMethod
{
    private $nameDoctor;

    function __construct($nameDoctor)
    {
        $this->nameDoctor=$nameDoctor;
    }

    public function getPatient($patient)
    {
        echo "Пациент: <b>$patient->namePatient</b>. Принял врач: <b>$this->nameDoctor</b>. ";
    }

    public function writingRecipe(array $drugs, $patient)
    {
        echo "Врач <b>$this->nameDoctor</b> выписал пациенту <b>$patient->namePatient</b> следующий рецепт:<br>";
        foreach($drugs as $nameDrug)
        {
            echo " - $nameDrug <br/>";
        }
        echo "<hr/>";
        $patient->takeDrag($drugs);
    }
}


