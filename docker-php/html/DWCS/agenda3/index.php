<?php
require_once(dirname(__FILE__)."/modelo/Usuario.php");
require_once(dirname(__FILE__)."/controller/Eventos.php");
require_once(dirname(__FILE__)."/vista/cabecera.php");
require_once(dirname(__FILE__)."/vista/listadoEventos.php");
require_once(dirname(__FILE__)."/vista/pie.php");
require_once(dirname(__FILE__)."/vista/formEventos.php");
if(session_status()===PHP_SESSION_ACTIVE){

}else{
  session_start();
}
$eventos=Eventos::Listar();
//Eventos::guardar(null,1,"prueba13");
$secretUser = new Usuario(0,"Luis","luis@test.com",1,"12345",true);
$contenido ="";
try {/*
  //Validar usuario
  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])) {
   if (!$secretUser->comprobarValidarUsuario($_POST["correo"],$_POST["password"])) {
     throw new Exception("Acceso denegado");
   } else {
      UsuarioSession::createUsuarioSession($secretUser);
      
   }
  }
  $usuario = UsuarioSession::getUsuarioSession();   */
  //Usuario validado
  $accion = null;
  $id_evento = null;
  $nombre_evento=null;
  $fecha_inicio="";
  $fecha_fin="";
  if ($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (isset($_GET['id_evento'])) {
      $id_evento = $_GET['id_evento'];
    }
    
  }

  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["accion"]) && $_POST["accion"]=="guardar") {
    if(isset($_POST["id_evento"])){
      $id_evento = $_POST["id_evento"];
    }
    if(isset($_POST["nombre"])){
      $nombre_evento = $_POST["nombre"];
    }
    if(isset($_POST["fecha_inicio"])){
      echo($_POST["fecha_inicio"]);
      $fecha_inicio = new DateTime($_POST["fecha_inicio"]);
    }
    if(isset($_POST["fecha_fin"])){
      $fecha_fin = new DateTime($_POST["fecha_fin"]);
    }
    Eventos::guardar($id_evento==null? null:$id_evento,1,$nombre_evento,$fecha_inicio!=null? $fecha_inicio: null,$fecha_fin!=null? $fecha_fin:null);
    $accion="listar";
  }

  switch ($accion) {
    case 'cerrar':
      $contenido = getLogin();
      break;
    case 'eliminar': 
      Eventos::Eliminar($id_evento);
      $accion = "listar";
    case 'listar':
      $eventos = Eventos::listar();
      $contenido = ListadoEventos($eventos);
      break;
    case 'nuevo':
      $contenido=getFormEventos();
      break;
      case 'cerrar': UsuarioSession::closeSession();          
            break;
      case 'modificar':
        $contenido = getFormEventos(Eventos::getById($id_evento));
        break;      
    default:
           $eventos = Eventos::listar();
            $contenido = ListadoEventos($eventos);

  }
} catch(LoginException $e) { 

  $contenido = getLogin($e->getMessage());
}
catch(Exception $e) { 
    $contenido = "Otro error".$e->getMessage();
  }

?>
<?=getCabecera()?>
<?=$contenido?>
<?php
/*
  $date = new DateTime();
  $result = $date->format('d-m-Y H:i:s');
  echo "fecha:".$result.'<input type="datetime-local">';
  */
?>
<?=getPie()?>