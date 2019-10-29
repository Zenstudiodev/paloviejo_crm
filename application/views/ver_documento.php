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
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ver Documentos</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?php
                        if ($prospectos) {
                            foreach ($prospectos->result() as $prospecto) {
                                ?>
                                <div class="">
                                    <div class="page-title">
                                        <div class="title_left">
                                            <h3>Documentos de
                                                <small> <?php echo $prospecto->nombre1; ?></small>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Prominente Compador-->
                                            <?php if ($promitente_comprador) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Documentos Promitente comprador
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            <?php
                                                            foreach ($promitente_comprador->result() as $documento_P) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">


                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_P->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">


                                                                                <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_P->id; ?>">
                                                                                    <p>Ver</p>
                                                                                </a>

                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_P->id; ?>"><i
                                                                                                class="fa fa-link"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_P->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                                echo'No hay imágenes ingresadas';
                                            } ?>
                                            <!--Prominente Compador-->
                                            <?php if ($sucesor) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Documentos Sucesor
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            <?php
                                                            foreach ($sucesor->result() as $documento_S) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">


                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_S->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">


                                                                                <p>Ver</p>
                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_S->id; ?>"><i
                                                                                                class="fa fa-link"></i></a>
                                                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_S->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            } ?>
                                            <!--Prominente Propietario-->
                                            <?php if ($propietario) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Documentos Propietario
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <div class="row">
                                                            <?php
                                                            foreach ($propietario->result() as $documento_Pro) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">
                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_Pro->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">
                                                                                <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_Pro->id; ?>">
                                                                                    <p>Ver</p>
                                                                                </a>
                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_Pro->id; ?>">
                                                                                        <i class="fa fa-link"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_Pro->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            } ?>
                                            <!--Prominente Mandatario-->
                                            <?php if ($mandatario) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Documentos Mandatrio
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            <?php
                                                            foreach ($mandatario->result() as $documento_M) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">


                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_M->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">


                                                                                <p>Ver</p>
                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_M->id; ?>"><i
                                                                                                class="fa fa-link"></i></a>
                                                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_M->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            } ?>
                                            <!--Prominente Mandatario-->
                                            <?php if ($gestor) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Documentos Gestor de negocios
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            <?php
                                                            foreach ($gestor->result() as $documento_G) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">


                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_G->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">


                                                                                <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_G->id; ?>">
                                                                                    <p>Ver</p>
                                                                                </a>
                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_G->id; ?>"><i
                                                                                                class="fa fa-link"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_G->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            } ?>
                                            <!--Plano Cotizacion-->
                                            <?php if ($plano_cotizacion) { ?>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Planos y cotizaciones
                                                        </h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <div class="row">
                                                            <?php
                                                            foreach ($plano_cotizacion->result() as $documento_G) {
                                                                ?>
                                                                <div class="col-md-55">
                                                                    <div class="thumbnail">
                                                                        <div class="image view view-first">


                                                                            <img>
                                                                            <img style="width: 100%; display: block;"
                                                                                 src="<?php echo base_url() . 'uploads/images/' . $documento_G->src; ?>"
                                                                                 alt="image"/>
                                                                            <div class="mask">


                                                                                <p>Ver</p>
                                                                                <div class="tools tools-bottom">
                                                                                    <a href="<?php echo base_url() . 'index.php/documentos/detalleDocumento/' .$prospecto->id.'/'.$documento_G->id; ?>"><i
                                                                                                class="fa fa-link"></i></a>
                                                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption">
                                                                            <p><?php echo $documento_G->tipo_documento ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="actionBar">
                                    <a href="<?php echo base_url().'prospectos/prospectoDetalle/'.$prospecto->id;?>" class="buttonNext btn btn-success">Volver</a>
                                    <a href="<?php echo base_url().'documentos/subirDocumento/'.$prospecto->id.'/'.$segmento_d;?>" class="buttonNext btn btn-success">Subir mas</a>
                                </div>

                            <?php }
                        } else {
                        } ?>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<?php $this->stop() ?>



