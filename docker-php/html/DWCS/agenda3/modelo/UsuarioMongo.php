<?php
require_once(dirname(__FILE__)."/../modelo/Usuario.php");
require_once(dirname(__FILE__)."/../BD/BDMongo.php");
require_once(dirname(__FILE__)."/../session/Sesiones.php");
class UsuarioMongo extends Usuario implements MongoDB\BSON\Persistable{
    
    function guardar(){
        if (is_null($this->id_usuario)) {
            $res = BDMongo::getConexion()->Usuario->insertOne($this);
            $this->id_usuario =  $res->getInsertedId();
        } else {
            BDMongo::getConexion()->Usuario->updateOne(
                [ "_id" => new MongoDB\BSON\ObjectID($this->id_usuario) ],
                [ '$set' =>  $this]);
        }
    }

    static function listar(){
        BdMongo::getConexion();
        $cursor = BDMongo::getConexion()->Usuario->find();
        $cursor->setTypeMap(['root' => UsuarioMongo::class]);
        $usus = $cursor->toArray();
        $usuarios = [];
        try{
            $usuario=Sesiones::getSesiones();
            foreach($usus as $usu){
                if($usuario->getRol()>=$usuario->getRol()){
                    $usuarios[(String)$usu->id_usuario]=$usu;
                }
            }
        }catch(LoginException){
            foreach($usus as $usu){
                $usuarios[(String)$usu->id_usuario]=$usu;
            }
        }
        return $usuarios;
    }
    static function eliminar($id){
        BDMongo::getConexion()->Usuario->deleteOne(
            [ "_id" => new MongoDB\BSON\ObjectID($id) ]
           );
    }

    static function getById($id){
        return  BDMongo::getConexion()->Usuario->findOne( 
            [ "_id" => new MongoDB\BSON\ObjectID($id) ],
           ['typeMap'=>['root' => UsuarioMongo::class]]);
    }

    function bsonUnserialize(array  $data): void
    {
    //$this->nombre = $data["nombre"];
      foreach ($data as $key => $value) {
          switch ($key) {
              case '_id': $this->id_usuario = $value; break;
              default: $this->$key = $value; break;
          }
      }
   }
   public function bsonSerialize(): array
   {

       //$array = (array) $this;
       $array = ["nombre"=>$this->getNombre(),
                 "correo"=>$this->getCorreo(),
                 "rol"=>$this->getRol(),
                 "password"=>$this->getPassword()];
       if (isset( $this->id_usuario)) {
        $array['_id'] = new MongoDB\BSON\ObjectID($this->id_usuario);
       }
       unset($array['id_usuario']);
       return $array;
   }
}