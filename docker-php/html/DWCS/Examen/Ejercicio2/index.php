<?php
$pesos_entid_sucursal =array(4,8,5,10,9,7,3,6);
$pesos_num_cuenta =array(1,2,4,8,5,10,9,7,3,6);
function codigo_cuenta_correcto($cuenta){
    $toret=false;
    $a=substr($cuenta,0,8);
    $b=substr($cuenta,8,1);
    $c=substr($cuenta,9,1);
    $d=substr($cuenta,10,10);
    
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nif</title>
</head>
<body>
    <form method="POST" action="">
        <label for="entrada">Cuenta:</label>
        <input name="entrada" type="text"/>
        <input type="submit" value="Consultar"/>
    </form>
    <br/>
    <br/>
</body>
</html>