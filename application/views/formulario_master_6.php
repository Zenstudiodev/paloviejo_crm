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
$master_1 = $formulario_master_1->row();
$master_2 = $formulario_master_2->row();



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
					$finca             = array(
						'name'        => 'finca',
						'id'          => 'finca',
						'placeholder' => 'Finca',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left',
						'required'    => 'required'
					);
					$folio       = array(
						'name'        => 'folio',
						'id'          => 'folio',
						'placeholder' => 'Folio',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$libro         = array(
						'name'        => 'libro',
						'id'          => 'libro',
						'placeholder' => 'Libro',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$area = array(
						'name'        => 'area',
						'id'          => 'area',
						'placeholder' => 'Area',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$frente              = array(
						'name'        => 'frente',
						'id'          => 'frente',
						'placeholder' => 'Frente',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$fondo              = array(
						'name'        => 'fondo',
						'id'          => 'fondo',
						'placeholder' => 'Fondo',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$forma           = array(
						'name'        => 'forma',
						'id'          => 'forma',
						'placeholder' => 'Forma',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);

					$metros_construccion  = array(
						'name'        => 'metros_construccion',
						'id'          => 'metros_construccion',
						'placeholder' => 'Metros Construcción',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$dias_de_entrega = array(
						'name'        => 'dias_de_entrega',
						'id'          => 'dias_de_entrega',
						'placeholder' => 'Días de entrega',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					$arras = array(
						'name'        => 'arras',
						'id'          => 'arras',
						'placeholder' => 'Arras',
						'type'        => 'text',
						'class'       => 'form-control has-feedback-left ',
						'required'    => 'required'
					);
					?>
                    <div class="x_content">
                       <!-- <pre>
                        <?php
/*                        print_r($master_1);
                        print_r($master_2);
                        */?>
                        </pre>-->
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>formulario/guardar_master_6"
                              method="post">
                            <div class="x_title">
                                <h2>Registro</h2>

                                <div class="clearfix"></div>
                            </div>
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
                            <div class="ln_solid"></div>
                            <div class="x_title">
                                <h2>Observaciones generales</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="metros_construccion">Metros de construccion</label>
                                    <?php echo form_input($metros_construccion); ?>
                                    <span class="fa fa-bolt form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label for="dias_entrega">Dias de entrega </label>
                                    <?php echo form_input($dias_de_entrega); ?>
                                    <span class="fa fa-bolt form-control-feedback left"
                                          aria-hidden="true"></span>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <label for="exampleInputEmail1">Arras</label>
                                <?php echo form_input($arras); ?>
                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">excepto de credito</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="excepto_de_credito" value="si"> &nbsp; Si &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="excepto_de_credito" value="no"> No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="prospecto" value="<?php echo $prospecto->id;?>">
                            <input type="hidden" name="proceso" value="<?php echo $proceso->id;?>">
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
    $(document).ready(function () {
        //init_validator();
        extra_count = 3;
        $("#extra_fields").val(extra_count);
    });
</script>

<?php $this->stop() ?>



