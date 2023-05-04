<?php
require_once(dirname(__FILE__)."/modelo/Usuario.php");
require_once(dirname(__FILE__)."/controller/Eventos.php");
require_once(dirname(__FILE__)."/vista/cabecera.php");
require_once(dirname(__FILE__)."/vista/listadoEventos.php");
require_once(dirname(__FILE__)."/vista/pie.php");
$a=new Eventos();
$eventos=$a->Listar();
if(session_status()===PHP_SESSION_ACTIVE){

}else{
  session_start();
}

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
  if ($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (isset($_GET['id_evento'])) {
      $id_evento = $_GET['id_evento'];
      
      
    }
    switch ($accion) {
      case 'cerrar': UsuarioSession::closeSession();          
            break;
      case 'eliminar': 
        Eventos::Eliminar($id_evento);
        $accion = "listarEventos";
        break;
    }


  }

  switch ($accion) {
    case 'cerrar':
      $contenido = getLogin();
      break;
    case 'listar':
      $eventos = Eventos::listar();
      $contenido = ListadoEventos($eventos);
      break;
    case 'nuevo':
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
  $result = $date->format('d-m-Y H:i');
  echo "fecha:".$result.'<input type="datetime-local">';
  */
?>
<?=getPie()?>