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
        }
        else{
            $puntos=[$v1,$v2,$v3,$v4];
            $menorX=$v1[0];
            $menorY=$v1[1];
            for($i=0;$i<4;$i++){
                if($menorX>=($puntos[$i])[0] && $menorY>=($puntos[$i])[1]){
                    $menorX=($puntos[$i])[0];
                    $menorY=($puntos[$i])[1];
                    $this->ii=$puntos[$i];
                }
                if(($puntos[$i])[0]==$menorX && ($puntos[$i])[0]>$menorY){
                    $this->si=$puntos[$i];
                }
                if(($puntos[$i])[0]>$menorX && ($puntos[$i])[0]==$menorY){
                    $this->id=$puntos[$i];
                }
                if(($puntos[$i])[0]>$menorX && ($puntos[$i])[0]>$menorY){
                    $this->sd=$puntos[$i];
                }
            }
        }
    }
    public function superficie(){
        return (($this->id[0]-$this->ii[0])*($this->si[0]-$this->ii[1]));
    }
    public function desplazar($ejeX,$ejeY){
        $this->ii[0]+=$ejeX;
        $this->id[0]+=$ejeX;
        $this->si[0]+=$ejeX;
        $this->sd[0]+=$ejeX;
        $this->ii[1]+=$ejeY;
        $this->id[1]+=$ejeY;
        $this->si[1]+=$ejeY;
        $this->sd[1]+=$ejeY;
    }
}

?>