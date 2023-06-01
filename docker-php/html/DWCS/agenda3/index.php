<?php
require_once(dirname(__FILE__)."/modelo/Usuario.php");
require_once(dirname(__FILE__)."/controller/Eventos.php");
require_once(dirname(__FILE__)."/controller/Usuarios.php");
require_once(dirname(__FILE__)."/vista/cabecera.php");
require_once(dirname(__FILE__)."/vista/listadoEventos.php");
require_once(dirname(__FILE__)."/vista/listadoUsuarios.php");
require_once(dirname(__FILE__)."/vista/pie.php");
require_once(dirname(__FILE__)."/vista/formEventos.php");
require_once(dirname(__FILE__)."/vista/formUsuarios.php");
require_once(dirname(__FILE__)."/vista/login.php");
require_once(dirname(__FILE__)."/session/Sesiones.php");
if(session_status()===PHP_SESSION_ACTIVE){

}else{
  session_start();
}
//session_destroy();
$superAdmin = new Usuario(null,"Luis","luis@test.com",2,Usuario::hashPassword("12345"));
$usuarios=[];
$contenido ="";
try {
  //Validar usuario
  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])&&isset($_POST["tipo"])) {
    Tipo::createTipo($_POST["tipo"]);
    $usuarios=Usuarios::Listar();
    $usuCorrecto=false;
    foreach ($usuarios as $usuario) {
      if ($usuario->comprobarValidarUsuario($_POST["correo"],$_POST["password"])){
        $usuCorrecto=true;
        Sesiones::createSesiones($usuario);
      }
    }
    if(!$usuCorrecto){
      if ($superAdmin->comprobarValidarUsuario($_POST["correo"],$_POST["password"])){
        $usuCorrecto=true;
        Usuarios::guardar(null,"Luis","luis@test.com",2,Usuario::hashPassword("12345"));
        Sesiones::createSesiones($superAdmin);
      }else{
        throw new Exception("Acceso denegado");
      }
    }
  }
  $usuarioActual = Sesiones::getSesiones(); //*/
  $eventos=Eventos::Listar();
  //Usuario validado
  $accion = null;
  $id_evento = null;
  $nombre_evento=null;
  $fecha_inicio="";
  $fecha_fin="";
  $id_usuario=null;
  $nombre_usuario=null;
  $correo=null;
  $rol=0;
  $password=null;
  if ($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (isset($_GET['id_evento'])) {
      $id_evento = $_GET['id_evento'];
    }
    if (isset($_GET['id_usuario'])) {
      $id_usuario = $_GET['id_usuario'];
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
      $fecha_inicio = new DateTime($_POST["fecha_inicio"]);
    }
    if(isset($_POST["fecha_fin"])){
      $fecha_fin = new DateTime($_POST["fecha_fin"]);
    }
    if($_POST["fecha_inicio"]==$_POST["fecha_fin"]){
      $fecha_fin=null;
    }
    Eventos::guardar($id_evento==null? null:$id_evento,$usuarioActual->getId(),$nombre_evento,$fecha_inicio!=null? $fecha_inicio: null,$fecha_fin!=null? $fecha_fin:null);
    $accion="listar";
  }
  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["accion"]) && $_POST["accion"]=="guardarUsuario") {
    $id_Nusuario=null;
    $nombre_Nusuario=null;
    $Ncorreo=null;
    $Nrol=0;
    $Npassword=null;
    if(isset($_POST["id_usuario"])){
      $id_Nusuario = $_POST["id_usuario"];
    }
    if(isset($_POST["nombre"])){
      $nombre_Nusuario = $_POST["nombre"];
    }
    if(isset($_POST["correo"])){
      $Ncorreo = $_POST["correo"];
    }
    if(isset($_POST["rol"])){
      $Nrol = $_POST["rol"];
    }
    if(isset($_POST["password"])){
      $Npassword = Usuario::hashPassword($_POST["password"]);
    }
    //Usuarios::guardar(null,"Luis","luis@test.com",2,Usuario::hashPassword("12345"));
    Usuarios::guardar($id_Nusuario,$nombre_Nusuario,$Ncorreo,$Nrol,$Npassword);
    $accion="listarUsuarios";
  }

  switch ($accion) {
    case 'cerrar':
      $contenido = getLogin();
      Sesiones::closeSession();
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
    case 'nuevoUsuario':
      $contenido=getFormUsuarios();
      break;
    case 'eliminarUsuario': 
      Usuarios::Eliminar($id_usuario);
      $accion = "listarUsuarios";
    case 'listarUsuarios':
      $usuarios=Usuarios::Listar();
      $contenido=ListadoUsuarios($usuarios);
      break;
    case 'modificar':
        $contenido = getFormEventos(Eventos::getById($id_evento));
        break;
    case 'modificarUsuario':
      $contenido = getFormUsuarios(Usuarios::getById($id_usuario));
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