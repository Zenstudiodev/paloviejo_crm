<?php
defined('BASEPATH') OR exit('No direct script access allowed');

setlocale(LC_ALL, 'es_ES.UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paloviejo - CRM</title>
    <!-- Bootstrap -->

    <link href="<?php echo base_url(); ?>ui/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     Font Awesome -->
    <link href="<?php echo base_url(); ?>ui/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>ui/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet"
          media="print">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url(); ?>ui/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Paloviejo - CRM</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo base_url(); ?>ui/build/images/pic.jpg" alt="..."
                             class="img-circle profile_img">

                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2>Carlos</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/dashboard">Inicio</a></li>

                                    <li><a href="<?php echo base_url(); ?>index.php/prospectos/prospectosList">Prospectos</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Formularios <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/prospectos/crearProspecto">Crear
                                            Prospecto</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">

            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">


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
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
                    seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                            <textarea class="form-control" style="height:55px;" id="descr"
                                                      name="descr"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title2" name="title2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                            <textarea class="form-control" style="height:55px;" id="descr2"
                                                      name="descr"></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>ui/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>ui/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>ui/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>ui/vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>ui/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>ui/build/js/custom.min.js"></script>

</body>
</html>

