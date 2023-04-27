<?php
class Evento{

    public function __construct(
                    private $id_evento=null,
                    private $id_usuario=null,
                    private $nombre=null,
                    private ?DateTime $fecha_inicio=null,
                    private ?DateTime $fecha_fin=null ){
        if($id_usuario==null){
            throw new Exception("El evento necesita un usuario asignado");
        }
        if($fecha_inicio==null){
            $this->fecha_inicio = new DateTime();
        }
        if ($this->fecha_fin == null) {
            $this->fecha_fin = clone $this->fecha_inicio;
            $this->fecha_fin->modify('+ 1 hour');
        }
    }

    public function getIdEvento(){
        return $this->id_evento;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getFechaInicio(){
        return $this->fecha_inicio;
    }
    public function getFechaFin(){
        return $this->fecha_fin;
    }
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function setIdEvento($id){
        $this->id_evento=$id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setFechaInicio(DateTime $fecha){
        $this->fecha_inicio=$fecha;
    }
    public function setFechaFin(DateTime $fecha){
        $this->fecha_fin=$fecha;
    }
    public function setIdUsuario($id){
        $this->id_usuario=$id;
    }


    function __serialize(): array
    {
        return [
        "id_evento"=>$this->id_evento,
        "id_usuario"=>$this->id_usuario,
        "nombre"=>$this->nombre,
        "fecha_inicio"=>$this->fecha_inicio,
        "fecha_fin"=>$this->fecha_fin  ];
    }

    function __unserialize(array $data): void
    {
        $this->id_evento = $data["id_evento"];
        $this->id_usuario = $data["id_usuario"];
        $this->nombre = $data["nombre"];
        $this->fecha_inicio = $data["fecha_inicio"];
        $this->fecha_fin  = $data["fecha_fin"];
    }
}

?>