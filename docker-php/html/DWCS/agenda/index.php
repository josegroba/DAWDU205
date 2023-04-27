<?php
require_once(dirname(__FILE__)."/controller/Eventos.php");
$a=new Eventos();
$eventos=$a->Listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body><!--
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Eventos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?accion=listar&tipo=evento">Listado de Eventos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?accion=nuevo&tipo=evento">Nuevo Evento</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="?accion=listar&tipo=usuario">Listado de Usuarios</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="?accion=nuevo&tipo=usuario">Nuevo Usuario</a>
            </div>
        </li>
            <li><a class="nav-link" href="?accion=cerrar">Cerrar Sesión</a></li>
        </ul>
    </div>
    </nav>-->
    <!--------------------------------------------------------------------------->
   
    
<h2>Listado de eventos</h2>
<table class="table  table-bordered">
<thead class="thead-dark">
<tr >
    <th scope="col">Nombre</th>
    <th scope="col">Fecha incio</th>
    <th scope="col">Fecha fin</th>
    <th scope="col">Acciones</th>
</tr>
</thead>
<tbody>
<?php 
$formato = 'Y-m-d H:i:s';
foreach ($eventos as $evento) { ?>
    <tr>
        <td><?=$evento->getNombre()?></td>
        <td><?=$evento->getFechaInicio()->format($formato)?></td>
        <td><?=$evento->getFechaFin()->format($formato)?></td>
        <td>
        <a href="?accion=modificar&id_evento=<?=$evento->getIdEvento()?>" class="btn btn-primary btn-sm " role="button" aria-pressed="true">Modificar</a>
        <a href="?accion=eliminar&id_evento=<?=$evento->getIdEvento()?>" class="btn btn-danger btn-sm " role="button" aria-pressed="true"
        onclick="if (confirm('Estas seguro?')){ return true; } else {return false;}">Eliminar</a> 
    
         </td>
    </tr>
<?php }
?>
<tbody>
</table>


</body>
</html>