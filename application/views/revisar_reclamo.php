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
$proceso = $proceso->row();

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
                <h3>Reclamos y garantias</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Datos generales  pagina 1-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>RECLAMOS Y GARANTIAS</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url();?>/index.php/formulario/guardar_master_1"
                              method="post" >
                            <?php
                            $nombre = array(
                                'name' => 'nombre',
                                'id' => 'nombre',
                                'placeholder' => 'Datos del cliente',
                                'type' => 'text',
                                'value' => 'Juan Lopez',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $fecha_entrega = array(
                                'name' => 'fecha_entrega',
                                'id' => 'fecha_entrega',
                                'placeholder' => 'Fecha de entrega',
                                'type' => 'date',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $casa = array(
                                'name' => 'casa',
                                'id' => 'casa',
                                'placeholder' => 'Casa',
                                'value' => '74',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $proyecto = array(
                                'name' => 'proyecto',
                                'id' => 'proyecto',
                                'placeholder' => 'Proyecto',
                                'value' => 'Villas del Choacorral',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $sector = array(
                                'name' => 'sector',
                                'id' => 'sector',
                                'placeholder' => 'Sector',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $fecha_visita = array(
                                'name' => 'fecha_visita',
                                'id' => 'fecha_visita',
                                'placeholder' => 'Fecha de visita',
                                'type' => 'datetime-local',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $cliente_que_atiende = array(
                                'name' => 'cliente_que_atiende',
                                'id' => 'cliente_que_atiende',
                                'placeholder' => 'Quien atiende la cita',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $forma_de_ingresar = array(
                                'name' => 'forma_de_ingresar',
                                'id' => 'forma_de_ingresar',
                                'placeholder' => 'Forma de ingresar',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
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
	                                        <?php echo form_input($fecha_entrega); ?>
                                            <span class="fa fa-calendar form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($casa); ?>
                                            <span class="fa fa-address-card-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($fecha_visita); ?>
                                            <span class="fa fa-user-circle-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($proyecto); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($cliente_que_atiende); ?>
                                            <span class="fa fa-id-card form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($sector); ?>
                                            <span class="fa fa-user-circle-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($forma_de_ingresar); ?>
                                            <span class="fa fa-envelope form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Items de reales</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12 form-group has-feedback">
                                        <p>
                                            <button class="btn btn-success">Subir foto</button>
                                        </p>
                                        <p>
                                            <button class="btn btn-success">Sketch</button>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" name="item_real_1" value="Fuga en el cifon de lava trastos" id="item_real_1" class="form-control has-feedback-left" required="required">
                                        <span class="fa fa-check form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                        <div class="form-group">
                                            <p>
                                                <button class="btn btn-success">Agendar</button>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12 form-group has-feedback">
                                        <p>
                                            <button class="btn btn-success">Subir foto</button>
                                        </p>
                                        <p>
                                            <button class="btn btn-success">Sketch</button>
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" name="item_real_1" value="Fuga en el cifon de lava trastos" id="item_real_1" class="form-control has-feedback-left" required="required">
                                        <span class="fa fa-check form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                        <div class="form-group">
                                            <p>
                                                <button class="btn btn-success">Agendar</button>
                                            </p>
                                        </div>

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



