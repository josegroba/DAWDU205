<?php
require_once(dirname(__FILE__)."/../Interfaces/PersistentInterface.php");
class EventosSessiones implements PersistentInterface {
    private $eventos;
    function __construct(){
        if(session_status()===PHP_SESSION_ACTIVE){
            if(isset($_SESSION["eventos"])){
                $this->eventos=$_SESSION["eventos"];
            }else{
                $this->eventos=[];
            }
        }else{
            session_start();
            $this->eventos=[];
        } 
    }
    function guardar($evento){
        $this->eventos=array_push($this->eventos,$evento);
        $_SESSION["eventos"]=$this->eventos;
    }
    function modificar($evento){
        $id=$evento["id_evento"];
        foreach ($this->eventos as $key => $OLDevento) {
            
        }
    }
    function listar(){
        
    }
    function eliminar($id){
        
    }
}