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

    <!-- Croper -->
    <link href="<?php echo base_url(); ?>ui/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

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
                            <small></small>
                        </h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Documentos asociados
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                if ($documentos) {
                                    foreach ($documentos->result() as $documento) {

                                        ?>

                                        <!-- image cropping -->
                                        <div class="container cropper">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="img-container">
                                                        <img id="image"
                                                             src="<?php echo base_url() . 'uploads/images/' . $documento->src; ?>"
                                                             alt="Picture">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="docs-preview clearfix">
                                                        <div class="img-preview preview-lg"></div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9 docs-buttons">
                                                    <!-- <h3 class="page-header">Toolbar:</h3> -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="setDragMode" data-option="move"
                                                                title="Move">
                          <span class="docs-tooltip" data-toggle="tooltip"
                                title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                            <span class="fa fa-arrows"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="setDragMode" data-option="crop"
                                                                title="Crop">
                          <span class="docs-tooltip" data-toggle="tooltip"
                                title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
                            <span class="fa fa-crop"></span>
                          </span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary" data-method="zoom"
                                                                data-option="0.1" title="Zoom In">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
                            <span class="fa fa-search-plus"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-method="zoom"
                                                                data-option="-0.1" title="Zoom Out">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
                            <span class="fa fa-search-minus"></span>
                          </span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary" data-method="move"
                                                                data-option="-10" data-second-option="0"
                                                                title="Move Left">
                          <span class="docs-tooltip" data-toggle="tooltip"
                                title="$().cropper(&quot;move&quot;, -10, 0)">
                            <span class="fa fa-arrow-left"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-method="move"
                                                                data-option="10" data-second-option="0"
                                                                title="Move Right">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 10, 0)">
                            <span class="fa fa-arrow-right"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-method="move"
                                                                data-option="0" data-second-option="-10"
                                                                title="Move Up">
                          <span class="docs-tooltip" data-toggle="tooltip"
                                title="$().cropper(&quot;move&quot;, 0, -10)">
                            <span class="fa fa-arrow-up"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-method="move"
                                                                data-option="0" data-second-option="10"
                                                                title="Move Down">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, 10)">
                            <span class="fa fa-arrow-down"></span>
                          </span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="rotate" data-option="-45"
                                                                title="Rotate Left">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
                            <span class="fa fa-rotate-left"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="rotate" data-option="45"
                                                                title="Rotate Right">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
                            <span class="fa fa-rotate-right"></span>
                          </span>
                                                        </button>
                                                    </div>

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="scaleX" data-option="-1"
                                                                title="Flip Horizontal">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleX&quot;, -1)">
                            <span class="fa fa-arrows-h"></span>
                          </span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                                data-method="scaleY" data-option="-1"
                                                                title="Flip Vertical">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleY&quot;, -1)">
                            <span class="fa fa-arrows-v"></span>
                          </span>
                                                        </button>
                                                    </div>


                                                    <!-- Show the cropped image in modal -->
                                                    <div class="modal fade docs-cropped" id="getCroppedCanvasModal"
                                                         aria-hidden="true" aria-labelledby="getCroppedCanvasTitle"
                                                         role="dialog" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-hidden="true">
                                                                        &times;
                                                                    </button>
                                                                    <h4 class="modal-title" id="getCroppedCanvasTitle">
                                                                        Cropped</h4>
                                                                </div>
                                                                <div class="modal-body"></div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close
                                                                    </button>
                                                                    <a class="btn btn-primary" id="download"
                                                                       href="javascript:void(0);"
                                                                       download="cropped.png">Download</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal -->


                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-method="zoomTo"
                                                            data-option="1">
                        <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
                          100%
                        </span>
                                                    </button>
                                                </div><!-- /.docs-buttons -->

                                                <div class="col-md-3 docs-toggles">
                                                    <!-- <h3 class="page-header">Toggles:</h3> -->
                                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input type="radio" class="sr-only" id="aspectRatio0"
                                                                   name="aspectRatio" value="1.7777777777777777">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="aspectRatio: 16 / 9">
                            16:9
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio1"
                                                                   name="aspectRatio" value="1.3333333333333333">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="aspectRatio: 4 / 3">
                            4:3
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio2"
                                                                   name="aspectRatio" value="1">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="aspectRatio: 1 / 1">
                            1:1
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio3"
                                                                   name="aspectRatio" value="0.6666666666666666">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="aspectRatio: 2 / 3">
                            2:3
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio4"
                                                                   name="aspectRatio" value="NaN">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="aspectRatio: NaN">
                            Free
                          </span>
                                                        </label>
                                                    </div>

                                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input type="radio" class="sr-only" id="viewMode0"
                                                                   name="viewMode" value="0" checked>
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="View Mode 0">
                            VM0
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="viewMode1"
                                                                   name="viewMode" value="1">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="View Mode 1">
                            VM1
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="viewMode2"
                                                                   name="viewMode" value="2">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="View Mode 2">
                            VM2
                          </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="viewMode3"
                                                                   name="viewMode" value="3">
                                                            <span class="docs-tooltip" data-toggle="tooltip"
                                                                  title="View Mode 3">
                            VM3
                          </span>
                                                        </label>
                                                    </div>



                                                </div><!-- /.docs-toggles -->
                                            </div>
                                        </div>
                                        <!-- /image cropping -->



                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="actionBar">
                <a href="<?php echo base_url().'index.php/documentos/verDocumentos/'.$prospecto->id.'/'.$documento->proceso_id;?>" class="buttonNext btn btn-success">Volver</a>
            </div>
                                    <?php }
                                } else {
                                    echo 'imagen no existente';
                                } ?>

            <?php }}else{}?>
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
                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
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
                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
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

<!-- Cropper -->
<script src="<?php echo base_url(); ?>ui/vendors/cropper/dist/cropper.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>ui/build/js/custom.min.js"></script>

</body>
</html>





