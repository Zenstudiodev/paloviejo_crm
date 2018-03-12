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
                <!--Datos generales  pagina 1-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>DATOS GENERALES PROMITENTE COMPRADOR</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="http://www.paloviejosa.com/crm/index.php/prospectos/guardarProspecto"
                              method="post" novalidate>
							<?php
							$nombre       = array(
								'name'        => 'nombre',
								'id'          => 'nombre',
								'placeholder' => 'Nombre',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$edad         = array(
								'name'        => 'edad',
								'id'          => 'edad',
								'placeholder' => 'Edad',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$nit          = array(
								'name'        => 'nit',
								'id'          => 'nit',
								'placeholder' => 'Nit',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$extendido_en = array(
								'name'        => 'extendido_en',
								'id'          => 'extendido_en',
								'placeholder' => 'Extendido en ',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$nacionalidad = array(
								'name'        => 'nacionalidad',
								'id'          => 'nacionalidad',
								'placeholder' => 'Nacionalidad',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);

							$nacionalidad         = array(
								'name'        => 'nacionalidad',
								'id'          => 'nacionalidad',
								'placeholder' => 'Nacionalidad',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$estado_civil         = array(
								'name'        => 'estado_civil',
								'id'          => 'estado_civil',
								'placeholder' => 'Estado cilvil',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$profesion            = array(
								'name'        => 'profesión',
								'id'          => 'profesion',
								'placeholder' => 'Profesión',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$direccion            = array(
								'name'        => 'direccion',
								'id'          => 'direccion',
								'placeholder' => 'Dirección',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$correo               = array(
								'name'        => 'correo',
								'id'          => 'correo',
								'placeholder' => 'Correo eléctronico',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$telefono_casa        = array(
								'name'        => 'telefono_casa',
								'id'          => 'telefono_casa',
								'placeholder' => 'Teléfono de casa',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$telefono_celular     = array(
								'name'        => 'telefono_celular',
								'id'          => 'telefono_celular',
								'placeholder' => 'Teléfono celular',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$nombre_sucesor       = array(
								'name'        => 'nombre_sucesor',
								'id'          => 'nombre_sucesor',
								'placeholder' => 'Nombre',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$dpi_sucesor          = array(
								'name'        => 'dpi_sucesor',
								'id'          => 'dpi_sucesor',
								'placeholder' => 'DPI',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$dpi_sucesor          = array(
								'name'        => 'dpi_sucesor',
								'id'          => 'dpi_sucesor',
								'placeholder' => 'DPI',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$extendido_en_sucesor = array(
								'name'        => 'extendido_en_sucesor',
								'id'          => 'extendido_en_sucesor',
								'placeholder' => 'Extendido en ',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$correo_sucesor       = array(
								'name'        => 'correo_sucesor',
								'id'          => 'correo_sucesor',
								'placeholder' => 'Correo elèctronico',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);
							$telefono_sucesor     = array(
								'name'        => 'telefono_sucesor',
								'id'          => 'telefono_sucesor',
								'placeholder' => 'Teléfono',
								'type'        => 'text',
								'class'       => 'form-control has-feedback-left',
								'required'    => 'required'
							);


							?>


                            <form class="form-horizontal form-label-left input_mask">
                                <!--Pagos  pagina 2-->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>PLAN DE VENTA</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <form class="form-horizontal form-label-left"
                                              action="http://www.paloviejosa.com/crm/index.php/prospectos/guardarProspecto"
                                              method="post">
                                            <form class="form-horizontal form-label-left input_mask">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Proyecto: </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Proyecto"
                                                                       value="<?php proyecto_por_id($proceso->proyecto_id); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Casa
                                                                No:</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Proyecto"
                                                                       value="<?php echo $proceso->casa; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo:</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Proyecto"
                                                                       value="<?php tipo_casa_por_id($proceso->tipo_casa_id); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Cliente">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Fecha de "
                                                                       value="">
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
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">(-)Descuento
                                                            de
                                                            promoción:</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Descuento " value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                                            de la casa con
                                                            descuento:</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" class="form-control"
                                                                   placeholder="precio con descuento "
                                                                   value="">
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
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">(+)
                                                            Gastos:</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" class="form-control" placeholder="Precio"
                                                                   value="">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="x_title">
                                                    <h2>Extras</h2>
                                                    <div class="clearfix"></div>
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
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Saldo a
                                                            financiar:</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" class="form-control" placeholder="Precio"
                                                                   value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio
                                                            total:</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" class="form-control" placeholder="Precio"
                                                                   value="">
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
                                        </form>
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

                <!--Cuotas  pagina 3-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FORMA DE PAGO</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="http://www.paloviejosa.com/crm/index.php/prospectos/guardarProspecto"
                              method="post">
                            <form class="form-horizontal form-label-left input_mask">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Cliente">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Fecha de "
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio con otros
                                                gastos y extras incluidas:</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Precio "
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="x_title">
                                        <h2>Forma de pago del precio total incluye O.G. Y E:</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Número de
                                            cuotas:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Precio" value="">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Fecha</td>
                                            <td>Monto</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Primer pago</td>
                                            <td><input></td>
                                            <td><input></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Segundo</td>
                                            <td><input></td>
                                            <td><input></td>
                                        </tr>
                                        </tbody>

                                    </table>

                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Enganche:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Precio" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Saldo a
                                            financiar:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Precio" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-9 col-sm-9 col-xs-12">Precio total:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input type="text" class="form-control" placeholder="Precio" value="">
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
                        </form>
                    </div>
                </div>
                <!-- pagina 4-->


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


</script>


<?php $this->stop() ?>



