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
                        <h3>Prospectos</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Crear Prospecto</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form class="form-horizontal form-label-left"
                                      action="http://www.paloviejosa.com/crm/index.php/prospectos/guardarProspecto"
                                      method="post" novalidate>
                                    <?php
                                    $nombre = array(
                                        'name' => 'nombre',
                                        'placeholder' => 'Nombre',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'data-validate-length-range'=>'6',
                                        'data-validate-words'=>'2',
                                        'required' => 'required'

                                    );
                                    $celular = array(
                                        'name' => 'celular',
                                        'placeholder' => 'Celular',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $email = array(
                                        'name' => 'email',
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $nombre2 = array(
                                        'name' => 'nombre2',
                                        'placeholder' => 'Nombre',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',


                                    );
                                    $celular2 = array(
                                        'name' => 'celular2',
                                        'placeholder' => 'Celular',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',


                                    );
                                    $email2 = array(
                                        'name' => 'email2',
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'class' => 'form-control col-md-7 col-xs-12',

                                    );

                                    $medio = array(
                                        'name' => 'medio',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'
                                    );

                                    $medioOptions = array(
                                        'Fan page' => 'Fan page',
                                        'Email' => 'Email',
                                        'Llamada' => 'Llamada',
                                        'Presencial' => 'Presencial',
                                        'Evento' => 'Evento'

                                    );

                                    ?>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?= form_input($nombre) ?>
                                            <!--input id="name" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2" name="name"
                                                   placeholder="nombre" required="required" type="text">-->
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Celular
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?= form_input($celular) ?>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?= form_input($email) ?>
                                        </div>
                                    </div>
                                    <div class="well">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre 2
                                                <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?= form_input($nombre2) ?>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Celular
                                                2
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?= form_input($celular2) ?>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 2
                                                <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?= form_input($email2) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Medio <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?= form_dropdown($medio, $medioOptions) ?>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary">Cancelar</button>
                                            <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
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

    function init_validator () {

        if( typeof (validator) === 'undefined'){ return; }
        console.log('init_validator');

        // initialize the validator function
        validator.message.date = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required').on('keyup blur', 'input', function() {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

        $('form').submit(function(e) {
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



