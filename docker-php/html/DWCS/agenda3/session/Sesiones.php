<?php
require_once(dirname(__FILE__)."/../modelo/Usuario.php");
class LoginException extends Exception {

}
class Sesiones extends Usuario {
    private static Sesiones $usuario;

    public static function isRegistered() {
        if (session_status() !== PHP_SESSION_ACTIVE ) session_start(); 
        return isset($_SESSION["usuario"]);
    }
    public static function getSesiones() {
        if (session_status() !== PHP_SESSION_ACTIVE ) session_start(); 
        if (!isset($_SESSION["usuario"])) {
            throw new LoginException("Sesión no creada");
        }
        $user = $_SESSION["usuario"];
        self::$usuario = new Sesiones($user["id_usuario"],$user["nombre"],$user["correo"],$user["rol"]);
        return self::$usuario;
    }
    public static function createSesiones($usuario=null) {
        if (isset($usuario)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                self::$usuario = new Sesiones($usuario->getId(),
                $usuario->getNombre(),$usuario->getCorreo(), $usuario->getRol());
                self::setSesiones();
        }
    }

    private static function setSesiones() {
            if (isset(self::$usuario)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                $_SESSION["usuario"]["id_usuario"] =self::$usuario->getId();
                $_SESSION["usuario"]["nombre"] = self::$usuario->getNombre();
                $_SESSION["usuario"]["correo"] = self::$usuario->getCorreo();
                $_SESSION["usuario"]["rol"] = self::$usuario->getRol();
            }
    }   

    public static function closeSession(){
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}