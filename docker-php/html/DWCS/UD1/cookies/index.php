<?php
$color = "#ccc";
$cont =0;
if (isset($_COOKIE["contador"])) {
    $cont = $_COOKIE["contador"];
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["color"])) {
    $color = $_POST["color"];
    setcookie("color",$color,time()+3600);
    if(!isset($_COOKIE["contador"])|| $_COOKIE["color"]!=$color){
        $cont ++;
        setcookie("contador",$cont,time()+3600);
    }
}  else {
    if (isset($_COOKIE["color"])) {
        $color = $_COOKIE["color"];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color de fondo</title>
    <style>
        body {
            background-color: <?=$color?>;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="color" name="color" id="color" value="<?=$color?>">
        <input type="submit" value="guardar">    
    </form>
    <?php echo "Ha hecho ".$cont." cambios";?>
</body>
</html>

