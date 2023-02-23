<?php

class Evento{
    private static $num_eventos=0;
    private $id_evento;
    private $nombre;
    private DateTime $fecha_inicio;
    private DateTime $fecha_fin;
    private $id_usuario;

    public function __construct($id_usuario=null,$nombre=null,DateTime $fecha_inicio=null,DateTime $fecha_fin=null){
        if($id_usuario==null){
            throw new Exception("El evento necesita un usuario asignado");
        }
        if($fecha_inicio==null){

        }
        $this->num_eventos=$this->num_eventos +1;
        $this->id_evento=$this->num_eventos;
    }

    public function getIdEvento(){
        return $this->id_evento;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getFechaInicio(){
        return $this->fecha_inicio;
    }
    public function getFechaFin(){
        return $this->fecha_fin;
    }
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function setIdEvento($id){
        $this->id_evento=$id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setFechaInicio(DateTime $fecha){
        $this->fecha_inicio=$fecha;
    }
    public function setFechaFin(DateTime $fecha){
        $this->fecha_fin=$fecha;
    }
    public function setIdUsuario($id){
        $this->id_usuario=$id;
    }
}

?>