<?php
include_once("Fila.php");
class Tablero{
    private $filas;
    private $numFilas;
    private $combinacion;
    private $contador;

    public function __construct($numFilas=8){
        $this->numFilas=$numFilas;
        $this->contador=0;
        $this->filas=array();
        for($i=0;$i<$numFilas;$i++){
            $this->filas[$i]=new Fila();
        }   
    }
    public function getFilas(){
        return $this->filas;
    }
    public function rellenarFila(Fila $fila){
        $this->filas[$this->contador]=$fila;
        $this->contador++;
    }
    public function rellenarFilaColor(Color $color){
        $this->filas[$this->contador]->rellenaColor($color);
    }
    

}
$tablero=new Tablero();
$filas=$tablero->getFilas();
$fila1=$filas[1];
$colores1=$fila1->getColores();
$color1_1=$colores1[2];
echo $color1_1->getId();
//echo $fila1[2];
//echo $filas[1][2];
//echo (($tablero->getFilas())[1])[2];
echo $tablero->getFilas()[1]->getColores()[2]->getId();

?>