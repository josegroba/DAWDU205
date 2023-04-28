<?php
interface PersistentInterfaceEventos{
    function guardar(Evento $evento);
    function modificar(Evento $evento);
    function listar();
    function eliminar($id);
}

?>