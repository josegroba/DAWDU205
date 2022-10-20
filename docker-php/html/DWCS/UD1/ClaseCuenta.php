<?php

    class Cuenta{
        private $titular;
        private $cantidad;

        function __construct($titular,$cantidad=0.0){
            $this->titular=$titular;
            $this->cantidad=$cantidad;
        }

        public function getTitular(){
            return $this->titular;
        }
        public function setTitular($titular){
            $this->titular=$titular;
        }
        public function getCantidad(){
            return $this->cantidad;
        }
        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }
        
        public function __toString(){
            return "Cuenta: Titualar: ".$this->titular.", Cantidad: ".$this->cantidad;
        }

        public function ingresar($cantidad){
            if($cantidad<0){
                $this->cantidad +=$cantidad;
            }
        }
        public function retirar($cantidad){
            $this->cantidad -=$cantidad;
            if($this->cantidad<0){
                $this->cantidad=0;
            }
        }
    }

?>