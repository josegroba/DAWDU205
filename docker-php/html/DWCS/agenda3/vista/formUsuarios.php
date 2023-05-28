<?php 
require_once(dirname(__FILE__)."/../session/Sesiones.php");
function getFormUsuarios($usuario=null) {
    $usuActual=Sesiones::getSesiones();
    $rolActual=$usuActual->getRol();
    ob_start();
?>
    <div class="card "  style="width: 32rem;">
        <?php
            if(is_null($usuario)){
                $id=null;
                $nombre=null;
                $correo=null;
                $rol=null;
        ?>
            <h2>Registrar nuevo usuario</h2>
        <?php
            }else{
                $id=$usuario->getId();
                $nombre=$usuario->getNombre();
                $correo=$usuario->getCorreo();
                $rol=$usuario->getRol();
        ?>
            <h2>Modificar el usuario</h2>
        <?php
            }
        ?>
        <div class="card-body">
            <form action="" method="post"  class="mb-3">
                <input type="hidden" name="id_usuario" value="<?=$id?>">
                <div class="mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required value="<?=$nombre?>">
                </div>
                <div class="mb-3">    
                    <label for="correo">Correo:</label><br>
                    <input type="email" name="correo" id="correo" required value="<?=$correo?>">
                </div>
                <div class="mb-3">    
                    <label for="password" <?php if(is_null($id)){?>required<?php } ?>>Contraseña:</label><br>
                    <input type="password" name="password" id="password">
                </div>
                <?php
                    if($rolActual==1||$rolActual==2){
                ?>
                    <div class="mb-3">    
                    <label for="rol">Rol de usuario: </label>
                    <select name="rol" id="rol" required>
                        <?php if(is_null($rol)){ ?><option value="" selected disabled>Elige un rol</option><?php } ?>
                        <option value="0" <?php if(!is_null($rol)&&$rol==0){ ?> selected <?php } ?>>Usuario normal</option>
                        <option value="1" <?php if(!is_null($rol)&&$rol==1){ ?> selected <?php } ?>>Administrador</option>
                    </select>
                    </div>
                <?php
                    }else{
                ?>
                    <input type="hidden" name="rol" value="<?=0?>">
                <?php
                    }
                ?>
                <input type="submit" name="accion" value="guardarUsuario"  class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    $html = ob_get_contents();
    ob_clean();
    return $html;
}