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
$formulario_1 = $formulario_1->row();
$formulario_2 = $formulario_2->row();
//$formulario_3 = $formulario_3->row();
$fecha = New DateTime();


//campos fijos

$enganche = array(
    'name' => 'enganche',
    'id' => 'enganche',
    'placeholder' => 'Enganche ',
    'type' => 'text',
    'value' => $formulario_2->fm_2_enganche,
    'class' => 'form-control money',
    'required' => 'required',
);
$saldo_a_financiar = array(
    'name' => 'saldo_a_financiar',
    'id' => 'saldo_a_financiar',
    'placeholder' => 'Saldo a financiar ',
    'type' => 'text',
    'value' => $formulario_2->fm_2_saldo_fiannciar,
    'class' => 'form-control money',
    'required' => 'required',
);
$precio_correcto = array(
    'name' => 'precio_correcto',
    'id' => 'precio_correcto',
    'placeholder' => 'Precio total',
    'type' => 'text',
    'value' => $formulario_2->fm_2_precio_total,
    'class' => 'form-control money',
    'required' => 'required',

);

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
                <h3>PLAN DE VENTA </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Pagos  pagina 2-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detalles de la propiedad</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php //print_contenido($formulario_2) ?>
                        <p>Plan de venta <br>
                            casa No. <?php echo $formulario_2->fm_2_casa_no; ?><br>
                            <?php echo $formulario_2->fm_2_proyecto; ?>
                        </p>
                        <div class="row">
                            <div class="col-md-6">Cliente</div>
                            <div class="col-md-6"><?php echo $formulario_1->fm_1_nombre; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">Fecha</div>
                            <div class="col-md-6"><?php echo $formulario_2->fm_2_fecha; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">Precio con otros gastos y extras incluidos</div>
                            <div class="col-md-6"><?php echo $formulario_2->fm_2_precio_total; ?></div>
                        </div>


                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>formulario/guardar_master_3"
                              method="post">
                            <!-- <pre>
                                <?php /*print_r($formulario_1); */ ?>
                            </pre>
                            <pre>
                                <?php /*print_r($formulario_2); */ ?>
                            </pre>-->

                            <div class="x_title">
                                <h2>Forma de pago del precio total incluye O.G y E.</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="hidden" name="extra_fields" id="extra_fields">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="pago" id="pago_1" name="pago_1" required>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="date" class="form-control"
                                                   placeholder="Fecha" id="fecha_pago_1" name="fecha_pago_1" required>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control money cuota"
                                                   placeholder="monto" id="monto_pago_1" name="monto_pago_1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    Acciones
                                </div>

                            </div>

                            <div id="extras_row">

                            </div>
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="hidden" name="extra_fields" id="extra_fields">
                                    <div class="form-group">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="pago" id="pago_credito_bancario"
                                                   name="pago_credito_bancario" required>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="date" class="form-control"
                                                   placeholder="Fecha" id="fecha_pago_credito_bancario"
                                                   name="fecha_pago_credito_bancario" required>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control money"
                                                   placeholder="monto" id="monto_pago_credito_bancario"
                                                   name="monto_pago_credito_bancario1"
                                                   value="<?php echo $formulario_2->fm_2_saldo_fiannciar; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="button" class="btn btn-success" id="add_extra">Añadir</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        Precio Total incluye O.G y E
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control money"
                                               placeholder="monto" id="precio_total" name="precio_total"
                                               total>
                                    </div>

                                </div>
                            </div>

                            <div class="x_title">
                                <h2>Forma de pago</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Enganche:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <?php echo form_input($enganche); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Saldo a
                                        financiar:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <?php echo form_input($saldo_a_financiar); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                        total:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <?php echo form_input($precio_correcto) ?>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <input type="hidden" name="prospecto" value="<?php echo $prospecto->id; ?>">
                                <input type="hidden" name="proceso" value="<?php echo $proceso->id; ?>">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" id="btn_guardar">Guardar</button>
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
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-Mask/jquery.mask.min.js"></script>
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
    $(document).ready(function () {
        //init_validator();
        //mask dinero
        $('.money').mask('000,000,000,000,000.00', {reverse: true});
        extra_count = 1;
        $("#extra_fields").val(extra_count);
    });
    $("#add_extra").click(function () {
        console.log('antes de añadir ' + extra_count);
        extra_count += 1;

        var extra_field = '';

        extra_field += '<div class="row" id="pago_container_' + extra_count + '">';
        extra_field += '<div class="col-md-11">';
        extra_field += '<div class="form-group" >';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="text" class="form-control" placeholder="Pago" id="pago_' + extra_count + '" name="pago_' + extra_count + '" required>';
        extra_field += '</div>';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="date" class="form-control" placeholder="Fecha" value="" id="fecha_pago_' + extra_count + '" name="fecha_pago_' + extra_count + '" required>';
        extra_field += '</div>';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="text" class="form-control money cuota" placeholder="Monto" value="" id="monto_pago_' + extra_count + '" name="monto_pago_' + extra_count + '" required>';
        extra_field += '</div>';
        extra_field += '</div>';
        extra_field += '</div>';
        extra_field += '<div class="col-md-1">';
        extra_field += '<button type="button" class="btn btn-danger delete_btn" pago_id="' + extra_count + '" id="btn_del_' + extra_count + '"><i class="fa fa-minus-circle"></i></button>';
        extra_field += '</div>';
        extra_field += '</div>';

        $("#extras_row").append(extra_field);

        $("#extra_fields").val(extra_count);
        console.log('luego de añadir ' + extra_count);

        $(".cuota").change(function () {
            sumar_cuotas();
            $('#precio_total').mask('000,000,000,000,000.00', {reverse: true});
        });
    });

    function sumar_cuotas() {
        total_cuotas = 0;
        desembolso_banco = 0;
        precio_total = 0;
        precio_total_correcto =0;

        $("#btn_guardar").hide();

        cuotas = $(".cuota").length;
        console.log(cuotas);
        $(".cuota").each(function () {
            cuouta_val = parseInt($(this).cleanVal());
            total_cuotas = total_cuotas + cuouta_val;
            console.log($(this).val());
        });
        console.log(cuotas);
        console.log(total_cuotas);
        desembolso_banco = parseInt($("#monto_pago_credito_bancario").cleanVal());
        precio_total = parseInt(desembolso_banco + total_cuotas);
        precio_total_correcto = parseInt($("#precio_correcto").cleanVal());

        console.log($("#precio_correcto").val());
        $('#precio_total').unmask();
        $("#precio_total").val(precio_total);
        console.log(precio_total);
        console.log(precio_total_correcto);
        if(precio_total == precio_total_correcto){
            $("#btn_guardar").show();
        }
    }


    $('#extras_row').on('click', '.delete_btn', function () {
        var pago_id = $(this).attr('pago_id');
        var pago_container = '#pago_container_' + pago_id;
        //alert(pago_id);
        $(pago_container).css('background', 'red');
        $(pago_container).remove();
        extra_count -= 1;
        sumar_cuotas();
        $('#precio_total').mask('000,000,000,000,000.00', {reverse: true});

    });
    $(".cuota").change(function () {
        sumar_cuotas();
        $('#precio_total').mask('000,000,000,000,000.00', {reverse: true});
    });
</script>


<?php $this->stop() ?>



