<?php 

function getFormUsuarios($usuario) {
    ob_start();
?>
    <div class="card "  style="width: 32rem;">
        <?php

            if(is_int($usuario)){
                $id=null;
                $nombre=null;
                $correo=null;
                $rol=$usuario;
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
                <input type="hidden" name="id_evento" value="<?=$id?>">
                <div class="mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required value="<?=$nombre?>">
                </div>
                <div class="mb-3">    
                    <label for="correo">Correo:</label><br>
                    <input type="email" name="correo" id="correo" required value="<?=$correo?>">
                </div>
                <div class="mb-3">    
                    <label for="password">Contraseña:</label><br>
                    <input type="password" name="password" id="password">
                </div>
                <?php
                    if($rol==1){
                ?>
                    <div class="mb-3">    
                    <label for="rol">Rol de usuario: </label>
                    <select name="rol" id="rol" required>
                        <option value="" selected disabled>Elige un rol</option>
                        <option value="0">Usuario normal</option>
                        <option value="1">Administrador</option>
                    </select>
                    </div>
                <?php
                    }
                ?>
                <input type="submit" name="accion" value="guardar"  class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    $html = ob_get_contents();
    ob_clean();
    return $html;
}