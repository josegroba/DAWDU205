<?php

require_once('vendor/autoload.php');
class BDMongo {
    private static $conexion; 
    private function __construct() {
    }
    
    public static function getConexion() {
        /**
         * INFORMACIÓN DE LA BASE DE DATOS
         * dbname=EjercicioEventos
         * host=127.0.0.1
         * usuario= root
         * clave=''
         */
        //TODO Implementar este metodo
        if (!isset(self::$conexion)) {
            $cliente = new MongoDB\Client("mongodb://root:example@mongo:27017");
            self::$conexion = $cliente->EjercicioEventos;
        }
        return self::$conexion;
    }
}