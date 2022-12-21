<?php 
include("Conexion.php");
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$conexion=new Conexion();
$mensaje="";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["correo"])){
    $usuario=new Usuario("","","",$_POST["correo"],$_POST["password"]);
    if($conexion->encuentraUsuario($usuario)){
        $mensaje="correcto";
        $_SESSION["usuario"]=$usuario;
        header('Location: index.php');
        exit(0);
    }else{
        $mensaje="Correo o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Correo:</label><br/>
        <input type="text" name="correo" id="correo" required><br/><br/>
        <label for="email">Contraseña:</label><br/>
        <input type="password" name="password" id="password" required/>
        <input type="submit" value="Acceder">
    </form>
    <?=$mensaje?>
</body>
</html>