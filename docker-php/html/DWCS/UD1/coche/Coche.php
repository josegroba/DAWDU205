<?php
require_once("Motor.php");
require_once("Rueda.php");
require_once("Puerta.php");
class Coche{
    private $motor;
    private $ruedas;
    private $puertas;
    private $deposito;

    public function __construct($litros=20){
        $this->motor=new Motor();
        $this->ruedas=[new Rueda(),new Rueda(),new Rueda(),new Rueda()];
        $this->puertas=[new Puerta(),new Puerta()];
        $this->deposito=$litros;
    }
    public function getMotor(){
        return $this->motor;
    }
    public function getRueda($num){
        return $this->ruedas[$num];
    }
    public function getPuerta($num){
        return $this->puertas[$num];
    }
    public function repostar($litros){
        $this->deposito+=$litros;
        return "Ha repostado ".$litros." litros";
    }
    public function __toString(){
        return "Coche: ".$this->motor.", deposito; ".$this->deposito;
    }
}
?>