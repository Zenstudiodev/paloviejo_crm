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

$master_1 = $formulario_master_1->row();
$master_2 = $formulario_master_2->row();
//$master_3 = $formulario_master_1->row();






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
                        <h2>Precio de la casa #<?php echo $master_2->fm_2_casa_no;?> de <?php echo $master_2->fm_2_proyecto?> de Q.<?php echo $master_2->fm_2_precio_total;?></h2>

                        <div class="clearfix"></div>
                    </div>

                    <?php
                    $tipo_gabinete   = array(
	                    'name'                       => 'tipo_gavinete',
	                    'id'                         => 'tipo_gavinete',
	                    'placeholder'                => 'Tipo de gabinete',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $descuento_promocion   = array(
	                    'name'                       => 'descuento_promocion',
	                    'id'                         => 'descuento_promocion',
	                    'placeholder'                => 'Descuento promoción',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $deposito_energia   = array(
	                    'name'                       => 'deposito_energia',
	                    'id'                         => 'deposito_energia',
	                    'placeholder'                => 'Depósito energia eléctrica',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $seguro_incendio_terremoto   = array(
	                    'name'                       => 'seguro_incendio_terremoto',
	                    'id'                         => 'seguro_incendio_terremoto',
	                    'placeholder'                => 'Seguro contra incendio y terremoto por',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $cuota_seguro   = array(
	                    'name'                       => 'cuota_seguro',
	                    'id'                         => 'cuota_seguro',
	                    'placeholder'                => 'Cuota mensual de seguro',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $cuota_seguro   = array(
	                    'name'                       => 'cuota_seguro',
	                    'id'                         => 'cuota_seguro',
	                    'placeholder'                => 'Cuota mensual de seguro',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $avaluo_bancario  = array(
	                    'name'                       => 'avaluo_bancario',
	                    'id'                         => 'avaluo_bancario',
	                    'placeholder'                => 'Avaluo Bancario',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );

                    $avaluo_bancario  = array(
	                    'name'                       => 'avaluo_bancario',
	                    'id'                         => 'avaluo_bancario',
	                    'placeholder'                => 'Avaluo Bancario',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    $porcentage_banrural  = array(
	                    'name'                       => 'porcentage_banrural',
	                    'id'                         => 'porcentage_banrural',
	                    'placeholder'                => 'Porcentage banrural',
	                    'type'                       => 'text',
	                    'class'                      => 'form-control has-feedback-left ',
	                    'required'                   => 'required'
                    );
                    ?>
                    <div class="x_content">
                        <pre>
                        <?php
                        print_r($master_1);
                        print_r($master_2);
                        ?>
                        </pre>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>/index.php/formulario/guardar_master_2"
                              method="post" >
                            <div class="x_title">
                                <h2>Si incluye</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
		                                <?php echo form_input($tipo_gabinete); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
		                                <?php echo form_input($descuento_promocion); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="x_title">
                                <h2>No incluye</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">Depósito y conexión de energía eléctrica (+-)</label>
				                        <?php echo form_input($deposito_energia); ?>
                                        <span class="fa fa-bolt form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">Seguro contra incendio y terremoto por</label>
				                        <?php echo form_input($seguro_incendio_terremoto); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">Cuota mensual de seguro</label>
				                        <?php echo form_input($cuota_seguro); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">Avaluo Bancario</label>
				                        <?php echo form_input($avaluo_bancario); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <label for="exampleInputEmail1">Porcentage banrural</label>
				                        <?php echo form_input($porcentage_banrural); ?>
                                        <span class="fa fa-home form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
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


</script>


<?php $this->stop() ?>



