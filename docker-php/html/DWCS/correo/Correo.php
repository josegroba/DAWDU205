<?php

class Correo{
    private $asunto;
    private $mensaje;
    private $emailEmisor;
    private $nombreEmisor;

    public function __construct($asunto,$mensaje,$emailEmisor,$nombreEmisor){
        $this->asunto=$asunto;
        $this->mensaje=$mensaje;
        $this->emailEmisor=$emailEmisor;
        $this->nombreEmisor=$nombreEmisor;
    }
    public function getAsunto(){
        return $this->asunto;
    }
    public function getMensaje(){
        return $this->mensaje;
    }
    public function getEmailEmisor(){
        return $this->emailEmisor;
    }
    public function getNombreEmisor(){
        return $this->nombreEmisor;
    }
}

?>