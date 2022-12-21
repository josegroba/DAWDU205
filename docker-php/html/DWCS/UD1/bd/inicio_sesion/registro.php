<?php 
include("Conexion.php");
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit(0);
}
$hash = password_hash("12345",PASSWORD_DEFAULT);

if (!password_verify("12345",$hash)) {
    echo "acceso denegado";
}
$conexion=new Conexion();
$mensaje="";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["correo"])){
    $usuario=new Usuario("",$_POST["nombre"],$_POST["apellidos"],$_POST["correo"],$_POST["password"]);
    $mensaje=$conexion->añadeUsuario($usuario);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Formulario de registro de usuarios</h1>
    <form action="" method="post">
        <label for="nombre">Nombre:</label><br/>
        <input type="text" name="nombre" id="nombre" required><br/><br/>
        <label for="apellidos">Apellidos:</label><br/>
        <input type="text" name="apellidos" id="apellidos" required><br/><br/>
        <label for="correo">Correo:</label><br/>
        <input type="text" name="correo" id="correo" required><br/><br/>
        <label for="email">Contraseña:</label><br/>
        <input type="password" name="password" id="password" required/>
        <input type="submit" value="Añadir">
    </form>
    <a href="privado.php">Volver a la lista de usuarios</a>
    <?=$mensaje?>
</body>
</html>