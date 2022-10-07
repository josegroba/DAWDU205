<?php

class Rectangulo{
    private $ii;
    private $id;
    private $si;
    private $sd;
    public function __construct($v1,$v2,$v3=[0,0],$v4=[0,0]){
        if($v3==[0,0] && $v4==[0,0]){
            $this->ii=[0,0];
            $this->id=[$v1,0];
            $this->si=[0,$v2];
            $this->sd=[$v1,$v2];
        }else{
            
            $this->ii=$v1;
            $this->id=$v2;
            $this->si=$v3;
            $this->sd=$v4;
        }
    }
    public function superficie(){

    }
}

?>