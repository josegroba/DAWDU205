<?php
include_once("Color.php");
class Fila{
    private const num_colores=4;
    private $colores;
    private $contador;

    public function __construct(){
        $this->contador=0;
        $this->colores=array();
        for($i=0;$i<Fila::num_colores;$i++){
            $this->colores[$i]=new Color();
        }     
    }
    public function getColores(){
        return $this->colores;
    }
    public function rellenaColor(Color $color){
        if($this->contador<Fila::num_colores){
            $this->colores[$this->contador]=$color;
            $this->contador++;
        }
    }
    public function comparar(Fila $fila){
        $toret=false;
        if($this->colores==$fila->getColores()){
            $toret=true;
        }
        return $toret;
    }
}
?>