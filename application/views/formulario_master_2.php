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

$fecha = New DateTime();
$prospecto = $prospecto->row();
$proceso = $proceso->row();
if ($formulario_1) {
    $formulario_1 = $formulario_1->row();
} else {
    $formulario_1->fm_1_proceso_id = '';
    $formulario_1->fm_1_prospecto_id = '';
    $formulario_1->fm_1_nombre = '';
    $formulario_1->fm_1_edad = '';
    $formulario_1->fm_1_nit = '';
    $formulario_1->fm_1_dpi = '';
    $formulario_1->fm_1_extendido_en = '';
    $formulario_1->fm_1_nacionalidad = '';
    $formulario_1->fm_1_estado_civil = '';
    $formulario_1->fm_1_profesión = '';
    $formulario_1->fm_1_direccion = '';
    $formulario_1->fm_1_correo = '';
    $formulario_1->fm_1_telefono_casa = '';
    $formulario_1->fm_1_telefono_celular = '';
    $formulario_1->fm_1_nombre_sucesor = '';
    $formulario_1->fm_1_dpi_sucesor = '';
    $formulario_1->fm_1_extendido_en_sucesor = '';
    $formulario_1->fm_1_correo_sucesor = '';
    $formulario_1->fm_1_telefono_sucesor = '';
}
if ($formulario_2) {
    $formulario_2 = $formulario_2->row();
} else {
    $formulario_2->fm_2_fecha = '0';
    $formulario_2->fm_2_precio = '0';
    $formulario_2->fm_2_descuento = '0';
    $formulario_2->fm_2_precio_descuento = '0';
    $formulario_2->fm_2_precio_desglose = '0';
    $formulario_2->fm_2_precio_terreno = '0';
    $formulario_2->fm_2_gastos = '0';
    $formulario_2->fm_2_enganche = '0';
    $formulario_2->fm_2_saldo_fiannciar = '0';
    $formulario_2->fm_2_precio_total = '0';
}


?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->

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
                        <?php //print_contenido($formulario_2)?>
                        <?php //print_contenido($formulario_2_extras)?>

                        <?php if ($formulario_2->fm_2_precio != '0'){ ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>formulario/actualizar_master_2" method="post">
                            <input type="hidden" name="form_2_id" id="form_2_id"
                                   value="<?php echo $formulario_2->fm_2_id; ?>">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>formulario/guardar_master_2" method="post">
                                <?php } ?>

                                <!--<pre>
                                <?php /*print_r($formulario_1);*/ ?>
                            </pre>-->

                                <div class="form-group">
                                    <div class="row">
                                        <input type="hidden" name="prospecto_id"
                                               value="<?php echo $formulario_1->fm_1_prospecto_id ?>">
                                        <input type="hidden" name="proceso_id"
                                               value="<?php echo $formulario_1->fm_1_proceso_id ?>">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Proyecto: </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control"
                                                       placeholder="Proyecto"
                                                       value="<?php proyecto_por_id($proceso->proyecto_id); ?>"
                                                       name="proyecto" required>
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
                                                       value="<?php tipo_casa_por_id($proceso->tipo_casa_id); ?>"
                                                       name="tipo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Niveles casa:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="niveles_casa" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control"
                                                       placeholder="Cliente"
                                                       value="<?php echo $formulario_1->fm_1_nombre; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="date" class="form-control"
                                                       placeholder="Fecha de "
                                                       value="<?php echo $formulario_2->fm_2_fecha; ?>" name="fecha"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <input type="text" class="form-control money" placeholder="Precio"
                                                       value="<?php echo $formulario_2->fm_2_precio; ?>" name="precio"
                                                       id="precio" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">(-)Descuento
                                            de
                                            promoción:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <input type="text" class="form-control money"
                                                       placeholder="Descuento "
                                                       value="<?php echo $formulario_2->fm_2_descuento; ?>"
                                                       name="descuento" id="descuento"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                            de la casa con
                                            descuento:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <input type="text" class="form-control"
                                                       placeholder="precio con descuento "
                                                       name="precio_descuento" id="precio_descuento"
                                                       value="<?php echo $formulario_2->fm_2_precio_descuento; ?>"
                                                       required
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                            de terreno</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">Q.</span>
                                                <input type="text" class="form-control"
                                                       placeholder="Precio de terreno "
                                                       name="precio_terreno" id="precio_terreno"
                                                       value="<?php echo $formulario_2->fm_2_precio_terreno; ?>"
                                                       required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="x_title">
                                        <h2>Desglose de precio</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control money" placeholder="Precio"
                                                   value="<?php echo $formulario_2->fm_2_precio_desglose; ?>"
                                                   name="precio_2" id="precio_2" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">(+)
                                            Gastos:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control money" placeholder="Gastos"
                                                   value="<?php echo $formulario_2->fm_2_gastos; ?>" name="gastos"
                                                   id="gastos" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="x_title">
                                    <h2>Extras</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <?php if ($formulario_2_extras) { ?>
                                    <div class="row" id="extras_row">
                                        <?php
                                        $extra_number = 1;
                                        foreach ($formulario_2_extras->result() as $extra) { ?>
                                            <div class="form-group" id="container_<?php echo $extra_number; ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" class="form-control extra"
                                                           placeholder="Detalle"
                                                           value="<?php echo $extra->fm_2_extra_detalle; ?>"
                                                           id="extra_d_<?php echo $extra_number; ?>"
                                                           name="extra_d_<?php echo $extra_number; ?>" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text"
                                                           class="form-control <?php no_formatear_extra($extra->fm_2_extra_valor); ?> "
                                                           placeholder="Precio"
                                                           value="<?php echo $extra->fm_2_extra_valor; ?>"
                                                           id="extra_p_<?php echo $extra_number; ?>"
                                                           name="extra_p_<?php echo $extra_number; ?>" required>
                                                </div>
                                            </div>

                                            <?php $extra_number = $extra_number + 1; //print_contenido($extra); ?>

                                        <?php } ?>
                                        <input type="hidden" name="extra_fields" id="extra_fields"
                                               value="<?php echo $extra_number; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-success" id="add_extra">Añadir
                                                </button>
                                                <button type="button" class="btn btn-danger" id="delete_extra">Borrar
                                                </button>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Total
                                                        extras:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Q.</span>
                                                            <input type="text" class="form-control money" value="0"
                                                                   name="total_extras" id="total_extras" required=""
                                                                   maxlength="22" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row" id="extras_row">
                                        <input type="hidden" name="extra_fields" id="extra_fields">
                                        <div class="form-group" id="container_1">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control extra"
                                                       placeholder="Detalle"
                                                       value="Gabinetes de cocina" id="extra_d_1" name="extra_d_1"
                                                       required>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control"
                                                       placeholder="Precio"
                                                       value="Sin costo" id="extra_p_1" name="extra_p_1" required>
                                            </div>
                                        </div>
                                        <div class="form-group" id="container_2">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control extra"
                                                       placeholder="Detalle"
                                                       value="Closets en los dormitorios" id="extra_d_2"
                                                       name="extra_d_2">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control"
                                                       placeholder="Precio"
                                                       value="Sin costo" id="extra_p_2" name="extra_p_2">
                                            </div>
                                        </div>
                                        <div class="form-group" id="container_3">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control extra"
                                                       placeholder="Detalle"
                                                       value="un baño estándar para el dormitorio de atrás pegado al muro dejando el dormitorio 0.60Mts. más ampli"
                                                       id="extra_d_3" name="extra_d_3">
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
                                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-success" id="add_extra">Añadir
                                                </button>
                                                <button type="button" class="btn btn-danger" id="delete_extra">Borrar
                                                </button>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Total
                                                        extras:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Q.</span>
                                                            <input type="text" class="form-control money" value="0"
                                                                   name="total_extras" id="total_extras" required=""
                                                                   maxlength="22" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                                <div class="x_title">
                                    <h2>Forma de pago</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Enganche:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control money" placeholder="Precio"
                                                   value="<?php echo $formulario_2->fm_2_enganche; ?>" name="enganche"
                                                   id="enganche">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Saldo a
                                            financiar:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control money" placeholder="Precio"
                                                   value="<?php echo $formulario_2->fm_2_saldo_fiannciar; ?>"
                                                   name="a_financiar" id="a_financiar" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                            total:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control money" placeholder="Precio"
                                                   value="<?php echo $formulario_2->fm_2_precio_total; ?>"
                                                   name="precio_total" id="precio_total" required>
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
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-Mask/jquery.mask.min.js"></script>
<script>
    /* VALIDATOR */


    var extra_count;
    var precio;
    var descuento_promoción;
    var precio_casa_descuento;
    var total_extras;
    var enganche;
    var saldo_financiar;
    var precio_total;

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


    function calcular_total_extras() {
        total_extras = 0;
        $('#total_extras').unmask();
        $(".extra_precio").each(function () {

            extra_val = parseFloat($(this).cleanVal());
            console.log(extra_val);
            total_extras = parseFloat(total_extras + extra_val);
            console.log('total extras' + total_extras);
            $("#total_extras").val(total_extras);
        });
    }


    //extras
    $("#add_extra").click(function () {
        console.log('antes de añadir ' + extra_count);
        var extra_field;
        extra_field = '<div class="form-group" id="container_' + extra_count + '">';
        extra_field += '<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field += '<input type="text" class="form-control" placeholder="Detalle"   id="extra_d_' + extra_count + '" name="extra_d_' + extra_count + '">';
        extra_field += '</div>';
        extra_field += '<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field += '<input type="text" class="form-control money extra_precio" placeholder="Precio" id="extra_p_' + extra_count + '" name="extra_p_' + extra_count + '" value="0">';
        extra_field += '</div>';
        extra_field += '</div>';

        $("#extras_row").append(extra_field);
        extra_count += 1;
        $("#extra_fields").val(extra_count);
        console.log('luego de añadir ' + extra_count);


        $(".extra_precio").change(function () {
            console.log('sumar extras');
            calcular_total_extras();
            $('#total_extras').mask('000,000,000,000,000.00', {reverse: true});
        });

    });
    $("#delete_extra").click(function () {
        console.log(extra_count);
        extra_count -= 1;

        console.log(extra_count);
        container_d = "#container_" + extra_count;
        console.log(container_d);
        $(container_d).remove();
    });

    //precio descuento
    function calcular_precio_con_descuento() {
        precio = $("#precio").cleanVal();
        descuento_promoción = $("#descuento").cleanVal();
        precio_casa_descuento = precio - descuento_promoción;
        $('#precio_descuento').unmask();
        $("#precio_descuento").val(precio_casa_descuento);
        console.log(precio_casa_descuento);
    }

    $("#precio").change(function () {
        calcular_precio_con_descuento();
        $('#precio_descuento').mask('000,000,000,000,000.00', {reverse: true});
    });
    $("#descuento").change(function () {
        calcular_precio_con_descuento();
        $('#precio_descuento').mask('000,000,000,000,000.00', {reverse: true});
    });

    //precio total
    function calcular_precio_total() {
        console.log(total_extras);
        console.log(precio_casa_descuento);
        precio_total = total_extras + precio_casa_descuento;
        //enganche = parseInt($("#enganche").cleanVal());
        //saldo_financiar = parseInt($("#a_financiar").cleanVal());
        //precio_total = parseInt(enganche + saldo_financiar);
        $('#precio_total').unmask();
        $("#precio_total").val(precio_total);
        console.log(precio_total);
    }
    function calcular_monto_a_financiar(){

        precio_total = $("#precio_total").cleanVal();
        enganche = $("#enganche").cleanVal();
        console.log(precio_total);
        console.log(enganche);
        monto_a_financiar= precio_total - enganche;
        $('#a_financiar').unmask();
        $("#a_financiar").val(monto_a_financiar);
        console.log(monto_a_financiar);
    };

    $("#enganche").change(function () {
        calcular_monto_a_financiar();
        $('#a_financiar').mask('000,000,000,000,000.00', {reverse: true});
    });


    $("#a_financiar").change(function () {
        calcular_precio_total();
        $('#precio_total').mask('000,000,000,000,000.00', {reverse: true});
    });

    $(document).ready(function () {
        //mask dinero
        $('.money').mask('000,000,000,000,000.00', {reverse: true});
        //init_validator();
        extras = $(".extra").length;

        <?php if
        ($formulario_2_extras) {
        $extra_number = 1;
        foreach ($formulario_2_extras->result() as $extra) {
            $extra_number = $extra_number + 1;
        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 4;
        <?php } ?>


        $("#extra_fields").val(extra_count);
        calcular_precio_con_descuento();
        $('#precio_descuento').mask('000,000,000,000,000.00', {reverse: true});
        calcular_total_extras();
        calcular_monto_a_financiar();
    });


</script>


<?php $this->stop() ?>



