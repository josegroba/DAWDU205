<?php 

function getLogin($mensaje=null,$correo="") {
    ob_start();
?>
    <div class="card "  style="width: 32rem;">
        <h2>Entrar en agenda</h2>
        <div class="card-body">
            <?php
                if (!is_null($mensaje)) {
            ?>
            <div class="alert alert-danger" role="alert"><?=$mensaje?></div>
            <?php } ?>
            <form action="" method="post"  class="mb-3">
                <div class="mb-3">
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" id="correo" required value="<?=$correo?>">
                </div>
                <div class="mb-3">    
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" id="password"  required>
                </div>
                <div class="mb-3">
                    <label for="tipo">Quiero que la aplicacion funcione con: </label>
                    <select name="tipo" id="tipo" required>
                        <option value="" selected disabled>Elige una opcion</option>
                        <option value="sesiones">Sesiones</option>
                        <option value="mysql">Mysql</option>
                        <option value="mongo">Mongo</option>
                    </select>
                </div>
                <input type="submit" value="Entrar"  class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    $html = ob_get_contents();
    ob_clean();
    return $html;
}
?>