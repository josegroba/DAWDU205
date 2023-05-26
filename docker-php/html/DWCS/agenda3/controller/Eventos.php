<?php
require_once(dirname(__FILE__)."/../modelo/EventoSesiones.php");
require_once(dirname(__FILE__)."/../modelo/EventoMySql.php");
require_once(dirname(__FILE__)."/../modelo/EventoMongo.php");
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
        $tipo = Eventos::getTipoEvento();
       // $evento=new $tipo($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
       $evento=new (Eventos::getTipoEvento())($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();

        /* $this->evento->setIdEvento($id_evento);
        $this->evento->setIdUsuario($id_usuario);
        $this->evento->setNombre($nombre);
        $this->evento->setFechaInicio($fecha_inicio);
        $this->evento->setFechaFin($fecha_fin);
        $this->evento->guardar();*/
        
        /*
        $evento=new EventoSesiones($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();
        */
        /*
        $evento=new EventoMySql($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();
        */
        /*
        $evento=new EventoMongo($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();
        //*/
    }
    static function Listar() {
      // $tipo = Eventos::getTipoEvento();
        return Eventos::getTipoEvento()::listar();
        /*
        return EventoSesiones::listar();
        */
        /*
        return EventoMySql::listar();
        */
        /*
        $evento=new EventoMongo(null,1);
        //return $evento::listar();
        return EventoMongo::listar();
*/
    }

    static function Eliminar($id) {
        /*
        EventoSesiones::eliminar($id);
        */
        /*
        EventoMySql::eliminar($id);
        */
        //*
        Eventos::getTipoEvento()::eliminar($id);
        //*/
    }

    static function getById($id){
        /*
        return EventoSesiones::getById($id);
        //*/
        /*
        return EventoMySql::getById($id);
        //*/
        //*
        return Eventos::getTipoEvento()::getById($id);
        //*/
    }
}
?>