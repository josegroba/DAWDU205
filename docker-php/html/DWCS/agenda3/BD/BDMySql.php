<?php

class BD {
    private static $conexion;

    public static function getConexion() {
        if (!isset(self::$conexion)) {
            /* ---------clase------------------*/
            //$dsn = "mysql:dbname=EjercicioEventos;host=docker-mysql";
            //$password = "root123";
            /* ---------casa-------------*/
            $dsn = "mysql:dbname=EjercicioEventos;host=127.0.0.1";
            $password = "";
            $usuario ="root";
            self::$conexion = new PDO($dsn, $usuario, $password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }
}