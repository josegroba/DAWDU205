<?php
require_once("Nif.php");
$nif=new Nif($_POST['dni']);
echo $nif->mostrar();
?>