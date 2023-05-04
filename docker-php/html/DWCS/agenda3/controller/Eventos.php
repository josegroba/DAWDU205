<?php
require_once (dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../modelo/EventoSesiones.php");
class Eventos{
    private $tipoAplicacion="sesiones";
    private static function getEventos() {
        /*$eventosSesiones=new EventosSessiones();
        self::$eventos=$eventosSesiones->listar();
        return self::$eventos;*/
    }
    static function Listar() {
        return EventoSessiones::listar();
    }

    static function Eliminar($id) {
        EventoSessiones::eliminar($id);
    }
}
?>