<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <style>
        .error{
            background-color: #FFA0A0;
        }
        .exito{
            background-color: #86FC7D;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre</label>
        <input name="nombre" type="text" value="<?php if(isset($_POST['nombre']))echo $_POST['nombre'];?>" required/><br/>
        <label for="apellido1">Apellido1</label>
        <input name="apellido1" type="text" value="<?php if(isset($_POST['apellido1']))echo $_POST['apellido1'];?>" required/><br/>
        <label for="apellido2">Apellido2</label>
        <input name="apellido2" type="text" value="<?php if(isset($_POST['apellido2']))echo $_POST['apellido2'];?>" required/><br/>
        <label for="nif">NIF</label>
        <input name="nif" type="text" value="<?php if(isset($_POST['nif']))echo $_POST['nif'];?>" required/><br/>
        <label for="sexo">Sexo</label>
        <select name="sexo">
            <option value="Hombre"<?php if(isset($_POST['sexo'])&&$_POST['sexo']=="Hombre")echo "selected";?>>Hombre</option>
            <option value="Mujer"<?php if(isset($_POST['sexo'])&&$_POST['sexo']=="Mujer")echo "selected";?>>Mujer</option>
            <option value="Otro"<?php if(isset($_POST['sexo'])&&$_POST['sexo']=="Otro")echo "selected";?>>Otro</option>
        </select>
        <input type="submit"/>
    </form>
    <?php
        require_once("Nif.php");
        require_once("Alumno.php");
        if(isset($_POST['nif'])){
            $nombre=$_POST['nombre'];
            $apellido1=$_POST['apellido1'];
            $apellido2=$_POST['apellido2'];
            $sexo=$_POST['sexo'];
            if(is_numeric($_POST['nif'])){
                $nif=new Nif($_POST['nif']);
                $alumno=new Alumno($nombre,$apellido1,$apellido2,$nif->mostrar(),$sexo);
                echo "<p class='exito'>Alumno ".$alumno." se ha dado de alta con exito";
            }else{
                $nif=strtoupper($_POST['nif']);
                try{
                    if(!(new Nif())->comprobarNif($nif)){
                        throw new Exception("El nif ".$nif." no es correcto.");
                    }
                    $alumno=new Alumno($nombre,$apellido1,$apellido2,$nif,$sexo);
                    echo "<p class='exito'>Alumno ".$alumno." se ha dado de alta con exito";
                }catch(Exception $e){
                    echo "<p class='error'>". $e->getMessage()."</p>";
                }
            }
        }
    ?>
</body>
</html>

