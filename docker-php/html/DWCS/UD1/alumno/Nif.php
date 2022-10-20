<?php

    class Nif{
        private $numero;
        private $letra;
        
        function calcularLetra($num){
            $letras="TRWAGMYFPDXBNJZSQVHLCKE";
            return substr($letras,$num%23,1);
        }

        public function __construct($num=0){
            if($num==0){
                $this->numero=$num;
                $this->letra=" ";
            }
            else{
                $this->numero=$num;
                $this->letra= $this->calcularLetra($num); 
            }
        }
        public function getNumero(){
            return $this->numero;
        }
        public function setNumero($num){
            $this->numero=$num;
            $this->letra= $this->calcularLetra($num);
        }
        public function mostrar(){
            return $this->numero."-".$this->letra;
        }
        public function leer(){
            $num=readline("Introduce un numero de dni:");
            return $this->calcularLetra($num);
        }
        public function comprobarNif($nif){
            $correcto=false;
            if((strtoupper(substr($nif,(strlen($nif)-1),1)))==($this->calcularLetra(substr($nif,0,(strlen($nif)-1))))){
                $correcto=true;
            }
            return $correcto;
        }
    }
?>