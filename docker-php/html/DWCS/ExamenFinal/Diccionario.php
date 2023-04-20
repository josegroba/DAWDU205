<?php
class diccionario{
    private $dsn = "mysql:dbname=wordle;host=docker-mysql";
    private $usuario ="root";
    private $password = "root123";
    
    
    function crearBaseWordle(){
        try {
            $bd = new PDO("mysql:host=docker-mysql", $this->usuario, $this->password);
            
            $sql = file_get_contents('./wordle.sql');
            $datos = $bd->query($sql);
        
        } catch (Exception $e) {
            echo "ERROR:".$e->getMessage();
        }
    }
                
    function seleccionarPalabra(){
        try {
            $bd = new PDO($this->dsn, $this->usuario, $this->password);
            $sql = "select * from palabra";
            $datos = $bd->query($sql);
            $idPalabra=rand(1,$datos->rowCount());
            foreach($datos as $palabra) {
                if($palabra["idPalabra"]==$idPalabra){
                    return $palabra["palabra"]."<br>";
                }
            }
        } catch (Exception $e) {
            echo "ERROR:".$e->getMessage();
        }
    }
}
?>