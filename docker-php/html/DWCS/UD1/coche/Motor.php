<?php
class Motor{
    private $estado;
    public function __construct($estado="apagado"){
        $this->estado=$estado;
    }
    public function arrancar(){
        if($this->estado=="apagado"){
            $this->estado="encendido";
            return "Motor arrancado";
        }else if($this->estado=="encendido"){
            return "El motor ya estaba encendido";
        }
    }
    public function apagar(){
        if($this->estado=="encendido"){
            $this->estado="apagado";
            return "Motor apagado";
        }else if($this->estado=="apagado"){
            return "El motor ya estaba apagado";
        }
    }
    public function __toString(){
        return "Motor: ".$this->estado;
    }
}
?>