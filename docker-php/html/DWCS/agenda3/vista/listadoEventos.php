<?php 
require_once(dirname(__FILE__)."/../session/Sesiones.php");
require_once(dirname(__FILE__)."/../controller/Usuarios.php");
function ListadoEventos($eventos) {
    $usuario=Sesiones::getSesiones();
ob_start();
?>
<h2>Listado de eventos</h2>
<table class="table  table-bordered">
<thead class="thead-dark">
<tr >
    <th scope="col">Nombre</th>
    <th scope="col">Fecha incio</th>
    <th scope="col">Fecha fin</th>
    <?php
        if($usuario->getRol()==2){
    ?>
    <th scope="col">IdUsuario</th>
    <th scope="col">Nombre</th>
    <th scope="col">Correo</th>
    <?php
        }
    ?>
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
        <?php
            if($usuario->getRol()==2){
                $usuEvento=Usuarios::getById($evento->getIdUsuario());
        ?>
        <td><?=$usuEvento->getId()?></td>
        <td><?=$usuEvento->getNombre()?></td>
        <td><?=$usuEvento->getCorreo()?></td>
        <?php
            }
        ?>
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
<?php
$html = ob_get_contents();
ob_clean();
return $html;
}
