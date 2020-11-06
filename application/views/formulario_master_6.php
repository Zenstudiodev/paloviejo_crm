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
$master_1 = $formulario_master_1->row();
$master_2 = $formulario_master_2->row();


if ($formulario_master_6) {
    $formulario_master_6 = $formulario_master_6->row();

    $finca_val = $formulario_master_6->fm_6_finca;
    $folio_val = $formulario_master_6->fm_6_folio;
    $libro_val = $formulario_master_6->fm_6_libro;
    $area_val = $formulario_master_6->fm_6_area;
    $frente_val = $formulario_master_6->fm_6_frente;
    $fondo_val = $formulario_master_6->fm_6_fondo;
    $forma_val = $formulario_master_6->fm_6_forma;
    $metros_construccion_val = $formulario_master_6->fm_6_metros_construccion;
    $dias_de_entrega_val = $formulario_master_6->fm_6_dias_de_entrega;
    $arras_val = $formulario_master_6->fm_6_arras;
} else {

    $finca_val = 0;
    $folio_val = 0;
    $libro_val = 0;
    $area_val = 0;
    $frente_val = 0;
    $fondo_val = 0;
    $forma_val = 0;
    $metros_construccion_val = 0;
    $dias_de_entrega_val = 0;
    $arras_val = 0;

    /*$formulario_master_6->fm_6_finca = '0';
    $formulario_master_6->fm_6_folio = '0';
    $formulario_master_6->fm_6_libro = '0';
    $formulario_master_6->fm_6_area = '0';
    $formulario_master_6->fm_6_frente = '0';
    $formulario_master_6->fm_6_fondo = '0';
    $formulario_master_6->fm_6_forma = '0';*/
}


?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.css" rel="stylesheet">
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
                    $finca = array(
                        'name' => 'finca',
                        'id' => 'finca',
                        'placeholder' => 'Finca',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left',
                        'required' => 'required',
                        'value' => $finca_val
                    );
                    $folio = array(
                        'name' => 'folio',
                        'id' => 'folio',
                        'placeholder' => 'Folio',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $folio_val
                    );
                    $libro = array(
                        'name' => 'libro',
                        'id' => 'libro',
                        'placeholder' => 'Libro',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $libro_val
                    );
                    $area = array(
                        'name' => 'area',
                        'id' => 'area',
                        'placeholder' => 'Area',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $area_val
                    );
                    $frente = array(
                        'name' => 'frente',
                        'id' => 'frente',
                        'placeholder' => 'Frente',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $frente_val
                    );
                    $fondo = array(
                        'name' => 'fondo',
                        'id' => 'fondo',
                        'placeholder' => 'Fondo',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $fondo_val
                    );
                    $forma = array(
                        'name' => 'forma',
                        'id' => 'forma',
                        'placeholder' => 'Forma',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $forma_val
                    );

                    $metros_construccion = array(
                        'name' => 'metros_construccion',
                        'id' => 'metros_construccion',
                        'placeholder' => 'Metros Construcción',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $metros_construccion_val
                    );
                    $dias_de_entrega = array(
                        'name' => 'dias_de_entrega',
                        'id' => 'dias_de_entrega',
                        'placeholder' => 'Días de entrega',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $dias_de_entrega_val
                    );
                    $arras = array(
                        'name' => 'arras',
                        'id' => 'arras',
                        'placeholder' => 'Arras',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required',
                        'value' => $arras_val
                    );
                    ?>
                    <div class="x_content">
                        <!-- <pre>
                        <?php
                        /*                        print_r($master_1);
                                                print_r($master_2);
                                                */ ?>
                        </pre>-->


                        <?php if ($formulario_master_6_og) { ?>
                            <form class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Formulario/actualizar_master_6" method="post">
                        <?php }else{ ?>
                            <form class="form-horizontal form-label-left" action="<?php echo base_url(); ?>Formulario/guardar_master_6" method="post">
                        <?php } ?>
                                <div class="x_title">
                                    <h2>Registro</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <?php if ($formulario_master_6) { ?>
                                    <input type="hidden" name="fm_6_id" value="<?php echo $formulario_master_6->fm_6_id; ?>">
                                <?php }?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label for="finca">Finca</label>
                                            <?php echo form_input($finca); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label for="folio">Folio</label>
                                            <?php echo form_input($folio); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label for="libro">Libro</label>
                                            <?php echo form_input($libro); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="exampleInputEmail1">Área del terreno</label>
                                            <?php echo form_input($area); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="frente">Frente</label>
                                            <?php echo form_input($frente); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="fondo">Fondo</label>
                                            <?php echo form_input($fondo); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="forma">Forma</label>
                                            <?php echo form_input($forma); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="exampleInputEmail1">Metros de construcción</label>
                                            <?php echo form_input($metros_construccion); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="frente">Días de entrega</label>
                                            <?php echo form_input($dias_de_entrega); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label for="fondo">Arras</label>
                                            <?php echo form_input($arras); ?>
                                            <span class="fa fa-home form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>


                    <?php // print_contenido($master_1);?>
                    <?php //print_contenido($master_2);?>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="extra_fields" id="extra_fields">
                            <input type="hidden" name="prospecto" value="<?php echo $prospecto->id; ?>">
                            <input type="hidden" name="proceso" value="<?php echo $proceso->id; ?>">
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
</div>
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
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
        ($formulario_master_6_og) {
        $extra_number = 0;
        foreach ($formulario_master_6_og->result() as $extra) {

            $extra_number = $extra_number + 1;

        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 10;
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
        extra_field += '<textarea type="text" name="incluye_input_' + extra_count + '" id="incluye_input_' + extra_count + '"  class="form-control " > </textarea>';
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



