<?php
class Alumno{
    private $nombre;
    private $apellidos;
    private $nif;
    private $sexo;
    
    public function __construct($nombre,$apellido1,$apellido2,$nif,$sexo){
        $this->nombre=$nombre;
        $this->apellidos=[$apellido1,$apellido2];
        $this->nif=$nif;
        $this->sexo=$sexo;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getNif(){
        return $this->nif;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellidos($apellido1,$apellido2){
        $this->apellidos=[$apellido1,$apellido2];
    }
    public function setNif($nif){
        $this->nif=$nif;
    }
    public function setSexo($sexo){
        $this->sexo;
    }
    public function __toString(){
        return $this->nombre." ".$this->apellidos[0]." ".$this->apellidos[1]." Nif: ".$this->nif." Sexo: ".$this->sexo;
    }
}
?>