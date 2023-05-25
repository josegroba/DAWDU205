<?php
interface PersistentInterfaceUsuarios{
    /*function guardar($evento);
    function modificar($evento);
    function listar();
    function eliminar($id);*/
    function guardar();
    static function listar();
    static function eliminar($id);
    static function getById($id);
}