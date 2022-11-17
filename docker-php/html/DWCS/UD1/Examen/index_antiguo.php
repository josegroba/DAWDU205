<?php


//Variables
//Crea la constante PALABRA con el array "suerte","GANAR","perder","aprobar"  (1 punto)
/*
$palabra = "APROBAR";
$palabra_oculta = "______"; //Tantos guiones como letras tiene $palabra
$letras = [];  // Letras jugadas por el jugador en la partida actual
$vidas = 7; //Vidas de las que dispone el jugador para adivinar la $palabra
$mensaje = null;  //Mensajes a mostrar el jugador: letra repetida, ha gando, ha perdido, ...
$partidas_jugadas = 0;  //Partidas totales jugadas por el jugador
$partidas_ganadas = 0; //Partidas ganadas por el jugador
*/
//Código que necesites incluir y no este definido --> (0,25 puntos)

//-------
//Funciones necesarias para desarrollar el juego
/**
 * posiscionesLetra
 * Función que devuelve las posiciones de la "letra" enviada en la palabra a adivinar
 * (2 puntos)
 * @param  mixed $palabra palabra que se ha de acertar
 * @param  mixed $letra letra enviada por el jugador
 * @return mixed Devuelve "false" si no se encuentra la letra en la palabra,
 *               en otro caso devuelve un "array" con las posiciones de esta
 */

 



//
/**
 * colocarletras
 *  Función que coloca la letra en sus posiciones en la palabra oculta
 *      ej:)    palabra a adivinar "SOL" letra= "O" palabra_oculta="___" return "_O_"
 * (1 punto)
 * @param  mixed $palabra_oculta  palabra que contiene guiones y que serán sustituidos en esta función
 * @param  mixed $posiciones posiciones donde se encuentra la letra en la palabra a adivinar
 * @param  mixed $letra letra a colocar en la palabra
 * @return string palabra oculta con la letra en sus posiciones  
 */







/**
 * cargarestadojuego
 *  Carga los datos del juego necesarios de la anterior jugada
 * (1 punto)
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $partidas_jugadas número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas número de partidas ganadas por el jugador
 * @return void
 */








/**
 * inciarjuego
 * (1 punto)
 * obtiene la $palabra al azar del array PALABRAS
 * crea la palabra_oculta a partir de la palabra generada al azar
 * inicializa el array de $letras jugadas en la partida
 * inicializa el numero de $vidas a 7
 * 
 * En caso de ganar o perder una partida actualiza el número de partidas jugadas y ganadas
 * los parametros $ganar, $partidas_jugadas y $partidas_ganadas son opcionales, en caso de no ser
 * necesarios su valor por defecto será null
 *
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $ganar [default null] Permite indicar si se ha ganado o perdio una partida (true, false)
 * @param  mixed $partidas_jugadas [default null] número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas [default null] número de partidas ganadas por el jugador
 * @return void
 */

 






/**
 * guardarestadojuego
 * 
 * Guarda el estado de la partida para que se pueda continuar el juego en la próxima llamada a la página
 * (0,5 puntos)
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta  palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @return void
 */





//Control del juego (2,25 puntos)
/*
Utiliza aquí las funciones creadas anteriormente y haz que el juego funcione
*/








//Mostrar datos (1 punto)

session_start();
$palabras=["suerte","ganar","perder","aprobar"];
$palabra_oculta="";
$vidas=7;
$letras = [];
$mensaje = null;
$partidas_jugadas = 0;
$partidas_ganadas = 0;
$fin=true;
if(isset($_SESSION["vidas"])&&$_SESSION["vidas"]!=0){
    $vidas=$_SESSION["vidas"];
}
if(isset($_SESSION["fin"])){
    $fin=$_SESSION["fin"];
}
if($vidas==7&&$fin){
    unset($_SESSION['palabra']);
    unset($_SESSION["mensaje"]);
    unset($_SESSION["letras"]);
}
if(isset($_SESSION["palabra"])){
    $palabra=$_SESSION["palabra"];
}else{
    $palabra=$palabras[rand(0,3)];
    $_SESSION["palabra"]=$palabra;
    for($i=0;$i<strlen($palabra);$i++){
        $palabra_oculta=$palabra_oculta."_";
    }
    $_SESSION["palabra_oculta"]=$palabra_oculta;
}
if(isset($_SESSION["palabra_oculta"])){
    $palabra_oculta=$_SESSION["palabra_oculta"];
}
if(isset($_SESSION["letras"])){
    $letras=$_SESSION["letras"];
}
if(isset($_SESSION["pjugadas"])){
    $partidas_jugadas=$_SESSION["pjugadas"];
}
if(isset($_SESSION["pganadas"])){
    $partidas_ganadas=$_SESSION["pganadas"];
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["letra"])) {
    $letra=$_POST["letra"];
    if(trim($letra)!=""){
        if(in_array($letra, $letras)||(isset($_SESSION["letra_nueva"])&&$_SESSION["letra_nueva"]==$letra)){
            if(in_array($letra, $letras)){
                $mensaje="La letra ".$letra." ya está puesta.";
            }
        }else{
            if(str_contains($palabra,$letra)){
                for($i=0;$i<strlen($palabra);$i++){
                    if($letra==substr($palabra,$i,1)){
                        $palabra_oculta=substr_replace($palabra_oculta,$letra,$i,1);
                    }
                }
                array_push($letras,$letra);
                if($palabra_oculta==$palabra){
                    $mensaje="Felicidades. Ha ganado la partida!!";
                    $vidas=0;
                    ++$partidas_ganadas;
                    ++$partidas_jugadas;
                    $fin=true;
                }else{
                    $fin=false;
                }
            }else{
                --$vidas;
                if($vidas==0){
                    $mensaje="Se le han acabado las vidas!! Ha perdido.";
                    ++$partidas_jugadas;
                    $fin=true;
                }else{
                    $mensaje="La letra ".$letra." no está en la palabra.";
                    array_push($letras,$letra);
                    $fin=false;
                }
            }
        }
        $_SESSION["palabra_oculta"]=$palabra_oculta;
        $_SESSION["pganadas"]=$partidas_ganadas;
        $_SESSION["pjugadas"]=$partidas_jugadas;
        $_SESSION["vidas"]=$vidas;
        $_SESSION["mensaje"]=$mensaje;
        $_SESSION["letras"]=$letras;
        $_SESSION["letra_nueva"]=$letra;
        $_SESSION["fin"]=$fin;
    }
}


$mostrar_letras="";
foreach($letras as $letra){
    $mostrar_letras=$mostrar_letras.$letra." - ";
}
$mostrar_letras = substr($mostrar_letras, 0, -2);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego ahorcado</title>
</head>
<body>
    <div>Mesajes: <?=$mensaje ?> </div>
    <div>Letras jugadas: <?=$mostrar_letras ?></div>
    <div>Palabra: <?=$palabra_oculta?>  Longitud: <?=strlen($palabra)?></div>
    <div>Vidas: <?=$vidas?></div>
    <form action="" method="post">
        <input type="text" name="letra" id="letra">
        <input type="submit" value="Comprobar">
    </form>
    <div>Partidas ganadas: <?=$partidas_ganadas?>  / Partidas jugadas: <?=$partidas_jugadas?></div>
    <div>Palabra: <?=$palabra?></div>
</body>
</html>
