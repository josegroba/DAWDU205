<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $correo;
    private $password;

    public function __construct($id,$nombre,$apellidos,$correo,$password){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->correo=$correo;
        $this->password=$password;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getPassword(){
        return $this->password;
    }
}

?>