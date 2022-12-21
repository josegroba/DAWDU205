<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if(isset($_SESSION["usuario"])){
    header("Location: privado.php");
    exit(0);
}else{
    header("Location: login.php");
    exit(0);
}
?>