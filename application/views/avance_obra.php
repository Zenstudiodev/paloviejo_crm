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
//setlocale(LC_ALL, 'es_ES.UTF-8');
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Ion.RangeSlider -->
<link href="/crm/ui/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="/crm/ui/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="/crm/ui/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">

    <?php

    $documento = array(
        'name' => 'documento',
        'type' => 'file',
        'accept' => 'image/*,application/pdf',
        'required' => 'required'
    );

    $tipoDocumento = array(
        'name' => 'tipo_documento',
        'class' => 'form-control col-md-7 col-xs-12',
        'required' => 'required'

    );
    $tipoDocumentoOptions = array(
        'plano' => 'Plano',
        'cotizacion' => 'Cotización'
    );

    $tipoActor = array(
        'name' => 'tipo_actor',
        'class' => 'form-control col-md-7 col-xs-12',
        'required' => 'required'

    );
    $tipoactorOptions = array(
        'Promitente comprador' => 'Promitente comprador',
        'Sucesor' => 'Sucesor',
        'Propietario' => 'Propietario',
        'Mandatario' => 'Mandatario',
        'Gestor de negocios' => 'Gestor de negocios',

    );


    ?>


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Avance de obra</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php if ($prospectos) {
                        foreach ($prospectos->result() as $prospecto) { ?>

                        <?php if ($procesos) {
                        foreach ($procesos->result() as $proceso) { ?>
                        <?php echo form_open_multipart('documentos/guardarPlano', 'class="form-horizontal form-label-left"'); ?>

                        <div class="x_panel" style="">
                            <div class="x_title">
                                <h2>Grid Slider</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row grid_slider">

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Default grid slider with min and max values</p>
                                        <input type="text" id="range" value="" name="range" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Grid with slider labels are far away outside it's container</p>
                                        <input type="text" id="range_25" value="" name="range" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Grid with labels inside container using force_edges attribute</p>
                                        <input type="text" id="range_27" value="" name="range" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Create Grid with pre-defined steps</p>
                                        <input type="text" id="range_26" value="" name="range" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Prevent one from dragging the labels</p>
                                        <input type="text" id="range_31" value="" name="range" />
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>Grid with minimum and maximum values</p>
                                        <input type="text" class="range_min_max" value="" name="range" />
                                    </div>
                                    <div>
                                        <p>Grid With time in 24 hour format</p>
                                        <input type="text" class="range_time24" value="" name="range" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto->id ?>"
                                   class="btn btn-danger">Cancelar</a>
                                <!--<a class="btn btn-success"
                                   href="http://www.paloviejosa.com/crm/index.php/documentos/verDocumentos/1">Guardar</a>-->
                                <input type="submit" class="btn btn-success" name="guardarDocumento" value="Guardar">

                            </div>
                        </div>
                    </div>
                    </form>

                    <?php
                    }
                    }
                    ?>


                    <?php
                    }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<!-- Ion.RangeSlider -->
<script src="/crm/ui/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>

<script>
    /* ION RANGE SLIDER */

    function init_IonRangeSlider() {

        if( typeof ($.fn.ionRangeSlider) === 'undefined'){ return; }
        console.log('init_IonRangeSlider');

        $("#range_27").ionRangeSlider({
            type: "double",
            min: 1000000,
            max: 2000000,
            grid: true,
            force_edges: true
        });
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        });
        $("#range_25").ionRangeSlider({
            type: "double",
            min: 1000000,
            max: 2000000,
            grid: true
        });
        $("#range_26").ionRangeSlider({
            type: "double",
            min: 0,
            max: 10000,
            step: 500,
            grid: true,
            grid_snap: true
        });
        $("#range_31").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 30,
            to: 70,
            from_fixed: true
        });
        $(".range_min_max").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 30,
            to: 70,
            max_interval: 50
        });
        $(".range_time24").ionRangeSlider({
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().format("X"),
            from: +moment().subtract(6, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function(num) {
                var m = moment(num, "X");
                return m.format("Do MMMM, HH:mm");
            }
        });

    };

    $(document).ready(function () {
        init_sidebar();
        init_IonRangeSlider();
    });
</script>

<?php $this->stop() ?>





