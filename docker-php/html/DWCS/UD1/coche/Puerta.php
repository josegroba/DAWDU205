<?php
require_once("Ventana.php");
class Puerta{
    private $estado;
    private Ventana $ventana;

    public function __construct($estado="cerrada"){
        $this->ventana=new Ventana();
        $this->estado=$estado;
    }
    public function abrir(){
        if($this->estado=="cerrada"){
            $this->estado=="abierta";
            return "Puerta abierta";
        }else if($this->estado=="abierta"){
            return "La puerta ya estaba abierta";
        }
    }
    public function cerrar(){
        if($this->estado=="abierta"){
            $this->estado=="cerrada";
            return "Puerta cerrada";
        }else if($this->estado=="cerrada"){
            return "La puerta ya estaba cerrada";
        }
    }
    public function __toString(){
        return "Puerta ".$this->estado." con la ventana ".$this->ventana;
    }
}
?>