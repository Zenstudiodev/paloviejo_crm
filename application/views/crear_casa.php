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
                <h3>Casas</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Crear casa</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>admin/guardar_casa"
                              method="post" novalidate>
                            <?php
                            $lote = array(
                                'name' => 'lote',
                                'id' => 'lote',
                                'placeholder' => 'Lote',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required'
                            );
                            $descripcion = array(
                                'name' => 'descripcion',
                                'id' => 'descripcion',
                                'placeholder' => 'Descripción',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required'
                            );

                            $proyecto = array(
                                'name' => 'proyecto',
                                'id' => 'proyecto',
                                'class' => 'form-control col-md-7 col-xs-12',
                            );

                            $proyectoOptions = array(
                                    ''=>'',
                            );
                            if ($proyectos) {
                                foreach ($proyectos->result() as $proyecto_i) {
                                    $proyectoOptions[$proyecto_i->proyecto_id] = strtoupper($proyecto_i->nombre_proyecto);
                                }
                            }

                            $tipo_casa = array(
                                'name' => 'tipo_casa',
                                'id' => 'tipo_casa',
                                'class' => 'form-control col-md-7 col-xs-12',
                            );

                            $tipo_casaOptions = array();
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lote <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($lote) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripción <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($descripcion) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proyecto <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_dropdown($proyecto, $proyectoOptions) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo de casa <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_dropdown($tipo_casa, $tipo_casaOptions) ?>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancelar</button>
                                    <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                    <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<script>
    /* VALIDATOR */

    function init_validator() {

        if (typeof (validator) === 'undefined') {
            return;
        }
        console.log('init_validator');

        // initialize the validator function
        validator.message.date = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required').on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;

            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();

            return false;
        });

    };
    $(document).ready(function () {
        init_validator();
    });

    //Actualizar tipos de casas
    $("#proyecto").change(function (e) {
        //console.log('cambio de tipo');
        $("#loading_marca_filter").show();
        $('#tipo_casa option').remove();
        filtro_tipo = $("#proyecto").val();
        // console.log(filtro_tipo);
        var options;
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '<?php echo base_url()?>admin/get_tipos_casa/' + filtro_tipo,
            success: function (data) {
                $('#tipo_casa option').remove();
                $('#tipo_casa').append('<option value="TODOS">TODOS</option>');
                console.log(data);
                $.each(data, function (key, value) {
                    options += '<option value="' + value.tipo_casa_id + '">' + value.nombre_casa + '</option>';
                });
                $('#tipo_casa').append(options);
                $("#loading_marca_filter").hide();
                $("#linea_carro").val('TODOS');
                $('select').material_select();
            }
        });
    });

</script>


<?php $this->stop() ?>



