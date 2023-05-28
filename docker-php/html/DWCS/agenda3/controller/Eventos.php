<?php
require_once(dirname(__FILE__)."/../modelo/EventoSesiones.php");
require_once(dirname(__FILE__)."/../modelo/EventoMySql.php");
require_once(dirname(__FILE__)."/../modelo/EventoMongo.php");
require_once(dirname(__FILE__)."/../session/Sesiones.php");
class Eventos{

    static private function getTipoEvento() {
       $tipo = null;
        switch( $_SESSION["tipo"]){
            case 'sesiones':
                $tipo = EventoSesiones::class;
                break;
            case 'mysql':
                $tipo = EventoMySql::class;
                break;
            case 'mongo':
                $tipo = EventoMongo::class;
                break;
        }
        return $tipo;
    }

    static function guardar($id_evento,$id_usuario,$nombre,$fecha_inicio=null,$fecha_fin=null){
        $evento=new (Eventos::getTipoEvento())($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();
    }
    static function Listar() {
        return Eventos::getTipoEvento()::listar();
    }
    static function Eliminar($id) {
        Eventos::getTipoEvento()::eliminar($id);
    }
    static function getById($id){
        return Eventos::getTipoEvento()::getById($id);
    }
}
?>