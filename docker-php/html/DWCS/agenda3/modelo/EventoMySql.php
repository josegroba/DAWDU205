<?php
require_once(dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../BD/BDMySql.php");
class EventoMySql extends Evento {
    
    function guardar(){
        
    }
    function modificar(){
        $this->guardar();
    }

    static function listar(){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM evento");
        $stmt->execute();
        if(is_array($stmt)){
            echo "si";
        }else{
            echo "no";
        }
        //echo($stmt["nombre"]);
        $eventos=[];
        foreach($stmt->fetchAll() as $evento){
            $eventos[$evento["id_evento"]]=new EventoMySql($evento["id_evento"],$evento["id_usua"]);
        }
        return $eventos;
    }
    static function eliminar($id){
        
    }

    static function getById($id){
        
    }
}