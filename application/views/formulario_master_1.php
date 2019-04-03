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
                              action="<?php echo base_url();?>formulario/guardar_master_1"
                              method="post" >
							<?php
							$nombre   = array(
								'name'                       => 'nombre',
								'id'                         => 'nombre',
								'placeholder'                => 'Nombre',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left ',
								'required'                   => 'required'
							);
							$edad   = array(
								'name'                       => 'edad',
								'id'                         => 'edad',
								'placeholder'                => 'Edad',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$nit   = array(
								'name'                       => 'nit',
								'id'                         => 'nit',
								'placeholder'                => 'Nit',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$dpi   = array(
								'name'                       => 'dpi',
								'id'                         => 'dpi',
								'placeholder'                => 'DPI',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$extendido_en   = array(
								'name'                       => 'extendido_en',
								'id'                         => 'extendido_en',
								'placeholder'                => 'Extendido en ',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$nacionalidad   = array(
								'name'                       => 'nacionalidad',
								'id'                         => 'nacionalidad',
								'placeholder'                => 'Nacionalidad',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$estado_civil   = array(
								'name'                       => 'estado_civil',
								'id'                         => 'estado_civil',
								'placeholder'                => 'Estado cilvil',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$profesion   = array(
								'name'                       => 'profesión',
								'id'                         => 'profesion',
								'placeholder'                => 'Profesión',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$direccion   = array(
								'name'                       => 'direccion',
								'id'                         => 'direccion',
								'placeholder'                => 'Dirección',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$correo   = array(
								'name'                       => 'correo',
								'id'                         => 'correo',
								'placeholder'                => 'Correo eléctronico',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$telefono_casa   = array(
								'name'                       => 'telefono_casa',
								'id'                         => 'telefono_casa',
								'placeholder'                => 'Teléfono de casa',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$telefono_celular   = array(
								'name'                       => 'telefono_celular',
								'id'                         => 'telefono_celular',
								'placeholder'                => 'Teléfono celular',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$nombre_sucesor   = array(
								'name'                       => 'nombre_sucesor',
								'id'                         => 'nombre_sucesor',
								'placeholder'                => 'Nombre',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$dpi_sucesor   = array(
								'name'                       => 'dpi_sucesor',
								'id'                         => 'dpi_sucesor',
								'placeholder'                => 'DPI',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$extendido_en_sucesor   = array(
								'name'                       => 'extendido_en_sucesor',
								'id'                         => 'extendido_en_sucesor',
								'placeholder'                => 'Extendido en ',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$correo_sucesor   = array(
								'name'                       => 'correo_sucesor',
								'id'                         => 'correo_sucesor',
								'placeholder'                => 'Correo elèctronico sucesor',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$telefono_sucesor   = array(
								'name'                       => 'codigo_cliente',
								'id'                         => 'codigo_cliente',
								'placeholder'                => 'Teléfono sucesor',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required',
								'value'                   => 'required'
							);
							?>


                            <form class="form-horizontal form-label-left input_mask">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($nombre); ?>
                                            <span class="fa fa-user form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($edad); ?>
                                            <span class="fa fa-calendar form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($nit); ?>
                                            <span class="fa fa-address-card-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($dpi); ?>
                                            <span class="fa fa-address-card-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($extendido_en); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($nacionalidad); ?>
                                            <span class="fa fa-flag form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($estado_civil); ?>
                                            <span class="fa fa-user-circle-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($profesion); ?>
                                            <span class="fa fa-id-card form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($direccion); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($correo); ?>
                                            <span class="fa fa-envelope form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($telefono_casa); ?>
                                            <span class="fa fa-phone form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($telefono_celular); ?>
                                            <span class="fa fa-mobile form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Sucesor</h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                    <?php echo form_input($nombre_sucesor); ?>
                                        <span class="fa fa-user form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                    <?php echo form_input($dpi_sucesor); ?>
                                        <span class="fa fa-address-card-o form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                    <?php echo form_input($extendido_en_sucesor); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                    <?php echo form_input($correo_sucesor); ?>
                                        <span class="fa fa-envelope form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                    <?php echo form_input($telefono_sucesor); ?>
                                        <span class="fa fa-mobile form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>

                                <?php

                               echo  form_hidden('proceso_id', $proceso->id);
                               echo  form_hidden('prospecto_id', $prospecto->id);

                                ?>
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
       //init_validator();
    });


</script>


<?php $this->stop() ?>



