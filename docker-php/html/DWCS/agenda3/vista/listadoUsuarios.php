<?php 
require_once(dirname(__FILE__)."/../session/Sesiones.php");
function ListadoUsuarios($usuarios) {
$usuActual=Sesiones::getSesiones();
ob_start();
?>
<h2>Listado de Usuarios</h2>
<table class="table  table-bordered">
<thead class="thead-dark">
<tr >
    <th scope="col">Nombre</th>
    <th scope="col">Correo</th>
    <th scope="col">Rol</th>
    <th scope="col">Acciones</th>
</tr>
</thead>
<tbody>
<?php
foreach ($usuarios as $usuario) { ?>
    <tr <?php if($usuActual->getId()==$usuario->getId()){ ?> style="background-color: lightcyan;" > <?php } ?>>
        <td><?=$usuario->getNombre()?></td>
        <td><?=$usuario->getCorreo()?></td>
        <td><?=$usuario->getRol()?></td>
        <td>
            <a href="?accion=modificarUsuario&id_usuario=<?=$usuario->getId()?>" class="btn btn-primary btn-sm " role="button" aria-pressed="true">Modificar</a>
            <?php if($usuActual->getId()!=$usuario->getId()){ ?>
                <a href="?accion=eliminarUsuario&id_usuario=<?=$usuario->getId()?>" class="btn btn-danger btn-sm " role="button" aria-pressed="true"
                onclick="if (confirm('Estas seguro?')){ return true; } else {return false;}">Eliminar</a> 
            <?php } ?>
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
