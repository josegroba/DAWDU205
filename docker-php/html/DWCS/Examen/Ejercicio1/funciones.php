<?php

use Nif as GlobalNif;

class Nif{
    private $numero;
    private $letra;
    
    public function __construct($num=0){
        if($num==0){
            $this->numero="";
            for($i=0;$i<8;$i++){
                $rand=rand(0,9);
                $this->numero=$this->numero.$rand;
            }
        }
        else{
            $this->numero=$num;
        }
        $this->letra= $this->calcularLetra($this->numero);
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($num){
        $this->numero=$num;
        $this->letra= $this->calcularLetra($num);
    }
    public function mostrar(){
        return $this->numero.$this->letra;
    }
    function calcularLetra($num){
        $letras="TRWAGMYFPDXBNJZSQVHLCKE";
        return substr($letras,$num%23,1);
    }
    public function leer(){
        $num=readline("Introduce un numero de dni:");
        return $this->calcularLetra($num);
    }
    public function comprobarNif($nif){
        $correcto=false;
        if((strtoupper(substr($nif,(strlen($nif)-1),1)))==($this->calcularLetra(substr($nif,0,(strlen($nif)-1))))){
            $correcto=true;
        }
        return $correcto;
    }
}

function generaNif(){
    $nif=new Nif();
    return $nif->mostrar();
}
function generaArray($filas,$columnas){
    $array=[];
    for($i=0;$i<$filas;$i++){
        for($z=0;$z<$columnas;$z++){
            $array[$i][$z]=generaNif();
        }
    }
    return $array;
}
function pintaArray($array){
    $mensaje="";
    for($fila=0;$fila<count($array);$fila++){
        for($columna=0;$columna<count($array[$fila]);$columna++){
            $mensaje=$mensaje.$array[$fila][$columna]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        $mensaje=$mensaje."<br/>";
    }
    return $mensaje;
}
function modificaArray($array){
    for($fila=0;$fila<count($array);$fila++){
        for($columna=0;$columna<count($array[$fila]);$columna++){
            if(substr($array[$fila][$columna],8,1)=="A"||
            substr($array[$fila][$columna],8,1)=="E"){
                $num=substr($array[$fila][$columna],0,8);
                $n=encontrarMayor($num);
                $numeroNuevo=$n.$n.$n.$n.$n.$n.$n.$n;
                $dni=new Nif($numeroNuevo);
                $array[$fila][$columna]="<strong>".$dni->mostrar()."</strong>";
            }
        }
    }
    return $array;
}
function cargarEjercicio(){
    $ejercicio=[];
    $ejercicio[0]=0;
    $ejercicio[1]=0;
    $ejercicio[2]="";
    if(isset($_SESSION["filas"])){
        $ejercicio[0]=$_SESSION["filas"];
        $ejercicio[1]=$_SESSION["columnas"];
        $ejercicio[2]=$_SESSION["mensaje"];
    }
    return $ejercicio;
}
function guardarEjercicio($filas,$columnas,$mensaje){
    $_SESSION["filas"]=$filas;
    $_SESSION["columnas"]=$columnas;
    $_SESSION["mensaje"]=$mensaje;
}
function tratarEntrada($entrada){
    $ejercicio=[];
    if(trim($entrada)==""){
        $ejercicio[0]=0;
        $ejercicio[1]=0;
    }else{
        $array=explode(",",$entrada);
        $ejercicio[0]=trim($array[0]);
        if(trim($array[1])==""){
            $ejercicio[1]=trim($array[0]);
        }else{
            $ejercicio[1]=trim($array[1]);
        }
    }
    return $ejercicio;
}
function comprobarEntrada($entrada){
    $toret=false;
    if(trim($entrada)==""){
        $toret=true;
    }else{
        $array=explode(",",$entrada);
        if(count($array)==2){
            if(is_numeric($array[0])&&$array[0]>0&&is_numeric($array[1])&&$array[1]>0){
                $toret=true;
            }
            if(is_numeric($array[0])&&$array[1]==""){
                $toret=true;
            }
        }
    }
    return $toret;
}
function encontrarMayor($num){
    $mayor=0;
    for($i=0;$i<8;$i++){
        if($num[$i]>$mayor){
            $mayor=$num[$i];
        }
    }
    return $mayor;
}
?>