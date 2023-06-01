<?php
require_once(dirname(__FILE__)."/../modelo/Usuario.php");
require_once(dirname(__FILE__)."/../BD/BDMySql.php");
class UsuarioMysql extends Usuario {
    
    function guardar(){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("REPLACE into usuario(id,nombre,correo,rol,password) 
                                VALUES (:id, :nombre, :correo, :rol, :password)
                            ");
        $stmt->execute([":id"=>$this->getId(),
                        ":nombre"=>$this->getNombre(),
                        ":correo" => $this->getCorreo(),
                        ":rol" => $this->getRol(),
                        ":password" => $this->getPassword()
                        ]);
    }

    static function listar(){
        $BD = BD::getConexion();
        try{
            $usuario=Sesiones::getSesiones();
            $stmt = $BD->prepare("SELECT * FROM usuario WHERE rol<=:rol");
            $stmt->execute([":rol"=>$usuario->getRol()]);
        }catch(LoginException){
            $stmt = $BD->prepare("SELECT * FROM usuario");
            $stmt->execute();
        }
        $usuarios=[];
        foreach($stmt->fetchAll() as $evento){
            $id =$evento["id"];
            $nombre=$evento["nombre"];
            $correo=$evento["correo"];
            $rol=$evento["rol"];
            $password=$evento["password"];
            $usuarios[$evento["id"]]=new UsuarioMysql($id,$nombre,$correo,$rol,$password);
        }
        return $usuarios;
    }
    static function eliminar($id){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("DELETE FROM usuario where id = :id");
        $stmt->execute([":id"=>$id]);
    }

    static function getById($id){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM usuario where id = :id");
        $stmt->execute([":id"=>$id]);
        $datos = $stmt->fetch();
        $id =$datos["id"];
        $nombre=$datos["nombre"];
        $correo=$datos["correo"];
        $rol=$datos["rol"];
        $password=$datos["password"];
        $usuario=new UsuarioMysql($id,$nombre,$correo,$rol,$password);
        return $usuario;
    }
}