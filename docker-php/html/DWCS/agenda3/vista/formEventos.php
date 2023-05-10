<?php 

function getFormEventos($evento=null) {
    ob_start();
?>
    <div class="card "  style="width: 32rem;">
        <?php

            if($evento==null){
                $id=null;
                $nombre=null;
                $fecha_inicio=null;//new DateTime();
                $fecha_fin=null;//new DateTime();
        ?>
            <h2>Crear nuevo evento</h2>
        <?php
            }else{
                $id=$evento->getIdEvento();
                $nombre=$evento->getNombre();
                $fecha_inicio=$evento->getFechaInicio();
                $fecha_fin=$evento->getFechaFin();
        ?>
            <h2>Modificar el evento</h2>
        <?php
            }//echo($fecha_inicio->format('Y-m-d'.'T'.'H:i'));
            //echo($fecha_fin->format('Y-m-d'.'T'.'H:i'));
        ?>
        <div class="card-body">
            <form action="" method="post"  class="mb-3">
                <input type="hidden" name="id_evento" value="<?=$id?>">
                <div class="mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required value="<?=$nombre?>">
                </div>
                <div class="mb-3">    
                    <label for="fecha_inicio">Fecha de inicio:</label><br>
                    <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value="<?=$fecha_inicio==null? $fecha_inicio:$fecha_inicio->format('Y-m-d H:i')?>">
                </div>
                <div class="mb-3">    
                    <label for="fecha_fin">Fecha de fin:</label><br>
                    <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?=$fecha_fin==null? $fecha_fin:$fecha_fin->format('Y-m-d H:i')?>">
                </div>
                <input type="submit" name="accion" value="guardar"  class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    $html = ob_get_contents();
    ob_clean();
    return $html;
}