<?php
$cont=0;
$acertado=false;
$mayor=false;
$menor=false;
if (isset($_COOKIE["contador"])) {
    $cont = $_COOKIE["contador"];
    if($cont>5){
        $cont=0;
        $num=500;
    }
}
if(isset($_COOKIE["numero"]))$numero=$_COOKIE["numero"];
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["num"])) {
    if($cont!=0){
        $num = $_POST["num"];
        if($num==$numero){
            $acertado=true;
            setcookie("contador",5,time()+3600);
        }
        if($num<$numero)$menor=true;
        if($num>$numero)$mayor=true;
    }else{
        $numero=rand(0,100);
        setcookie("numero",$numero,time()+3600);
    }
    $cont ++;
    setcookie("contador",$cont,time()+3600);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el número</title>
    <style>
    </style>
</head>
<body>
    <h1>Juego de adivinar el número</h1>
    <?php
        if($cont<=5&&!$acertado){echo '<form action="" method="post">
                                    <input type="number" name="num" id="num">
                                    <input type="submit" value="guardar">    
                                    </form>';
            if($menor&&$num!=500)echo "El numero ".$num." es menor que el número buscado.";
            if($mayor&&$num!=500)echo "El numero ".$num." es mayor que el número buscado.";
        }else{
            if($acertado){
                echo "Ha ganado la partida en ".($cont-1).($cont>1 ? "intentos":"intento");
            }else{
                echo "Ha perdido la partida.";
            }
        }
        echo "El numero a acertar es ".$numero."<br>";
        echo "Este es el ".$cont."º intento";
    ?>
</body>
</html>