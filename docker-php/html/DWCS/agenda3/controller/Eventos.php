<?php
require_once(dirname(__FILE__)."/../modelo/EventoSesiones.php");
class Eventos{
    private $tipoAplicacion="sesiones";
    private static function getEventos() {
        /*$eventosSesiones=new EventosSessiones();
        self::$eventos=$eventosSesiones->listar();
        return self::$eventos;*/
    }
    static function guardar($id_evento,$id_usuario,$nombre,$fecha_inicio=null,$fecha_fin=null){
        $evento=new EventoSessiones($id_evento,$id_usuario,$nombre,$fecha_inicio,$fecha_fin);
        $evento->guardar();
    }
    static function Listar() {
        return EventoSessiones::listar();
    }

    static function Eliminar($id) {
        EventoSessiones::eliminar($id);
    }
}
?>