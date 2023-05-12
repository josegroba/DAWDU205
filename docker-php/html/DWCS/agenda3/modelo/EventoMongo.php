<?php
require_once(dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../BD/BDMongo.php");
class EventoMongo extends Evento {
    
    function guardar(){
         
    }

    static function listar(){
        //Bd::getConexion();
        /*
        $cursor = BD::getConexion()->eventos->find();
        $cursor->setTypeMap(['root' => Contacto::getClass()]);
        $eventos = $cursor->toArray(); 
        return $eventos;*/
    }
    static function eliminar($id){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("DELETE FROM evento where id_evento = :id");
        $stmt->execute([":id"=>$id]);
    }

    static function getById($id){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM evento where id_evento = :id");
        $stmt->execute([":id"=>$id]);
        $datos = $stmt->fetch();
        $id_evento =$datos["id_evento"];
        $id_usuario=$datos["id_usuario"];
        $nombre=$datos["nombre"];
        $fecha_inicio=new DateTime($datos["fecha_inicio"]);
        $fecha_fin=new DateTime($datos["fecha_fin"]);
        $evento=new EventoMySql($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        return $evento;
    }
}