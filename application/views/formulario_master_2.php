<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales
$this->layout('master', [
	'title'            => $title,
	'nombre'           => $nombre,
	'user_id'          => $user_id,
	'username'         => $username,
	'rol'              => $rol,
	'notificaciones'   => $notificaciones,
	'notificaciones_s' => $notificaciones_supervisor,
	'alertas'          => $alertas,
	'alertas_s'        => $alertas_supervisor
]);

$prospecto = $prospecto->row();
$proceso   = $proceso->row();
if($formulario_1){
    $formulario_1 = $formulario_1->row();
    $fecha= New DateTime();
}else{

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
                        <h2>Detalles de la propiedad</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>/index.php/formulario/guardar_master_2"
                              method="post" >
                            <!--<pre>
                                <?php /*print_r($formulario_1);*/?>
                            </pre>-->

                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="prospecto_id" value="<?php echo $formulario_1->fm_1_prospecto_id?>">
                                    <input type="hidden" name="proceso_id" value="<?php echo $formulario_1->fm_1_proceso_id?>">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proyecto: </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="Proyecto"
                                                   value="<?php proyecto_por_id($proceso->proyecto_id); ?>" name="proyecto" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Casa
                                            No:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="casa"
                                                   value="<?php echo $proceso->casa; ?>" name="casa">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="tipo"
                                                   value="<?php tipo_casa_por_id($proceso->tipo_casa_id); ?>" name="tipo" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="Cliente" value="<?php echo $formulario_1->fm_1_nombre; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   placeholder="Fecha de "
                                                   value="<?php echo $fecha->format('Y-m-d')?>" name="fecha" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Precio"
                                               value="" name="precio" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">(-)Descuento
                                        de
                                        promoción:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Descuento " value="" name="descuento" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                        de la casa con
                                        descuento:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="precio con descuento "
                                               value="" name="precio_descuento" required>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Desglose de precio</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Precio"
                                               value="" name="precio_2" id="precio_2" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">(+)
                                        Gastos:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Gastos"
                                               value="" name="gastos" id="gastos" required>
                                    </div>
                                </div>

                            </div>

                            <div class="x_title">
                                <h2>Extras</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row" id="extras_row">
                                <input type="hidden" name="extra_fields" id="extra_fields">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Detalle"
                                               value="Gabinetes de cocina" id="extra_d_1" name="extra_d_1" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Precio"
                                               value="Sin costo" id="extra_p_1" name="extra_p_1" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Detalle"
                                               value="Closets en los dormitorios" id="extra_d_2" name="extra_d_2" >
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Precio"
                                               value="Sin costo" id="extra_p_2" name="extra_p_2" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Detalle"
                                               value="un baño estándar para el dormitorio de atrás pegado al muro dejando el dormitorio 0.60Mts. más ampli" id="extra_d_3" name="extra_d_3">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control"
                                               placeholder="Precio"
                                               value="Sin costo" id="extra_p_3" name="extra_p_3">
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
                                        <input type="text" class="form-control" placeholder="Precio"
                                               value="" name="enganche" id="enganche">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Saldo a
                                        financiar:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Precio"
                                               value="" name="a_financiar" id="a_financiar" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                        total:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Precio"
                                               value="" name="precio_total" id="precio_total" required>
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
        console.log('antes de añadir ' +extra_count);

        var extra_field;
        extra_field ='<div class="form-group">';
        extra_field +='<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field +='<input type="text" class="form-control" placeholder="Detalle" value="" value="" id="extra_d_'+ extra_count +'" name="extra_d_'+extra_count+'">';
        extra_field +='</div>';
        extra_field +='<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field +='<input type="text" class="form-control" placeholder="Precio" value="" id="extra_d_'+extra_count+'" name="extra_d_'+extra_count+'">';
        extra_field +='</div>';
        extra_field +='</div>';

        $("#extras_row").append(extra_field);
        extra_count += 1;
        $("#extra_fields").val(extra_count);
        console.log('luego de añadir ' +extra_count);
    });


</script>


<?php $this->stop() ?>



