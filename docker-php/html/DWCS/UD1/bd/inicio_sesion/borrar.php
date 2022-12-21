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
$conexion->borraUsuario($_GET["id"]);
header("location: privado.php");
exit(0);
?>