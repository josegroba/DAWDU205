<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>
<body>
    <form action="comprobacionNif.php" method="POST">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" required/><br/>
        <label for="apellido1">Apellido1</label>
        <input name="apellido1" type="text" required/><br/>
        <label for="apellido2">Apellido2</label>
        <input name="apellido2" type="text" required/><br/>
        <label for="nif">NIF</label>
        <input name="nif" type="text" required/><br/>
        <label for="sexo">Sexo</label>
        <select name="sexo">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otro">Otro</option>
        </select>
        <input type="submit"/>
    </form>
</body>
</html>

<?php
require_once("Nif.php");
$nif=new Nif($_POST['dni']);
echo $nif->mostrar();
?>