<?php
    require_once("Nif.php");
    $dni1=new Nif("35635213");
    $dni2=new Nif();
    $dni3=new Nif("356352");
    echo $dni1->mostrar()."\n";
    echo $dni2->mostrar()."\n";
    echo $dni3->mostrar()."\n";
    echo (new Nif())->leer();
?>