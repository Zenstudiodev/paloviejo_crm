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
    'notificaciones_s' =>$notificaciones_supervisor,
    'alertas' => $alertas,
    'alertas_s' => $alertas_supervisor

]);
?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- FullCalendar -->
<link href="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet"
      media="print">
<link href="<?php echo base_url(); ?>ui/vendors/EasyAutocomplete/easy-autocomplete.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/EasyAutocomplete/easy-autocomplete.themes.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>

<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Reuniones
                    <small></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id='calendar'></div>
                        <div id="token"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('off_body') ?>
<?php
$fecha = array(
    'name' => 'fecha',
    'id' =>'fecha',
    'placeholder' => 'Fecha',
    'type' => 'text',
    'class' => 'form-control col-md-7 col-xs-12',
    'required' => 'required'

);
?>
<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Agendar cita</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fecha</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fecha_agendar" name="fecha_agendar">
                            </div>
                        </div>
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
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Prospectos</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="prospecto_agendar" name="prospecto_agendar">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Observaciones</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="observacion_agendar"
                                          name="observacion_agendar"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary antosubmit">Guardar cita</button>
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
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">cancelar</button>
                <button type="button" class="btn btn-primary antosubmit2">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>ui/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/fullcalendar/dist/locale-all.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
    /* DATERANGEPICKER */

    function init_daterangepicker_reservation() {

        if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
        console.log('init_daterangepicker_reservation');

        $('#fecha').daterangepicker(null, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        var start = moment();

        $('#fecha').daterangepicker({
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



    // auto compete
    var options = {
        data: [
            <?php if ($prospectos){
            foreach ($prospectos->result() as $prospecto) { ?>
            <?php echo '"' . $prospecto->nombre1 . '",'; ?>
            <?php }}else{?>
            ''
            <?php }?>
        ]
    };

    $("#prospecto_agendar").easyAutocomplete(options);

    /* CALENDAR */

    function init_calendar() {

        if (typeof ($.fn.fullCalendar) === 'undefined') {
            return;
        }
        console.log('init_calendar');

        var date = new Date(),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear(),
            started,
            categoryClass;

        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            locale: 'es',
            selectable: true,
            selectHelper: true,
            dayClick: function(date, jsEvent, view) {
                $('#fc_create').click();
                $('#fecha_agendar').val(date.format());

                console.log('Clicked on: ' + date.format());

                console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                console.log('Current view: ' + view.name);


            },
            editable: false,
            <?php


            if($citas){ ?>
            events: [
                <?php    foreach ($citas->result() as $cita) {
                    //colores de citas
                    $color_cita = '#3a87ad';
                    $color_texto_cita = '#fff';
                    //cita
                if($cita->tipo_cita =='Cierre'){
                    //amarillo
                    $color_cita = '#f8ff45';
                    $color_texto_cita = '#000';
                }
                if($cita->tipo_cita =='firma'){
                    $color_cita = '#FF8C05';
                }
                    //cierre
                    //firma

                    ?>
                {
                    title: '<?php echo rtrim($cita->observaciones); ?>',
                    start: '<?php echo $cita->fecha; ?>',
                    backgroundColor : '<?php echo $color_cita; ?>',
                    textColor  : '<?php echo $color_texto_cita; ?>',
                    url: '<?php echo base_url()?>prospectos/prospectoDetalle/<?php echo $cita->prospecto_id?> '
                },
                <?php } ?>
            ]
            <?php }?>



        });

    };
    $(document).ready(function () {
        init_calendar();
    });

</script>

<?php $this->stop() ?>



