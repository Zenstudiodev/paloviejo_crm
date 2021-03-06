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
$prospecto = $prospecto->row();
$proceso = $proceso->row();
$master_1 = $formulario_1->row();
$master_2 = $formulario_2->row();
//$master_3 = $formulario_master_1->row();

if ($formulario_4) {
    $formulario_4 = $formulario_4->row();
} else {
    $formulario_4->fm_4_deposito_energia = '0';
    $formulario_4->fm_4_seguro = '0';
    $formulario_4->fm_4_cuota_seguro = '0';
    $formulario_4->fm_4_avaluo = '0';
    $formulario_4->fm_4_porcentaje_banrural = '0';

}


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
                <h3>PLAN DE VENTA</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Pagos  pagina 2-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Precio de la casa #<?php echo $master_2->fm_2_casa_no; ?>
                            de <?php echo $master_2->fm_2_proyecto ?> de
                            Q.<?php echo $master_2->fm_2_precio_total; ?></h2>

                        <div class="clearfix"></div>
                    </div>

                    <?php

                    $descuento_promocion = array(
                        'name' => 'descuento_promocion',
                        'id' => 'descuento_promocion',
                        'placeholder' => 'Descuento promoción',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required'
                    );
                    $deposito_energia = array(
                        'name' => 'deposito_energia',
                        'id' => 'deposito_energia',
                        'placeholder' => 'Depósito energia eléctrica',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'value' => $formulario_4->fm_4_deposito_energia,
                        'required' => 'required'
                    );
                    $seguro_incendio_terremoto = array(
                        'name' => 'seguro_incendio_terremoto',
                        'id' => 'seguro_incendio_terremoto',
                        'placeholder' => 'Seguro contra incendio y terremoto por',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'value' => $formulario_4->fm_4_seguro,
                        'required' => 'required'
                    );
                    $cuota_seguro = array(
                        'name' => 'cuota_seguro',
                        'id' => 'cuota_seguro',
                        'placeholder' => 'Cuota mensual de seguro',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'value' => $formulario_4->fm_4_cuota_seguro,
                        'required' => 'required'
                    );

                    $avaluo_bancario = array(
                        'name' => 'avaluo_bancario',
                        'id' => 'avaluo_bancario',
                        'placeholder' => 'Avaluo Bancario',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'value' => $formulario_4->fm_4_avaluo,
                        'required' => 'required'
                    );

                    $porcentage_banrural = array(
                        'name' => 'porcentage_banrural',
                        'id' => 'porcentage_banrural',
                        'placeholder' => 'Porcentage banrural',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'value' => $formulario_4->fm_4_porcentaje_banrural,
                        'required' => 'required'
                    );
                    ?>
                    <div class="x_content">
                        <!--<pre>
                        <?php
                        /*                        print_r($master_1);
                                                print_r($master_2);
                                                */ ?>
                        </pre>-->
                        <?php if ($formulario_4) { ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>Formulario/actualizar_master_4" method="post">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>Formulario/guardar_master_4" method="post">
                                <?php } ?>
                                <div class="x_title">
                                    <h2>Si incluye</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                                if ($formulario_4_incluye) {
                                    //print_contenido($formulario_4_incluye->result());
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            $extra_number = 1;
                                            foreach ($formulario_4_incluye->result() as $incluye) { ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                     id="incluye_container_<?php echo $extra_number; ?>">
                                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox"
                                                       id="incluye_checkbox_<?php echo $extra_number; ?>"
                                                       class="incluye_checkbox">
                                            </span>
                                                        <input type="text" class="form-control"
                                                               name="incluye_input_<?php echo $extra_number; ?>"
                                                               id="incluye_input_<?php echo $extra_number; ?>"
                                                               value="<?php echo $incluye->fm_4_inlcuye_valor; ?>">
                                                    </div><!-- /input-group -->
                                                </div>

                                                <?php $extra_number = $extra_number + 1; //print_contenido($extra); ?>

                                            <?php } ?>


                                            <div id="extras_row">
                                            </div>


                                        </div>
                                    </div>
                                <?php } else { ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_1">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_1" class="incluye_checkbox">
                                            </span>
                                                <input type="text" class="form-control" name="incluye_input_1"
                                                       id="incluye_input_1"
                                                       value="Gabinetes de cocina tipo advantage, con lavatrastos incluido.">
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_2">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_2" id="incluye_input_2"
                                                       value="Puertas y divisiones de closets, en los dormitorios."
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container "
                                             id="incluye_container_3">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_3" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_3" id="incluye_input_3"
                                                       value="Zócalo (no incluye en áreas de closets, atrás de los gabinetes de cocina, baños, áreas de servicio, ni exteriores)."
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_4" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_4" id="incluye_input_4"
                                                       value="Media paja de agua y conexión." class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_5">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_5" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_5" id="incluye_input_5"
                                                       value="Promoción de techar la lavandería con losa: Sin Costo."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_6" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_6" id="incluye_input_6"
                                                       value="Promoción de ampliar 1 Mts. el dormitorio que da al frente de la casa sobre la lavandería: Sin Costo."
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_7">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_7" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_7" id="incluye_input_7"
                                                       value="Hacer car-port completo, dos dormitorios en la planta alta, uno con baño estándar (el precio incluye el descuento por promociones no tomadas: (balcón en la salida del dormitorio y balcón al subir las gradas): Q. 265,500.-."
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_8">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_8" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_8" id="incluye_input_8"
                                                       value="Terreno extra de 46.88 Mts. por un valor de Q. 82,000.00 menos descuento autorizado por gerencia: Q. 47,500.-."
                                                       class="form-control "
                                                       required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_9">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_9" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_9" id="incluye_input_9"
                                                       value="Ampliación de la casa 3.82 Mts. para toparla al límite del terreno por ser un poco más ancho de lo normal: Q. 13,500.-."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>

                                        <div id="extras_row">
                                        </div>


                                    </div>
                                </div>
                    </div>

                    <?php } ?>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-success" id="add_extra">Añadir</button>
                                <button type="button" class="btn btn-danger" id="delete_extra">Borrar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="x_title">
                        <h2>No incluye</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <?php if ($formulario_4) { ?>
                        <input type="hidden" name="inlcuye_id" value="<?php echo $formulario_4->fm_4_id; ?>">
                        <?php }?>


                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Depósito y conexión de energía eléctrica
                                    (+-)</label>
                                <?php echo form_input($deposito_energia); ?>
                                <span class="fa fa-bolt form-control-feedback left"
                                      aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Seguro contra incendio y terremoto por</label>
                                <?php echo form_input($seguro_incendio_terremoto); ?>
                                <span class="fa fa-home form-control-feedback left"
                                      aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Cuota mensual de seguro</label>
                                <?php echo form_input($cuota_seguro); ?>
                                <span class="fa fa-home form-control-feedback left"
                                      aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Avaluo Bancario</label>
                                <?php echo form_input($avaluo_bancario); ?>
                                <span class="fa fa-home form-control-feedback left"
                                      aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Porcentage banrural</label>
                                <?php echo form_input($porcentage_banrural); ?>
                                <span class="fa fa-home form-control-feedback left"
                                      aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="extra_fields" id="extra_fields">
                        <input type="hidden" name="prospecto" value="<?php echo $prospecto->id; ?>">
                        <input type="hidden" name="proceso" value="<?php echo $proceso->id; ?>">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Guardar</button>
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
    var extra_count;
    var recounter;
    $(document).ready(function () {
        //init_validator();
        <?php if
        ($formulario_4_incluye) {
        $extra_number = 0;
        foreach ($formulario_4_incluye->result() as $extra) {

                $extra_number = $extra_number + 1;

        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 9;
        <?php } ?>



        $("#extra_fields").val(extra_count);
    });

    $("#add_extra").click(function () {
        console.log('antes de añadir ' + extra_count);
        extra_count += 1;

        var extra_field = '';

        extra_field += '<div class="col-md-12 col-sm-12 col-xs-12 incluye_container" id="incluye_container_' + extra_count + '">';
        extra_field += '<div class="input-group">';
        extra_field += '<span class="input-group-addon">';
        extra_field += '<input type="checkbox" id="incluye_checkbox_' + extra_count + '" class="incluye_checkbox">';
        extra_field += '</span>';
        extra_field += '<input type="text" name="incluye_input_' + extra_count + '" id="incluye_input_' + extra_count + '" value="" class="form-control " >';
        extra_field += '</div>';
        extra_field += '</div>';


        $("#extras_row").append(extra_field);

        console.log('luego de añadir ' + extra_count);
        $("#extra_fields").val(extra_count);
        console.log('valor de extras' + $("#extra_fields").val());

    });
    $("#delete_extra").click(function () {


        $('.incluye_checkbox:checked').each(
            function () {
                recounter = 0;

                console.log("El checkbox con valor " + $(this).val() + " está seleccionado");
                $(this).closest(".incluye_container").remove();


                $('.incluye_container').each(function () {
                    // console.log(recounter);
                    recounter += 1;
                    //console.log(recounter);
                    extra_count = recounter;
                    $("#extra_fields").val(extra_count);
                    //modificar
                    $(this).attr('id', 'incluye_container_' + recounter);
                    //checkbox
                    $(this).find(".incluye_checkbox").attr('id', 'incluye_checbox_' + recounter);
                    //input
                    $(this).find(".form-control").attr('id', 'incluye_input_' + recounter);
                    $(this).find(".form-control").attr('name', 'incluye_input_' + recounter);


                });

            }
        );

        stop();
        console.log(extra_count);
        container_d = "#incluye_container_" + extra_count;
        console.log(container_d);
        // $(container_d).remove();
        // extra_count -= 1;
    });


</script>


<?php $this->stop() ?>



