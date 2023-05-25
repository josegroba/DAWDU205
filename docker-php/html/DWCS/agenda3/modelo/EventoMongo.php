<?php
require_once(dirname(__FILE__)."/../modelo/Evento.php");
require_once(dirname(__FILE__)."/../BD/BDMongo.php");
class EventoMongo extends Evento implements MongoDB\BSON\Persistable{
    
    function guardar(){
        if (!isset($this->id_evento)) {
            $res = BDMongo::getConexion()->Evento->insertOne($this);
            $this->id_evento =  $res->getInsertedId();
        } else {
            BDMongo::getConexion()->Evento->updateOne(
                [ "_id" => new MongoDB\BSON\ObjectID($this->id_evento) ],
                [ '$set' =>  $this]);
        }
    }

    static function listar(){
        $eventos = [];
        BdMongo::getConexion();
        $cursor = BDMongo::getConexion()->Evento->find();
        $cursor->setTypeMap(['root' => EventoMongo::class]);
        $evs = $cursor->toArray(); 
        foreach($evs as $evento){
            $eventos[(String)$evento->id_evento]=$evento;
        }
        return $eventos;
    }
    static function eliminar($id){
        BDMongo::getConexion()->Evento->deleteOne(
            [ "_id" => new MongoDB\BSON\ObjectID($id) ]
           );
    }

    static function getById($id){
        return  BDMongo::getConexion()->Evento->findOne( 
            [ "_id" => new MongoDB\BSON\ObjectID($id) ],
           ['typeMap'=>['root' => EventoMongo::class]]);
    }

    function bsonUnserialize(array  $data): void
    {
    //$this->nombre = $data["nombre"];
      foreach ($data as $key => $value) {
          switch ($key) {
              case '_id': $this->id_evento = $value; break;
              case 'fecha_inicio':
                $this->fecha_inicio =new DateTime($value);
                break;
              case 'fecha_fin':
                $this->fecha_fin =new DateTime($value);
                break;
              default: $this->$key = $value; break;
          }
      }
   }
   public function bsonSerialize(): array
   {

       //$array = (array) $this;
       $array = ["id_usuario"=>$this->getIdUsuario(),
                 "nombre"=>$this->getNombre(),
                 "fecha_inicio"=>$this->getFechaInicio()->format('Y-m-d H:i:s'),
                 "fecha_fin"=>$this->getFechaFin()->format('Y-m-d H:i:s')];
       if (isset( $this->id_evento)) {
        $array['_id'] = new MongoDB\BSON\ObjectID($this->id_evento);
       }
       unset($array['id_evento']);
       return $array;
   }
}