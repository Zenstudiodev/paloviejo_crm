<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 30/05/2017
 * Time: 11:51 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/manifest.json">
    <!-- titulo -->
    <title><?php echo $this->e($title); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>ui/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Font Awesome -->
    <script src="https://use.fontawesome.com/c9c1f13863.js"></script>
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>ui/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom css for pages -->
    <?php echo $this->section('css_p') ?>
    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url(); ?>ui/build/css/custom.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>ui/build/css/print.css" rel="stylesheet">

    <style>
        .wraptocenter {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
            width: 200px;
            height: 200px;
            background-color: #999;
        }

        .wraptocenter * {
            vertical-align: middle;
        }
    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url(); ?>index.php/dashboard" class="site_title"><i class="fa fa-gear"></i>
                        <span>Paloviejo - CRM</span></a>
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
                        <h2><?php echo $this->e($nombre); ?></h2>
                        <p><?php echo $this->e($rol) ?></p>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>dashboard">Inicio</a></li>

                                    <li><a href="<?php echo base_url(); ?>prospectos/prospectosList">Prospectos</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Formularios <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>prospectos/crearProspecto">Crear
                                            Prospecto</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-cog"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url(); ?>cotizador/crear_items">Items para cotizador</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>cotizador/crear_items_acabado">Items para acabados</a>
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
                    <a data-toggle="tooltip" data-placement="top" title="Logout"
                       href="<?php echo base_url(); ?>index.php/login/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <div class="nav navbar-nav navbar-right">

                        <?php
                        //definimos numero de notificaciones por defecto
                        $numero_alertas_p = 0;
                        $numero_alertas_s = 0;
                        // si hay notificaciones porpias las asignamos a la variable
                        if ($alertas) {
                            $numero_alertas_p = $alertas->num_rows();
                        }
                        // si hay $numero_alertas_S de subordinados las asignamos a la variable
                        if ($alertas_s) {
                            $numero_alertas_s = $alertas_s->num_rows();
                        }
                        // sumamos ambos resultados para obtener el total de notificaciones
                        $numero_alertas = ($numero_alertas_p + $numero_alertas_s);


                        ?>



                        <?php if ($alertas_s || $alertas) { ?>

                            <!--Alertas-->

                            <ul class="nav navbar-nav ">
                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-red"><?php echo $numero_alertas; ?></span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                        <?php if ($alertas_s) { ?>
                                            <!--Alerta subordinado-->
                                            <?php foreach ($alertas_s->result() as $alerta_s) { ?>

                                                <li>
                                                    <a href="<?php echo base_url() . '/index.php/Notificaciones/resultadoAlertas/' . $alerta_s->notificacion_id ?>"
                                                       class="">
                                                        <input type="hidden" class="notificacionId"
                                                               value="<?php echo $alerta_s->notificacion_id ?>"
                                                               name="notificacion_id_<?php echo $alerta_s->notificacion_id ?>">
                                                        <span>
                                                            <span><?php echo $alerta_s->titulo ?></span>
                                                            <span class="time"><?php echo $alerta_s->fecha; ?></span>
                                                            <span class="message">
                                                                <?php echo $alerta_s->contenido ?>
                                                            </span>
                                                    </a>
                                                </li>

                                            <?php }
                                        }//if alertas_s end?>

                                        <!--Notificaciones propias-->
                                        <?php if ($alertas) { ?>
                                            <?php foreach ($alertas->result() as $alerta) { ?>
                                                <li>
                                                    <a href="<?php echo base_url() . 'index.php/prospectos/prospectoDetalle/' . $alerta->prospecto_id ?>"
                                                       >
                                                        <input type="hidden" class="notificacionId"
                                                               value="<?php echo $alerta->notificacion_id ?>"
                                                               name="notificacion_id_<?php $alerta->notificacion_id ?>">
                                                        <p>
                                                            <span class="time"><?php echo $alerta->fecha; ?></span>
                                                        </p>
                                                        <p>
                                                            <br>
                                                            <span><?php echo $alerta->titulo ?></span>
                                                        </p>
                                                        <span class="message">
                                                            <?php echo $alerta->contenido ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                        <!--Notificaciones propias END-->

                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>

                        <?php

                        //definimos numero de notificaciones por defecto
                        $numero_notificaciones_p = 0;
                        $numero_notificaciones_S = 0;
                        // si hay notificaciones porpias las asignamos a la variable
                        if ($notificaciones) {
                            $numero_notificaciones_p = $notificaciones->num_rows();
                        }
                        // si hay notificaciones de subordinados las asignamos a la variable
                        if ($notificaciones_s) {
                            $numero_notificaciones_S = $notificaciones_s->num_rows();
                        }
                        // sumamos ambos resultados para obtener el total de notificaciones
                        $numero_notificaciones = ($numero_notificaciones_p + $numero_notificaciones_S);

                        ?>


                        <ul class="nav navbar-nav ">
                            <!--Notificaciones-->
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <!--conteo de notificaciones activas -->
                                    <span class="badge bg-green"><?php echo $numero_notificaciones ?></span>
                                </a>

                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <!--Notificaciones propias-->
                                    <?php if ($notificaciones) { ?>
                                        <?php foreach ($notificaciones->result() as $notificacion) { ?>
                                                <li>
                                                    <a href="<?php echo base_url() . 'index.php/prospectos/prospectoDetalle/' . $notificacion->prospecto_id ?>"
                                                       class="notificacionA">
                                                        <input type="hidden" class="notificacionId"
                                                               value="<?php echo $notificacion->notificacion_id ?>"
                                                               name="notificacion_id_<?php $notificacion->notificacion_id ?>">
                                                        <p>
                                                            <span class="time"><?php echo $notificacion->fecha; ?></span>
                                                        </p>
                                                        <p>
                                                            <br>
                                                            <span><?php echo $notificacion->titulo ?></span>
                                                        </p>
                                                        <span class="message">
                                                            <?php echo $notificacion->contenido ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    <!--Notificaciones propias END-->

                                    <?php if ($notificaciones_s) { ?>
                                        <!--Notificaciones subordinados-->
                                        <?php foreach ($notificaciones_s->result() as $notificacions) { ?>
                                                <li>
                                                    <a href="<?php echo base_url() . 'index.php/prospectos/prospectoDetalle/' . $notificacions->prospecto_id ?>"
                                                       class="notificacionA">
                                                        <input type="hidden" class="notificacionId"
                                                               value="<?php echo $notificacions->notificacion_id ?>"
                                                               name="notificacion_id_<?php $notificacions->notificacion_id ?>">
                                                        <p>
                                                            <span class="time">
                                                                <?php echo $notificacions->fecha; ?>
                                                            </span>
                                                        </p>
                                                        <p><br>
                                                            <span>
                                                                <?php echo $notificacions->titulo ?>
                                                            </span>
                                                        </p>
                                                        <span class="message">
                                                            <?php echo $notificacions->contenido ?>
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    <!--Notificaciones subordinados END-->
                                </ul>
                            </li>
                        </ul>

                    </div>


                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <?php echo $this->section('page_content') ?>
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                <p>footer</p>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- Off Body -->
<?php echo $this->section('off_body') ?>

<!-- PWA --
<script src="<?php echo base_url(); ?>ui/build/js/pwabuilder-sw-register.js"></script>-->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>ui/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>ui/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>ui/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>ui/vendors/nprogress/nprogress.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
<script src="<?php echo base_url(); ?>/ui/build/js/fcm.js"></script>


<?php echo $this->section('js_p') ?>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>ui/build/js/pv.js"></script>


</body>
</html>

