<?php
include('./Diccionario.php');
include('./Wordle.php');

$palabra="ganar";
$wordle=new wordlle($palabra);
$vidas=6;
$mensaje="";
$palabras_jugadas="";
$partidas_jugadas=0;
$partidas_ganadas=0;

session_start();

function iniciarjuego(&$palabra,&$palabras_jugadas,&$wordle,&$vidas,$ganar=null,&$partidas_jugadas=null,&$partidas_ganadas=null) {
    $diccionario=new diccionario();
    $diccionario->crearBaseWordle();
    $palabra=$diccionario->seleccionarPalabra();
    $wordle=new wordlle($palabra);
    $palabras_jugadas ="";
    $vidas = 6;
    if (!is_null($ganar)) {
        if ($ganar == true) {
            $partidas_ganadas++;
        }
        setcookie("partidas_ganadas",$partidas_ganadas,time()+36000000);
        setcookie("partidas_jugadas",++$partidas_jugadas,time()+36000000);
    }

 }

function pintarPalabra($palabra,$resultado){
    $letrasPalabra=str_split($palabra);
    $palabra_pintada="";
    for($i=0;$i<count($letrasPalabra);$i++){
        if($resultado[$i]==2){
            $palabra_pintada=$palabra_pintada.'<span style="color:lime">'.$letrasPalabra[$i]."</span> ";
        }
        if($resultado[$i]==1){
            $palabra_pintada=$palabra_pintada.'<span style="color:orange">'.$letrasPalabra[$i]."</span> ";
        }
        if($resultado[$i]==0){
            $palabra_pintada=$palabra_pintada.'<span style="color:grey">'.$letrasPalabra[$i]."</span> ";
        }
    }
    return $palabra_pintada;
}
function cargarestadojuego(&$palabra,&$palabras_jugadas,&$wordle,&$vidas,&$partidas_jugadas,&$partidas_ganadas) {
    if (isset($_SESSION["palabra"])) {
         $palabra = $_SESSION["palabra"];
         $wordle = $_SESSION["wordle"];
         $palabras_jugadas = $_SESSION["palabras_jugadas"];
         $vidas = $_SESSION["vidas"];
    } else {
        iniciarjuego($palabra,$palabras_jugadas,$wordle,$vidas);
    }
    if (isset($_COOKIE["partidas_jugadas"]) && isset($_COOKIE["partidas_ganadas"])) {
        $partidas_jugadas =$_COOKIE["partidas_jugadas"];
        $partidas_ganadas =$_COOKIE["partidas_ganadas"];
    }
 }

function guardarestadojuego($palabra,$palabras_jugadas,$wordle,$vidas) {
    $_SESSION["palabra"] = $palabra;
    $_SESSION["wordle"] = $wordle;
    $_SESSION["palabras_jugadas"] = $palabras_jugadas;
    $_SESSION["vidas"] = $vidas;
}











cargarestadojuego($palabra,$palabras_jugadas,$wordle,$vidas,$partidas_jugadas,$partidas_ganadas);

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["palabra"]) && $_POST["palabra"] !="") {
    $palabra_actual=$_POST["palabra"];
    $resultado_palabra=$wordle->comprobar($_POST["palabra"]);
    $win=true;
    $palabras_jugadas=$palabras_jugadas."</br>".pintarPalabra($palabra_actual,$resultado_palabra);
    for($i=0;$i<count($resultado_palabra);$i++){
        if($resultado_palabra[$i]!=2){
            $win=false;
        }
    }
    if($win){
        $mensaje="HAS GANADO";
        iniciarJuego($palabra,$palabras_jugadas,$wordle,$vidas,true,$partidas_jugadas,$partidas_ganadas);
    }else{
        $vidas--;
    }
    if($vidas<1){
        $mensaje="HA PERDIDO";
        iniciarJuego($palabra,$palabras_jugadas,$wordle,$vidas,false,$partidas_jugadas,$partidas_ganadas);
    }
}
guardarestadojuego($palabra,$palabras_jugadas,$wordle,$vidas);





?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordle</title>
</head>
<body>
    <h1>WORDLE</h1>
    <div>Palabra: <?=$palabra //muestra la palabra a adivinar para ayudarte a dupurar el programa?></div>    
    <div>Partidas jugadas: <?=$partidas_jugadas?></div>
    <div>Partidas ganadas: <?=$partidas_ganadas?></div>
    <div>Vidas: <?=$vidas?></div>
    <form action="" method="post">
        <input type="text" name="palabra" id="palabra" minlength="5" maxlength="5">
        <input type="submit" value="Comprobar">
    </form>
    <div>Palabras jugadas: <?=$palabras_jugadas //Muestra aquí las letras juegadas por el jugador en la partida actual ?></div>
    
    <h2><?=(isset($mensaje))?$mensaje:"" //Muestra aquí los mensajes si son necesaios ?> </h2>
</body>
</html>