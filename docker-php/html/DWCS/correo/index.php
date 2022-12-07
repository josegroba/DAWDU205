<?php
require_once("ServidorCorreo.php");
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["mensaje"])){
    $nombreEmisor=$_POST["nombre"];
    $emailEmisor=$_POST["email"];
    $asunto=$_POST["asunto"];
    $mensaje=$_POST["mensaje"];
    $correo=new Correo($asunto,$mensaje,$emailEmisor,$nombreEmisor);
    $servidor=new ServidorCorreo();
    $resultado=$servidor->enviar($correo);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de correos</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre:</label><br/>
        <input type="text" name="nombre" id="nombre" required><br/><br/>
        <label for="email">Email:</label><br/>
        <input type="email" name="email" id="email" required><br/><br/>
        <label for="asunto">Asunto:</label><br/>
        <input type="text" name="asunto" id="asunto" required><br/><br/>
        <label for="mensaje">Mensaje:</label><br/>
        <textarea name="mensaje" id="mensaje" required></textarea> <br/><br/>
        <input type="submit" value="Enviar">
    </form>
    <?=$resultado?>
</body>
</html>