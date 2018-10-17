<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales
$this->layout('master', [
    'title' => $title,
    'nombre' => $nombre,
    'user_id' => $user_id,
    'username' => $username,
    'rol' => $rol,
    'notificaciones' => $notificaciones,
    'notificaciones_s' => $notificaciones_supervisor,
    'alertas' => $alertas,
    'alertas_s' => $alertas_supervisor

]);

print_r($cotizaciones->result())
?>


<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cotizaciones</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Seleccionar elementos
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <?php

                        if ($cotizaciones) {?>
                        <table class="table">
                            <thead>
                            <tr>
                                <td>id</td>
                                <td>Fecha</td>
                                <td>accion</td>
                            </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($cotizaciones->result() as $cotizacion) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cotizacion->cotizacion_id; ?></td>
                                        <td><?php echo $cotizacion->cotizacion_fecha; ?></td>
                                        <td><a class="btn btn-success" href="<?php echo base_url().'Proceso/imprimir_cotizacion/'.$cotizacion->cotizacion_id;?>">Imprimir</a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <?php } else {
                            echo 'no hay cotizaciones';
                        } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>


<script>
</script>







