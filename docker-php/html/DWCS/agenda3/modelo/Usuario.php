<?php

class Usuario{

    public function __construct(
        protected $id_usuario=null,
        protected $nombre=null,
        protected $correo=null,
        protected $rol=0,
        protected $password=null
    ){
       /* if (!is_null($this->password)) {
              $this->password = password_hash($this->password, PASSWORD_DEFAULT);
         }*/
       // echo $this->password;
    }

    public function comprobarValidarUsuario($correo, $contraseña) {
        return  $correo == $this->correo && password_verify($contraseña,$this->password);
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
    public function setPassword($pass,$encriptar=true){
        if ($encriptar) {
            $this->password =  self::hashPassword($pass);  // password_hash($pass, PASSWORD_DEFAULT);
        } else {
            $this->password = $pass;
        }
    }

    public static function hashPassword($pass) {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
    public function setRol($rol){
        $this->rol=$rol;
    }
}

?>