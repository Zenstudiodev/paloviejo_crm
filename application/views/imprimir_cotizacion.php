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
                <div class="col-md-4"></div>
                <div class="col-md-2"><img src="<?php echo base_url()?>/ui/build/images/logo_codeca.jpeg" id="logo_codeca"></div>
                <div class="col-md-4">Cotización <?php echo $cotizacion->cotizacion_id;?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Para:</div>
                <div class="col-md-10"></div>
            </div>
            <div class="row">
                <div class="col-md-2">Tipo Casa:</div>
                <div class="col-md-10"></div>
            </div>
            <div class="row">
                <div class="col-md-2">Cliente</div>
                <div class="col-md-10"></div>
            </div>
            <div class="row">
                <div class="col-md-2">Fecha:</div>
                <div class="col-md-10"></div>
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
                    <td><?php echo $item_data->precio ?></td>
                    <td>
                        <?php if($numero == 1){ ?>
                            <img src="https://ferreteriavidri.com/images/items/large/108695.jpg" style="width: 10%">
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>


    </div>

</div>
<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script>
</script>
<?php $this->stop() ?>





