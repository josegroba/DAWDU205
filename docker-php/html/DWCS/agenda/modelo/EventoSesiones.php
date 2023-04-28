<?php
require_once(dirname(__FILE__)."/../Interfaces/PersistentInterfaceEventos.php");
class EventosSessiones implements PersistentInterfaceEventos {
    private $eventos=[];
    function __construct(){
        if(session_status()===PHP_SESSION_ACTIVE){
            if(isset($_SESSION["eventos"])){
                $eventosSerializados=$_SESSION["eventos"];
                foreach ($eventosSerializados as $key => $eventoSerializado) {
                    $evento =new Evento(1,1);
                    $evento->__unserialize($eventoSerializado);
                    array_push($this->eventos,$evento);
                }
            }else{
                $prueba1=new Evento(1,1,"prueba1",new DateTime(),new DateTime());
                $prueba2=new Evento(2,1,"prueba2",new DateTime(),new DateTime());
                $prueba3=new Evento(3,1,"prueba3",new DateTime(),new DateTime());
                self::guardar($prueba1);
                self::guardar($prueba2);
                self::guardar($prueba3);
            }
        }else{
            session_start();
        } 
    }
    function guardar(Evento $evento){
        array_push($this->eventos,$evento);
        $eventosSerializados=[];
        if(isset($_SESSION["eventos"])){
            $eventosSerializados=$_SESSION["eventos"];
        }
        array_push($eventosSerializados,$evento->__serialize());
        $_SESSION["eventos"]=$eventosSerializados;
    }
    function modificar(Evento $evento){
        $id=$evento->getIdEvento();
        $eventosSerializados=[];
        foreach ($this->eventos as $key =>$OLDevento) {
            if($OLDevento->getIdEvento()==$id){
                $this->eventos[$key]=$evento;
                array_push($eventosSerializados,$evento->__serialize());
            }else{
                array_push($eventosSerializados,$OLDevento->__serialize());
            }
        }
        $_SESSION["eventos"]=$eventosSerializados;
    }
    function listar(){
        return $this->eventos;
    }
    function eliminar($id){
        foreach ($this->eventos as $key => $evento) {
            if($evento->getIdEvento()==$id){
                unset($this->eventos[$key]);
            }
        }
    }
}