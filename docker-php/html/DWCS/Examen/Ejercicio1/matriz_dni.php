<?php
require_once("funciones.php");
session_start();
$ejercicio=cargarEjercicio();
$filas=$ejercicio[0];
$columnas=$ejercicio[1];
$mensaje=$ejercicio[2];

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["entrada"])) {
    $entrada=$_POST["entrada"];
    if(comprobarEntrada($entrada)){
        $ejercicio=tratarEntrada($entrada);
        $filas=$ejercicio[0];
        $columnas=$ejercicio[1];
        if($filas==0){
            $filas=8;
            $columnas=8;
        }
        $array=generaArray($filas,$columnas);
        $mensaje=pintaArray($array);
        $mensaje=$mensaje."<br/><br/>".pintaArray(modificaArray($array));
    }else{
        $mensaje="La entrada es incorrecta.";
    }
    guardarEjercicio($filas,$columnas,$mensaje);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nif</title>
</head>
<body>
    <form method="POST" action="">
        <label for="entrada">Filas, columnas</label>
        <input name="entrada" type="text"/><br/><br/>
        <input type="submit" value="Consultar"/>
    </form>
    <br/>
    <br/>
    <?=$mensaje?>
</body>
</html>