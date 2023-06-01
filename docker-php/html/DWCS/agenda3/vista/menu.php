<?php 
require_once(dirname(__FILE__)."/../session/Sesiones.php");
function getMenu() {
ob_start();
if (Sesiones::isRegistered()) {
  $usuario= Sesiones::getSesiones();
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="dropdown">
      <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Eventos
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="?accion=listar">Listado de Eventos</a></li>
        <li><a class="dropdown-item" href="?accion=nuevo">Nuevo Evento</a></li>
      </ul>
    </div>
    <div class="dropdown">
      <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Usuarios
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="?accion=listarUsuarios">Listado de Usuarios</a></li>
        <li><a class="dropdown-item" href="?accion=nuevoUsuario">Nuevo Usuario</a></li>
      </ul>
	  </div>
    <a class="nav-link" href="?accion=cerrar">Cerrar Sesión</a>
</nav>  
<?php
}
$html = ob_get_contents();
ob_clean();
return $html;
}