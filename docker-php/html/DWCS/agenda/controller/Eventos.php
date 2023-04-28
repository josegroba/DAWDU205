<?php
require_once (dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../modelo/EventoSesiones.php");
class Eventos {
    static $eventos = null;

    private static function getEventos() {
        $eventosSesiones=new EventosSessiones();
        self::$eventos=$eventosSesiones->listar();
        return self::$eventos;
    }
    static function Listar() {
        return self::getEventos();
    }

    static function Eliminar($id) {
        $eventosSesiones=new EventosSessiones();
        $eventosSesiones->eliminar($id);
        self::$eventos=$eventosSesiones->listar();
        unset(self::$eventos[$id]);
    }
}
?>