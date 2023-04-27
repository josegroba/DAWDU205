<?php

class Usuario{

    public function __construct(
        private $idUsuario=null,
        private $nombre=null,
        private $correo=null,
        private $rol=0,
        private $password=null,
        $encriptar=false
    ){
        if ($encriptar) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    public function getId(){
        return $this->id_usuario;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRol(){
        return $this->rol;
    }

    public function setId($id){
        $this->id_usuario=$id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setCorreo($correo){
        $this->correo= $correo;
    }
    public function setPassword($pass,$encriptar=null){
        if ($encriptar) {
            $this->password = password_hash($pass, PASSWORD_DEFAULT);
        } else {
            $this->password = $pass;
        }
    }
    public function setRol($rol){
        $this->rol=$rol;
    }
}

?>