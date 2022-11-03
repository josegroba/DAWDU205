<?php
session_start();
$cont=0;
$historico=[];
if(isset($_SESSION["contador"])){
    $cont=$_SESSION["contador"];
    if($cont>5){
        $cont=0;
    }
}
if($cont==0){
    $numero=rand(0,100);
    $_SESSION["numero"]=$numero;
}
if(isset($_SESSION["numero"])){
    $numero=$_SESSION["numero"];
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["num"])){
    if(isset($_SESSION["num"])&&$_SESSION["num"]==$_POST["num"]){
        $num="";
    }else{
        $num=$_POST["num"];
        $_SESSION["num"]=$num;
    }
}
if(isset($_SESSION["historico"])){
    $historico=$_SESSION["historico"];
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
    <form action="" method="post">
        <input type="number" name="num" id="num">
        <input type="submit" value="guardar">    
    </form>
</body>
</html>
<?php
if($cont<5){
    echo "<p>El numero buscado es ".$numero."</p>";
    if(is_numeric($num)){
        $cont++;
        if($num==$numero){
            echo "<h2>El número buscado era el ".$numero." y lo has acertado el numero en ".$cont." intentos</h2>";
            $cont=0;
        }
        if(($num<$numero)){
            echo "<p>El número ".$num." es menor que el número buscado.</p>";
            array_push($historico,$num);
        }
        if(($num>$numero)){
            echo "<p>El número ".$num." es mayor que el número buscado.</p>";
            array_push($historico,$num);
        }
    }
    echo "<p>Usted lleva ".$cont." intentos</p>";
    echo "<p>Intentos realizados: ";
    foreach($historico as $valor){
        echo $valor."-";
    }
    echo "</p>";
}
if($cont>=5){
    echo "<p>Se le han acabado los intentos!</p>";
    $cont=0;
    $historico=[];
}
$_SESSION["contador"]=$cont;
$_SESSION["historico"]=$historico
?>