<?php
include("Usuario.php");
class Conexion{
    private $cadena_conexion;
    private $usuario;
    private $password;

    public function __construct($cadena="mysql:dbname=docker_demo;host=docker-mysql",$usuario = "root",$password = "root123"){
        $this->cadena_conexion=$cadena;
        $this->usuario=$usuario;
        $this->password=$password;
    }
    public function encuentraUsuario(Usuario $usuario){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            $sql = "select password from usuario where correo='".$usuario->getCorreo()."'";
            $usu = $bd->query($sql);
            $toret=false;
            foreach($usu as $u){
                if(password_verify($usuario->getPassword(),$u["password"])){
                    $toret=true;
                }
            }
            return $toret;
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }
    public function añadeUsuario(Usuario $usuario){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            $sql = "insert into usuario(nombre,apellidos,correo,password)values(
                    '".$usuario->getNombre()."',
                    '".$usuario->getApellidos()."',
                    '".$usuario->getCorreo()."',
                    '".password_hash($usuario->getPassword(),PASSWORD_DEFAULT) ."');";
            $bd->query($sql);
            //$this->ejecutaSentencia($sql);
            return "Usuario ".$usuario->getNombre()." añadido correctamente";
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }
    public function listaUsuarios(){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            $sql = "select * from usuario;";
            return $bd->query($sql);
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }
    public function borraUsuario($id){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            $sql = "DELETE FROM `docker_demo`.`usuario` WHERE (`idusuario` = $id);";
            $bd->query($sql);
            return "Usuario eliminado correctamente";
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }
    public function modificaUsuario(Usuario $usuario){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            $sql = "UPDATE `docker_demo`.`usuario` SET `nombre` = 'Pepe2', `apellidos` = 'Domin3guez' WHERE (`idusuario` = ".$usuario->getId().");";
            return $bd->query($sql);
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }
    /*
    private function ejecutaSentencia($sql){
        try {
            $bd = new PDO($this->cadena_conexion, $this->usuario, $this->password);
            return $bd->query($sql);
        } catch (Exception $e) {
            return "ERROR1:".$e->getMessage();
        }
    }*/
}

?>