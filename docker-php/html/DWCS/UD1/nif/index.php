<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nif</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="dni">Introduce un numero de DNI para calcular el<br/> NIF o un NIF para comprobar si es correcto</label>
        <input name="dni" type="text"/>
        <input type="submit"/>
    </form>
    <?php
        require_once("Nif.php");
        if(isset($_POST['dni'])){
            if(is_numeric($_POST['dni'])){
                $dni=$_POST['dni'];
                $nif=new Nif($dni);
                echo "El nif del dni ".$dni." es: ".$nif->mostrar();
            }else{
                $nif=strtoupper($_POST['dni']);
                $x=new Nif();
                if($x->comprobarNif($nif)){
                    echo "El nif ".$nif." es correcto.";
                }else{
                    echo "El nif ".$nif." no es correcto";
                }
            }
        }
    ?>
</body>
</html>


