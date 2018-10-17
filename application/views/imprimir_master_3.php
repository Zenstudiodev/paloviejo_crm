<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2018
 * Time: 5:15 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales
$this->layout('master', [
    'title'            => $title,
    'nombre'           => $nombre,
    'user_id'          => $user_id,
    'username'         => $username,
    'rol'              => $rol,
    'notificaciones'   => $notificaciones,
    'notificaciones_s' => $notificaciones_supervisor,
    'alertas'          => $alertas,
    'alertas_s'        => $alertas_supervisor
]);


$prospecto = $prospecto->row();
$proceso   = $proceso->row();
$formulario_1 = $formulario_1->row();
$formulario_2 = $formulario_2->row();
$fecha= New DateTime();




?>
<?php $this->start('css_p') ?>
    <!--cargamos css personalizado-->
    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
          rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <h1 class="titulo_page_pr"><?php echo $formulario_2->fm_2_proyecto?></h1>
        <p>Plan de venta <br>
            casa No. <?php echo $formulario_2->fm_2_casa_no; ?><br>
            <?php echo $formulario_2->fm_2_proyecto; ?>
        </p>
        <div class="row">
            <div class="col-md-6">Cliente</div>
            <div class="col-md-6"><?php echo $formulario_1->fm_1_nombre; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6">Fecha</div>
            <div class="col-md-6"><?php echo $formulario_2->fm_2_fecha; ?></div>
        </div>
        <div class="row">
            <div class="col-md-6">Precio con otros gastos y extras incluidos</div>
            <div class="col-md-6"><?php echo $formulario_2->fm_2_precio_total; ?></div>
        </div>
        <h4>
            FORMA DE PAGO DEL PRECIO TOTAL
            INCLUYE O.G. Y E:

        </h4>
        <table>
            <tr>
                <td> 1.</td>
                <td>PRIMER PAGO</td>
                <td>02/05/2017</td>
                <td>Q 70,000.00</td>
            </tr>
            <tr>
                <td> 2.</td>
                <td>SEGUNDO PAGO</td>
                <td>02/12/2017</td>
                <td>Q 30,000.00</td>
            </tr>
            <tr>
                <td> 3.</td>
                <td>TERCER PAGO
                    CREDITO BANCARIO</td>
                <td>02/12/2017</td>
                <td>Q 564,800.00</td>
            </tr>
            <tr>
                <td>PRECIO TOTAL (Incluye O.G. y E.)</td>
                <td>Q 664,800.00</td>
            </tr>

        </table>
        <p>
            *EL ÚLTIMO PAGO (3ERO) DEBERÀ EFECTUARSE A MÁS TARDAR CONTRA
            LA TERMINACIÓN DE LA CONSTRUCCIÓN DE LA CASA, CON FONDOS
            PROPIOS O FINANCIAMIENTO BANCARIO.

        </p>
    </div>

    <!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<?php $this->stop() ?>