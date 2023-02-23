<?php

class Usuario{
    private static $num_usuarios=0;
    private $id_usuario;
    private $nombre;
    private $correo;
    private $password;
    private $rol;

    public function __construct($nombre="",$correo="",$pass="",$rol="",$encriptar=false){
        $this->num_usuarios=$this->num_usuarios + 1;
        $this->id_usuario=$this->num_usuarios;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->rol=$rol;
        if ($encriptar) {
            $this->password = password_hash($pass, PASSWORD_DEFAULT);
        } else {
            $this->password = $pass;
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