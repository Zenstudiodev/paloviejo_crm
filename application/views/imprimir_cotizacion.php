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
$CI =& get_instance();
$cotizacion = $cotizacion->row();

$prospecto = $prospecto->row();
$proceso = $proceso->row();

?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>


<!-- page content -->
<div class="right_col" role="main">
    <div id="cotizacion">
        <div class="container">
            <div class="row">
                <div class="col-md-10"><img src="<?php echo base_url()?>/ui/build/images/logo_codeca.jpeg" id="logo_codeca_cotizacion"></div>
                <div class="col-md-2">Cotización <?php echo $cotizacion->cotizacion_id;?></div>
            </div>
            <h2 class="cotizacion_tittle">PRESUPUESTO DE EXTRAS SOLOCITADAS</h2>
            <div class="row">
                <div class="col-md-2">Para:</div>
                <div class="col-md-10">casa :<?php echo $proceso->casa?> Proyecto <?php echo $proceso->proyecto_id?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Tipo Casa:</div>
                <div class="col-md-10"><?php echo $proceso->tipo_casa_id?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Cliente</div>
                <div class="col-md-10"><?php echo $prospecto->nombre1?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Fecha:</div>
                <div class="col-md-10"><?php echo $cotizacion->cotizacion_fecha;?></div>
            </div>
        </div>
        <table>
            <th>
                <tr><td>PRESUPUESTO DE EXTRAS</td></tr>
            </th>
        </table>
        <table class="table">
            <?php
            //$items_array = array($cotizacion->cotizacion_items);
            $items_array = explode(",", $cotizacion->cotizacion_items);
           // print_r($items_array);

            //echo $items_array;
            $numero = 0;
            $total_cotizacion  = 0;
            ?>


            <?php foreach ($items_array as $item) {
                ?>
                <?php
                $numero = $numero+1;
                $item_data = $CI->Cotizador_model->gat_item_data($item);
                $item_data = $item_data->row();?>
                <tr>
                    <td style="width: 1cm"><?php echo $numero; ?></td>
                    <td><?php echo $item_data->nombre .' - '.$item_data->descripcion?></td>
                    <td class="item_precio"><?php echo $item_data->precio ?></td>
                </tr>

                <?php $total_cotizacion = $total_cotizacion + $item_data->precio ?>
            <?php } ?>
            <tr>
                <td colspan="2">Total</td>
                <td><?php echo $total_cotizacion?></td>
            </tr>
        </table>


    <div id="footer_cotizacion">
        8a. Calle 20-06 Zona 11, COlonia Mirador 1. P.B.X. 2381-7500 Fax 2381-7501
    </div>
    </div>

</div>
<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>
total_cotizacion = 0;

    $( document ).ready(function () {

    });
</script>
<?php $this->stop() ?>





