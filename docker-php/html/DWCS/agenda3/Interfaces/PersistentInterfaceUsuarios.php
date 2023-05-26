<?php
interface PersistentInterfaceUsuarios{
    function guardar();
    static function listar();
    static function eliminar($id);
    static function getById($id);
}