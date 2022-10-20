<?php
class Rueda{
    
    private $estado;
    public function __construct($estado="desinflada"){
        $this->estado=$estado;
    }
    public function inflar(){
        if($this->estado=="desinflada"){
            $this->estado=="inflada";
            return "Rueda inflada";
        }else if($this->estado=="inflada"){
            return "La rueda ya estaba inflada";
        }
    }
    public function desinflar(){
        if($this->estado=="inflada"){
            $this->estado=="desinflada";
            return "Rueda desinflada";
        }else if($this->estado=="desinflada"){
            return "La rueda ya estaba desinflada";
        }
    }
    public function __toString(){
        return "Rueda: ".$this->estado;
    }
}
?>