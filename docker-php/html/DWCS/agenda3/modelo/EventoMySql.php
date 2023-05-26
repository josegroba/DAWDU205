<?php
require_once(dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../BD/BDMySql.php");
class EventoMySql extends Evento {
    
    function guardar(){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("REPLACE into evento(id_evento,id_usuario,nombre,fecha_inicio,fecha_fin) 
                                VALUES (:id_evento, :id_usuario, :nombre, :fecha_inicio, :fecha_fin)
                            ");
        $stmt->execute([":id_evento"=>$this->getIdEvento(),
                        ":id_usuario"=>$this->getIdUsuario(),
                        ":nombre" => $this->getNombre(),
                        ":fecha_inicio" => $this->getFechaInicio()->format('Y-m-d H:i:s'),
                        ":fecha_fin" => $this->getFechaFin()->format('Y-m-d H:i:s')
                        ]);   
    }

    static function listar(){
        $usuario=Sesiones::getSesiones();
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM evento WHERE id_usuario=:id_usuario");
        $stmt->execute([":id_usuario"=>$usuario->getId()]);
        $eventos=[];
        foreach($stmt->fetchAll() as $evento){
            $id_evento =$evento["id_evento"];
            $id_usuario=$evento["id_usuario"];
            $nombre=$evento["nombre"];
            $fecha_inicio=new DateTime($evento["fecha_inicio"]);
            $fecha_fin=new DateTime($evento["fecha_fin"]);
            $eventos[$evento["id_evento"]]=new EventoMySql($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        }
        return $eventos;
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