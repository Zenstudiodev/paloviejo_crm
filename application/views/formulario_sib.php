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
                <h3>FORMULARIO SIB</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Datos generales  pagina 1-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>CARTA DE INTENCION DE CONTRATO.</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url();?>/index.php/formulario/guardar_ive"
                              method="post" >
							<?php
							$objeto   = array(
								'name'                       => 'objeto',
								'id'                         => 'objeto',
								'placeholder'                => 'Objeto',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left ',
								'required'                   => 'required'
							);
							$condiciones   = array(
								'name'                       => 'condiciones',
								'id'                         => 'condiciones',
								'value'                => 'a) el contrato se formalizará hasta que “EL CLIENTE” no tenga pagos pendientes con La Propietaria; b) se tendrá por rescindido la presente intención, si la cliente, desiste, abandona, incumple cualquier condición acordada; c) La Propietaria queda autorizada en forma exclusiva para designar a la entidad Constructora que deba realizar los trabajos de construcción en el bien inmueble objeto de la presente carta; d) No se formalizará el contrato de compra venta sin construcción, en virtud que el proyecto de terreno y vivienda son una unidad dentro del Residencial; e) No se formalizará el contrato si El Cliente no acepta a la entidad Constructora designada por la Propietaria; f)  El propietario, dará por rescindido, terminado o cancelado en forma unilateral la presente carta sin su responsabilidad por cualquier incumplimiento por parte de El Cliente a formalizar el contrato; g) Se pacta que en caso de incumplimiento por parte de El Cliente a la celebración del contrato de compra venta , pagará en concepto de arras a título de daños y perjuicios la cantidad de Veinticinco mil quetzales (Q. 25,000.00) que podrán ser deducidos de las sumas entregadas por El Cliente a la Propietaria; 

h) La presentes condiciones quedarán sin efecto legal alguno si El Cliente no acepta la designación de la entidad Constructora designada   por;   La   Propietaria  i) Cualquier sobrecosto originado por cambios en las leyes tributarias y económicas del país que afecten la presente intención de contrato será por cuenta de El Cliente.
Los comparecientes ratificamos y aceptamos la presente carta de intención de contrato firmando al pie de la presente.
En la ciudad de Guatemala el día seis de septiembre del año dos mil dieciséis.
',
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
								'placeholder'                => 'Correo elèctronico',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							$telefono_sucesor   = array(
								'name'                       => 'telefono_sucesor',
								'id'                         => 'telefono_sucesor',
								'placeholder'                => 'Teléfono',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
							?>


                            <form class="form-horizontal form-label-left input_mask">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($objeto); ?>
                                            <span class="fa fa-file form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_textarea($condiciones); ?>
                                            <span class="fa fa-address-card-o form-control-feedback left"
                                                  aria-hidden="true"></span>
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



