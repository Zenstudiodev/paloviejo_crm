<?php
/**
 * Created by PhpStorm.
 * User: Latios-ws
 * Date: 15/12/2020
 * Time: 10:24
 */
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



$parametros = $parametros->result();



echo'<hr>';
$representante_legal = $parametros[0]->parametro_valor;
$fecha_nacimiento_representante = $parametros[1]->parametro_valor;
$estado_civil_representante = $parametros[2]->parametro_valor;
$nacionalidad_representante = $parametros[3]->parametro_valor;
$dpi_representante = $parametros[4]->parametro_valor;
$profesion = $parametros[5]->parametro_valor;
$dpi_emitido_representante = $parametros[6]->parametro_valor;
$nombre_notaria_val = $parametros[7]->parametro_valor;
$fecha_notaria_val = $parametros[8]->parametro_valor;
$registro_acta_val = $parametros[9]->parametro_valor;
$folio_acta_val = $parametros[10]->parametro_valor;
$libro_acta_val = $parametros[11]->parametro_valor;
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
                <h3>Parametros</h3>
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
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>admin/actualizar_parametros"
                              method="post" novalidate>
                            <?php
                            print_contenido($parametros);


                            $gerente = array(
                                'name' => 'gerente',
                                'id' => 'gerente',
                                'placeholder' => 'Gerente general y representante legal',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$representante_legal
                            );

                            $fecha_nacimiento_gerente = array(
                                'name' => 'fecha_nacimiento_gerente',
                                'id' => 'fecha_nacimiento_gerente',
                                'placeholder' => 'fecha de nacimiento representante legal',
                                'type' => 'date',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$fecha_nacimiento_representante
                            );
                            $estado_civil_gerente = array(
                                'name' => 'estado_civil_gerente',
                                'id' => 'estado_civil_gerente',
                                'placeholder' => 'Estado civil',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$estado_civil_representante

                            );
                            $nacionalidad_gerente = array(
                                'name' => 'nacionalidad_gerente',
                                'id' => 'nacionalidad_gerente',
                                'placeholder' => 'Nacionalidad',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$nacionalidad_representante
                            );
                            $dpi_gerente = array(
                                'name' => 'dpi_gerente',
                                'id' => 'dpi_gerente',
                                'placeholder' => 'DPI',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$dpi_representante
                            );
                            $dpi_emitido = array(
                                'name' => 'dpi_amitido',
                                'id' => 'dpi_amitido',
                                'placeholder' => 'DPI emitido',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$dpi_emitido_representante
                            );
                            $profesion_representante = array(
                                'name' => 'profesion_representante',
                                'id' => 'profesion_representante',
                                'placeholder' => 'Profesion',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$profesion
                            );
                            $nombre_notaria = array(
                                'name' => 'nombre_notaria',
                                'id' => 'nombre_notaria',
                                'placeholder' => 'Nombre Notaria',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$nombre_notaria_val
                            );
                            $fecha_acta_notarial = array(
                                'name' => 'fecha_acta_notarial',
                                'id' => 'fecha_acta_notarial',
                                'placeholder' => 'Fecha',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$fecha_notaria_val
                            );
                            $registro_acta_notarial = array(
                                'name' => 'registro_acta_notarial',
                                'id' => 'registro_acta_notarial',
                                'placeholder' => 'Registro acta',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$registro_acta_val
                            );
                            $folio_acta_notarial = array(
                                'name' => 'folio_acta_notarial',
                                'id' => 'folio_acta_notarial',
                                'placeholder' => 'Folio acta',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$folio_acta_val
                            );
                            $libro_acta_notarial = array(
                                'name' => 'libro_acta_notarial',
                                'id' => 'libro_acta_notarial',
                                'placeholder' => 'Libro acta',
                                'type' => 'text',
                                'class' => 'form-control col-md-7 col-xs-12',
                                'required' => 'required',
                                'value'=>$libro_acta_val
                            );
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gerente general y representante legal<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($gerente) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">fecha de nacimiento representante legal <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($fecha_nacimiento_gerente) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Estado civil representante legal<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($estado_civil_gerente) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nacionalidad representante legal: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($nacionalidad_gerente) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">DPI representante legal: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($dpi_gerente) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Profeción representante legal: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($profesion_representante) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">DPI representante legal amitido: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($dpi_emitido) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre notaria: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($nombre_notaria) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha acta notarial: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($fecha_acta_notarial) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Registro acta notarial: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($registro_acta_notarial) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Folio acta notarial: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($folio_acta_notarial) ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Libro acta notarial: <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo form_input($libro_acta_notarial) ?>
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
