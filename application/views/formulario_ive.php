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
<!-- iCheck -->
<link href="<?php echo base_url(); ?>ui/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>FORMULARIO IVE</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Datos generales  pagina 1-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FORMULARIO PARA INICIO DE RELACIONES</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url();?>/index.php/prospectosDetalle/<?php echo $prospecto->id?>"
                              method="post" >
							<?php
							$nombre   = array(
								'name'                       => 'nombre',
								'id'                         => 'nombre',
								'placeholder'                => 'Nombre Completo o Razón Social y Nombre Comercial:',
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

							$razon_social  = array(
								'name'                       => 'razon_social',
								'id'                         => 'razon_social',
								'placeholder'                => 'Razón Social/Nombre Comercial (Persona jurídica):',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
                            $razon_social_2  = array(
                                'name'                       => 'razon_social_2',
                                'id'                         => 'razon_social_2',
                                'placeholder'                => 'Si la respuesta anterior es negativa, proporcionar el nombre completo de la persona y/o razón social de la entidad en nombre de quien actúa:',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );



							$otra_nacionalidad   = array(
								'name'                       => 'otra_nacionalidad',
								'id'                         => 'otra_nacionalidad',
								'placeholder'                => ' Otra nacionalidad (PI):',
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
							$no_beneficiaro   = array(
								'name'                       => 'no_beneficiaro',
								'id'                         => 'no_beneficiaro',
								'placeholder'                => 'Si la respuesta anterior es negativa, proporcionar el nombre completo de la persona y/o razón social de la entidad en nombre de quien actúa:',
								'type'                       => 'text',
								'class'                      => 'form-control has-feedback-left',
								'required'                   => 'required'
							);
                            $telefono_negocio  = array(
                                'name'                       => 'telefono_negocio',
                                'id'                         => 'telefono_negocio',
                                'placeholder'                => 'Número(s) de teléfono(s):',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );
                            $direccion_negocio  = array(
                                'name'                       => 'direccion_negocio',
                                'id'                         => 'direccion_negocio',
                                'placeholder'                => ' Dirección o sede social completa de la empresa/institución donde trabaja o del negocio: (No. de calle o avenida, No. de casa, colonia, sector, lote, manzana, otros)',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );
                            $zona_negocio  = array(
                                'name'                       => 'zona_negocio',
                                'id'                         => 'zona_negocio',
                                'placeholder'                => 'zona',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );

                            $departamento_negocio  = array(
                                'name'                       => 'departamento_negocio',
                                'id'                         => 'departamento_negocio',
                                'placeholder'                => 'Departamento',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );
                            $municipio_negocio  = array(
                                'name'                       => 'municipio_negocio',
                                'id'                         => 'municipio_negocio',
                                'placeholder'                => 'Municipio',
                                'type'                       => 'text',
                                'class'                      => 'form-control has-feedback-left',
                                'required'                   => 'required'
                            );
                            $pais_negocio  = array(
                                'name'                       => 'pais_negocio',
                                'id'                         => 'pais_negocio',
                                'placeholder'                => 'Pais',
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
                                    <div class="x_title">
                                        <h2>DATOS DE LA PERSONA OBLIGADA (PO)</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($nombre); ?>
                                            <span class="fa fa-user form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="x_title">
                                        <h2>DATOS PERSONALES DEL SOLICITANTE / CLIENTE</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label>Tipo de Persona:</label>
                                            <p>
                                                Individual (PI):
                                                <input type="radio" class="flat" name="persona" id="genderM" value="M" checked="" required />
                                                Jurídica (PJ)
                                                <input type="radio" class="flat" name="persona" id="genderF" value="F" />
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label>Género:</label>
                                            <p>
                                                M:
                                                <input type="radio" class="flat" name="genero" id="genderM" value="M" checked="" required />
                                                F:
                                                <input type="radio" class="flat" name="genero" id="genderF" value="F" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>Condición migratoria: <small>(Cuando aplique)</small></label>
                                            <p>
                                                Residente temporal:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderM" value="M" checked="" required />
                                                Residente permanente:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderM" value="M" checked="" required />
                                                Persona en tránsito:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderF" value="F" />
                                            </p>
                                            <p>
                                                Turista o visitante:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderF" value="F" />
                                                Permiso de trabajo:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderF" value="F" />
                                                Permiso consular o similar:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderF" value="F" />
                                            </p>
                                            <p>
                                                Otros:
                                                <input type="radio" class="flat" name="condicion_migratoria" id="genderF" value="F" />
                                            </p>
                                                <input type="text" class="form-control" placeholder="Especifique">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($razon_social); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
	                                        <?php echo form_input($otra_nacionalidad); ?>
                                            <span class="fa fa-flag form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>El solicitante/cliente actúa en nombre propio (PI) o en beneficio de la entidad antes descrita (Rep. Legal):</label>
                                            <p>
                                                Si
                                                <input type="radio" class="flat" name="entidad_actua" id="genderM" value="M" checked="" required />
                                                No
                                                <input type="radio" class="flat" name="entidad_actua" id="genderM" value="M" checked="" required />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($razon_social_2); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>INFORMACIÓN ECONÓMICO-FINANCIERA DEL SOLICITANTE / CLIENTE</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Fuentes de ingreso:</label>
                                        <p>
                                            Relación de dependencia:
                                            <input type="radio" class="flat" name="fuente_ingresos" id="genderM" value="M" checked="" required />
                                            Negocio propio
                                            <input type="radio" class="flat" name="fuente_ingresos" id="genderM" value="M" checked="" required />
                                            Otras (ir a numeral 5.1.2)
                                            <input type="radio" class="flat" name="fuente_ingresos" id="genderF" value="F" />
                                        </p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($razon_social_2); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($telefono_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($direccion_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($zona_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($municipio_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($departamento_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
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
<!-- iCheck -->
<script src="<?php echo base_url(); ?>ui/vendors/iCheck/icheck.min.js"></script>
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
        $("input.flat")[0] && $(document).ready(function () {
            $("input.flat").iCheck({checkboxClass: "icheckbox_flat-green", radioClass: "iradio_flat-green"})
        });
    });


</script>


<?php $this->stop() ?>



