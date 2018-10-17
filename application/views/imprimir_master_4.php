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
        <h2 class="sub_titulo_page_pr">
            EL PRECIO DE LA CASA <?php echo $formulario_2->fm_2_casa_no?> DE <?php echo $formulario_2->fm_2_proyecto?> DE   Q. 664,800.00
            “SI” INCLUYE:
        </h2>

        <ol>
            <li>Gabinetes de cocina tipo advantage, con lavatrastos incluido.</li>

            <li>Puertas y divisiones de closets, en los dormitorios.</li>

            <li>Zócalo (no incluye en áreas de closets, atrás de los gabinetes de cocina, baños, áreas de servicio, ni exteriores).</li>

            <li>Media paja de agua y conexión.</li>

            <li>Correr la casa un (1) metro hacia atrás: SIN COSTO</li>

            <li>El tablero de flipones de luz lo quiere en la lavandería, no en la cocina: SIN COSTO.</li>

            <li>Dejar la cocina tipo americano (sin muros) con un costo de Q. 7,800.00 menos descuento: Q. 4,300.00</li>

    </div>

    <!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<?php $this->stop() ?>