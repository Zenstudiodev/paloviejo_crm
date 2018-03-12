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
$fecha = New DateTime();


//campos fijos

$enganche = array(
    'name' => 'enganche',
    'id' => 'enganche',
    'placeholder' => 'Enganche ',
    'type' => 'number',
    'class' => 'form-control',
    'step' => 'any',
    'required' => 'required',
    'min' =>'0'
);
$saldo_a_financiar = array(
    'name' => 'saldo_a_financiar',
    'id' => 'saldo_a_financiar',
    'placeholder' => 'Saldo a financiar ',
    'type' => 'number',
    'class' => 'form-control',
    'step' => 'any',
    'required' => 'required',
    'min' =>'0'
);
$precio_total = array(
    'name' => 'precio_total',
    'id' => 'precio_total',
    'placeholder' => 'Precio total',
    'type' => 'number',
    'class' => 'form-control',
    'step' => 'any',
    'required' => 'required',
    'min' =>'0'
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
                <h3>PLAN DE VENTA</h3>
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
                              action="<?php echo base_url(); ?>/index.php/formulario/guardar_master_3"
                              method="post">
                            <pre>
                                <?php print_r($formulario_1); ?>
                            </pre>
                            <pre>
                                <?php print_r($formulario_2); ?>
                            </pre>

                            <div class="x_title">
                                <h2>Forma de pago del precio total incluye O.G y E.</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row" id="extras_row">
                                <input type="hidden" name="extra_fields" id="extra_fields">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Pago"
                                               value="Primer pago" id="extra_d_1" name="extra_d_1" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Fecha"
                                               value="Fecha" id="extra_p_1" name="extra_p_1" required>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="monto"
                                               value="monto" id="extra_p_1" name="extra_p_1" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="button" class="btn btn-success" id="add_extra">Añadir</button>
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
                                        <?php echo form_input($precio_total)?>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
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
    $(document).ready(function () {
        //init_validator();
        extra_count = 3;
        $("#extra_fields").val(extra_count);
    });
    $("#add_extra").click(function () {
        console.log('antes de añadir ' + extra_count);

        var extra_field;
        extra_field = '<div class="form-group">';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="text" class="form-control" placeholder="Pago" value="" value="" id="extra_d_' + extra_count + '" name="extra_d_' + extra_count + '">';
        extra_field += '</div>';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="text" class="form-control" placeholder="Fecha" value="" id="extra_d_' + extra_count + '" name="extra_d_' + extra_count + '">';
        extra_field += '</div>';
        extra_field += '<div class="col-md-4 col-sm-4 col-xs-12">';
        extra_field += '<input type="text" class="form-control" placeholder="Monto" value="" id="extra_d_' + extra_count + '" name="extra_d_' + extra_count + '">';
        extra_field += '</div>';
        extra_field += '</div>';

        $("#extras_row").append(extra_field);
        extra_count += 1;
        $("#extra_fields").val(extra_count);
        console.log('luego de añadir ' + extra_count);
    });
</script>


<?php $this->stop() ?>



