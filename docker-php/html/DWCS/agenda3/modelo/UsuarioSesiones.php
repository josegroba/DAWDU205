<?php
require_once(dirname(__FILE__)."/../modelo/Usuario.php");
class UsuarioSesiones extends Usuario {
    
    function guardar(){
        if  (isset($_SESSION["usuarios"]) && is_null($this->id_usuario)) {
            if(count($_SESSION['usuarios'])==0){
                $max=0;
            }else{
                $max =  max(array_keys($_SESSION["usuarios"]));
            }
           $this->setIdUsuario($max+1);
        }else{
            if (is_null($this->id_usuario)) {
                $this->id_usuario=1;
            }
        }
        $_SESSION["usuarios"][$this->id_usuario]=serialize($this);
    }

    static function listar(){
        $usuarios = [];
        if(isset($_SESSION["usuarios"])){
            foreach ($_SESSION["usuarios"] as $usuario) {
                $u = unserialize($usuario);
                $usuarios[$u->id_usuario] = $u;
            }     
        }
        return $usuarios;
    }
    static function eliminar($id){
        unset($_SESSION["usuarios"][$id]);
    }

    static function getById($id){
        if(isset($_SESSION["Usuarios"][$id])){
            return unserialize($_SESSION["Usuarios"][$id]);
        }
    }

    function __serialize(): array
    {
        return [
        "id_usuario"=>$this->id_usuario,
        "nombre"=>$this->nombre,
        "correo"=>$this->correo,
        "rol"=>$this->rol,
        "password"=>$this->password  ];
    }

    function __unserialize(array $data): void
    {
        $this->id_usuario = $data["id_usuario"];
        $this->nombre = $data["nombre"];
        $this->correo = $data["correo"];
        $this->rol  = $data["rol"];
        $this->password = $data["password"];
    }
}