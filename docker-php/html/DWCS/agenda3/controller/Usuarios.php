<?php
require_once(dirname(__FILE__)."/../modelo/UsuarioSesiones.php");
require_once(dirname(__FILE__)."/../modelo/UsuarioMySql.php");
require_once(dirname(__FILE__)."/../modelo/UsuarioMongo.php");
require_once(dirname(__FILE__)."/../session/Sesiones.php");

class Usuarios{

    static private function getTipoEvento() {
       $tipo = null;
        switch( Tipo::getTipo()){
            case 'sesiones':
                $tipo = UsuarioSesiones::class;
                break;
            case 'mysql':
                $tipo = UsuarioMySql::class;
                break;
            case 'mongo':
                $tipo = UsuarioMongo::class;
                break;
        }
        return $tipo;
    }

    static function guardar($id_usuario,$nombre,$correo,$rol,$password){
        $evento=new (Usuarios::getTipoEvento())($id_usuario,$nombre,$correo ,$rol,$password);
        $evento->guardar();
    }
    static function Listar() {
        return Usuarios::getTipoEvento()::listar();
    }
    static function Eliminar($id) {
        Usuarios::getTipoEvento()::eliminar($id);
    }
    static function getById($id){
        return Usuarios::getTipoEvento()::getById($id);
    }
}