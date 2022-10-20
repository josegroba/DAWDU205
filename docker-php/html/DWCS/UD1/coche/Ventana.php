<?php
class Ventana{
    private $estado;
    public function __construct($estado="cerrada"){
        $this->estado=$estado;
    }
    public function abrir(){
        if($this->estado=="cerrada"){
            $this->estado=="abierta";
            return "Ventana abierta";
        }else if($this->estado=="abierta"){
            return "La ventana ya estaba abierta";
        }
    }
    public function cerrar(){
        if($this->estado=="abierta"){
            $this->estado=="cerrada";
            return "Ventana cerrada";
        }else if($this->estado=="cerrada"){
            return "La ventana ya estaba cerrada";
        }
    }
    public function __toString(){
        return $this->estado;
    }
}
?>