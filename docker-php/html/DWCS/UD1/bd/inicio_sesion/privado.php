<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit(0);
}
$hash = password_hash("12345",PASSWORD_DEFAULT);
if (!password_verify("12345",$hash)){
    echo "acceso denegado";
}
include("Conexion.php");
$conexion=new Conexion();
$mensaje="";
$usuarios=$conexion->listaUsuarios();
foreach($usuarios as $usuario){
    $mensaje=$mensaje."<tr><td>".$usuario["idusuario"]."</td>".
            "<td>".$usuario["nombre"]."</td>".
            "<td>".$usuario["apellidos"]."</td>".
            "<td>".$usuario["correo"]."</td>".
            "<td><button><a href=\"editar.php?email=".$usuario["correo"]."\">Modificar</a></button>
            <button><a href=\"borrar.php?id=".$usuario["idusuario"]."\">Eliminar</a></button></td></tr>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <table>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Correo</th>
            <th scope="col"></th>
        </tr>
        <?=$mensaje?>
        
    </table>
    <a href="registro.php" onclick="return confirm('Estas seguro?')">REGISTRAR USUARIO</a>
</body>
</html>