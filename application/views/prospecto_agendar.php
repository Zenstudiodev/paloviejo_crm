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
<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Agendar </h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <?php
                foreach ($prospectos->result() as $prospecto) {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Crear evento para: <?php echo $prospecto->nombre1 ?></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <?php
                                if (isset($error)){ ?>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                   <?php echo $error; ?>
                                </div>
                                <?php }
                                ?>

                                <div class="x_content">

                                    <form class="form-horizontal form-label-left"
                                          action="http://www.paloviejosa.com/crm/index.php/citas/guardarCita"
                                          method="post">

                                        <?php
                                        $fecha = array(
                                            'name' => 'fecha',
                                            'id' =>'reservation-time',
                                            'placeholder' => 'Fecha',
                                            'type' => 'text',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required'

                                        );
                                        $observaciones = array(
                                            'name' => 'observaciones',
                                            'placeholder' => 'Observaciones',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required'

                                        );
                                        $tipoCita = array(
                                            'name' => 'tipo_cita',
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'required' => 'required'

                                        );
                                        $tipoCitaOptions = array(
                                            'Cierre' => 'Cierre',
                                            'Reunión' => 'Reunión',
                                            'firma_contrato' => 'Firma de contrato'
                                        );

                                        ?>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Fecha<span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                                                <?= form_input($fecha) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <!--input id="name" class="form-control col-md-7 col-xs-12"
                                                       data-validate-length-range="6" data-validate-words="2" name="name"
                                                       placeholder="nombre" required="required" type="text">-->
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?= form_textarea($observaciones) ?>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tarea <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_dropdown($tipoCita, $tipoCitaOptions) ?>
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <?php
                                            echo form_hidden('prospecto_id', $prospecto->id) ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a class="btn btn-danger" href="<?php echo base_url().'index.php/prospectos/prospectoDetalle/'.$prospecto->id;  ?>">Cancelar</a>
                                                <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>ui/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<script>

    /* DATERANGEPICKER */

    function init_daterangepicker_reservation() {

        if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
        console.log('init_daterangepicker_reservation');

        $('#reservation').daterangepicker(null, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        var start = moment();

        $('#reservation-time').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            autoApply: true,
            showDropdowns:true,
            timePickerIncrement: 60,
            locale: {
                format: 'DD-MM-YYYY h:mm A',
                separator: " - ",
                applyLabel: "Aceptar",
                cancelLabel: "Cacelar",
                fromLabel: "De",
                toLabel: "A",
                customRangeLabel: "Personalizado",
                weekLabel: "S",
                daysOfWeek: [
                    "Dom",
                    "Lun",
                    "Ma",
                    "Mi",
                    "Jue",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },
            startDate: start
        });

    }


    $(document).ready(function() {
        init_daterangepicker_reservation();
    });
</script>
<?php $this->stop() ?>





