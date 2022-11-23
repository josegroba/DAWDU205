<?php

class Color{
    private $id;

    public function __construct($id="null"){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function comparar(Color $color){
        $toret=false;
        if($this->id==$color->id){
            $toret=true;
        }
        return $toret;
    }
}

?>