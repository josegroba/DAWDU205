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
        <label for="dni">Introduce un numero de DNI para calcular el NIF o un NIF para comprobar si es correcto</label>
        <input name="dni" type="text"/>
        <input type="submit"/>
    </form>
    <?php
        require_once("Nif.php");
        if(isset($_POST['nif'])){if(is_numeric($_POST['nif'])){
            $nif=new Nif($_POST['nif']);
        }else{
            $nif=strtoupper($_POST['nif']);
            
        }
        }
    ?>
</body>
</html>


