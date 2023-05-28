<?php
require_once(dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../session/Sesiones.php");
class EventoSesiones extends Evento {
    
    function guardar(){
        if  (isset($_SESSION["eventos"]) && is_null($this->id_evento)) {
            if(count($_SESSION['eventos'])==0){
                $max=0;
            }else{
                $max =  max(array_keys($_SESSION["eventos"]));
            }
           $this->setIdEvento($max+1);
        }else{
            if (is_null($this->id_evento)) {
                $this->id_evento=1;
            }
        }
        var_dump($this);
        $_SESSION["eventos"][$this->id_evento]=serialize($this);
    }

    static function listar(){
        $usuario=Sesiones::getSesiones();
        $eventos = [];
        if(isset($_SESSION["eventos"])){
            foreach ($_SESSION["eventos"] as $evento) {
                $e = unserialize($evento);
                if($usuario->getRol()==1){
                    $eventos[$e->id_evento] = $e;
                }
            }     
        }
        return $eventos;
    }
    static function eliminar($id){
        unset($_SESSION["eventos"][$id]);
    }

    static function getById($id){
        if(isset($_SESSION["eventos"][$id])){
            return unserialize($_SESSION["eventos"][$id]);
        }
    }

    function __serialize(): array
    {
        return [
        "id_evento"=>$this->id_evento,
        "id_usuario"=>$this->id_usuario,
        "nombre"=>$this->nombre,
        "fecha_inicio"=>$this->fecha_inicio,
        "fecha_fin"=>$this->fecha_fin  ];
    }

    function __unserialize(array $data): void
    {
        $this->id_evento = $data["id_evento"];
        $this->id_usuario = $data["id_usuario"];
        $this->nombre = $data["nombre"];
        $this->fecha_inicio = $data["fecha_inicio"];
        $this->fecha_fin  = $data["fecha_fin"];
    }
}