<?php
interface PersistentInterfaceEventos{
    /*function guardar($evento);
    function modificar($evento);
    function listar();
    function eliminar($id);*/
    function guardar();
    function modificar();
    static function listar();
    static function eliminar($id);
}
