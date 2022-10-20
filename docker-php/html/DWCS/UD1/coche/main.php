<?php
include_once("Coche.php");

$coche=new Coche();
echo $coche->getMotor();
echo $coche->getMotor()->arrancar();
echo $coche->getMotor();
echo $coche->getMotor()->arrancar();
?>