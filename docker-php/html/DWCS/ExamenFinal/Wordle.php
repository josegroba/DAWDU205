<?php

class wordlle{
    private $palabra;
    public function __construct($palabra){
        $this->palabra=str_split($palabra);
    }

    function comprobar($palabra){
        $arrayResultado=[];
        $letrasPalabra=str_split($palabra);
        for($i=0;$i<count($letrasPalabra);$i++){
            $letraCorrecta=false;
            $posCorrecta=false;
            for($z=0;$z<count($this->palabra);$z++){
                if($letrasPalabra[$i]==$this->palabra[$z]){
                    $letraCorrecta=true;
                    if($i==$z){
                        $posCorrecta=true;
                    }
                }
            }
            if($letraCorrecta){
                if($posCorrecta){
                    $arrayResultado[$i]=2;
                }else{
                    $arrayResultado[$i]=1;
                }
            }else{
                $arrayResultado[$i]=0;
            }
        }
        return $arrayResultado;
    }

}

?>