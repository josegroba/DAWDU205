<?php
class Ahorcado{
    private const palabras=["suerte","GANAR","perder","aprobar"];
    private $palabra;
    private $palabra_oculta;
    private $letras;
    private $vidas;
    private $mensaje;
    private $partidas_jugadas=0;
    private $partidas_ganadas=0;

    public function __construct($datos=null){
        if($datos!=null){
            $this->palabra=$datos["palabra"];
            $this->palabra_oculta=$datos["palabra_oculta"];
            $this->letras=$datos["letras"];
            $this->vidas=$datos["vidas"];
        }else{
            $this->iniciarJuego();
        }
        if (isset($datos["partidas_jugadas"]) && isset($datos["partidas_ganadas"])) {
            $this->partidas_jugadas =$datos["partidas_jugadas"];
            $this->partidas_ganadas =$datos["partidas_ganadas"];
        }
    }
    public function posicionesLetra(){
        if(str_contains($this->palabra,$this->letra)){
            $posiciones=[];
            for($i=0;$i<strlen($this->palabra);$i++){
                if($this->letra==substr($this->palabra,$i,1)){
                    array_push($posiciones,$i);
                }
            }
            return $posiciones;
        }else{
            return false;
        }

    }
    public function colocarLetras($posiciones){
        foreach($posiciones as $pos){
            $this->palabra_oculta=substr_replace($this->palabra_oculta,$this->letra,$pos,1);
        }
    }
    public function cargarEstadoJuego(&$palabra,&$palabra_oculta,&$letras,&$vidas,&$partidas_jugadas,&$partidas_ganadas){
        if(isset($_SESSION["palabra"]))$palabra=$_SESSION["palabra"];
        if(isset($_SESSION["palabra_oculta"]))$palabra_oculta=$_SESSION["palabra_oculta"];
        if(isset($_SESSION["letras"]))$letras=$_SESSION["letras"];
        if(isset($_SESSION["vidas"]))$vidas=$_SESSION["vidas"];
    }
    function iniciarJuego($ganar=null){
        $this->palabra=strtolower(self::palabras[rand(0,3)]);
        $this->palabra_oculta = "";
        for($i=0;$i<strlen($this->palabra);$i++){
            $this->palabra_oculta=$this->palabra_oculta."_";
        }
        $this->letras=[];
        $this->vidas=7;
        if (!is_null($ganar)) {
            if ($ganar == true) {
                $this->partidas_ganadas++;
            }
        }
    }
    public function jugarLetra($letra){
        $this->letra=strtolower($letra);
        if(in_array($this->letra, $this->letras)){
            $this->mensaje="La letra ".$this->letra." ya está puesta.";
        }else{
            array_push($this->letras,$this->$letra);
            if($this->posicionesLetra()!=null){
                $this->colocarLetras($this->posicionesLetra());
                if($this->palabra==$this->palabra_oculta){
                    $this->mensaje="Ha ganado!";
                    $this->partidas_jugadas++;
                    $this->partidas_ganadas++;
                    $ganar=true;
                }
            }
        }
    }
}
?>