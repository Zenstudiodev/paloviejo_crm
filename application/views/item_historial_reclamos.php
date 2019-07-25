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
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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

                        <div class="row">
                            <div class="col-md-6">
                                <p>Fuga en el cifon de lava trastos	 <span class="badge">04-01-2019</span> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo base_url()?>/uploads/reclamos_img/1.jpg">
                                <p>Antes</p>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo base_url()?>/uploads/reclamos_img/3.jpg">
                                <p>Despues</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Salitre por humedad en el techo de la sala<span class="badge">20-01-2019</span> </p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo base_url()?>/uploads/reclamos_img/2.jpg">
                                <p>Antes</p>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo base_url()?>/uploads/reclamos_img/4.jpg">
                                <p>Despues</p>
                            </div>
                        </div>

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



