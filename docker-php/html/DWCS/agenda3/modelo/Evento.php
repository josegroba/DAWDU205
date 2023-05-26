<?php

require_once(dirname(__FILE__)."/../Interfaces/PersistentInterfaceEventos.php");

abstract class Evento implements PersistentInterfaceEventos{

    public function __construct(
                    protected $id_evento=null,
                    protected $id_usuario=null,
                    protected $nombre=null,
                    protected ?DateTime $fecha_inicio=null,
                    protected ?DateTime $fecha_fin=null ){
        if(is_null($this->id_usuario)){
            throw new Exception("El evento necesita un usuario asignado");
        }

        

        if($fecha_inicio==null){
            $this->fecha_inicio = new DateTime();
        }


        if ($this->fecha_fin == null) {
            $this->fecha_fin = clone $this->fecha_inicio;
            $this->fecha_fin->modify('+ 1 hour');
        }

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


    
    abstract function guardar();
    abstract static function listar();
    abstract static function eliminar($id);
    abstract static function getById($id);

}