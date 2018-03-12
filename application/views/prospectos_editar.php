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
    'notificaciones_s' =>$notificaciones_supervisor,
    'alertas' => $alertas,
    'alertas_s' => $alertas_supervisor

]);

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Switchery -->
<link href="<?php echo base_url(); ?>ui/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
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
                                <h2>Editar Prospecto</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p>
                                    <?php
                                    $script_tz = date_default_timezone_get();
                                    echo $script_tz;
                                    ?>
                                </p>
                                <?php
                                if ($prospectos) {
                                foreach ($prospectos->result() as $prospecto) {
                                    ?>



                                <form class="form-horizontal form-label-left"
                                      action="http://www.paloviejosa.com/crm/index.php/prospectos/actualizarProspecto"
                                      method="post">
                                    <?php
                                    $estado = array(
                                        'name' => 'estado',
                                        'id' => 'estado',
                                        'type' => 'checkbox',
                                        'class' => 'js-switch',
                                    );

                                    //Vendedor
                                    $vendedor_select = array(
                                        'name' => 'marca_carro',
                                        'id' => 'marca_carro',
                                        'class' => 'form-control',
                                    );
                                    $vendedor_select_options = array();
                                    foreach ($vendedores->result() as $vendedor) {
                                        $vendedor_select_options[$vendedor->id] = $vendedor->nombre;
                                    }
                                    $nombre = array(
                                        'name' => 'nombre',
                                        'placeholder' => 'Nombre',
                                        'value'=> $prospecto->nombre1,
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $celular = array(
                                        'name' => 'celular',
                                        'value' => $prospecto->celular1,
                                        'placeholder' => 'Celular',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $email = array(
                                        'name' => 'email',
                                        'value' => $prospecto->email1,
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $nombre2 = array(
                                        'name' => 'nombre2',
                                        'value' => $prospecto->nombre2,
                                        'placeholder' => 'Nombre',
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $celular2 = array(
                                        'name' => 'celular2',
                                        'value' => $prospecto->celular2,
                                        'type' => 'text',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

                                    );
                                    $email2 = array(
                                        'name' => 'email2',
                                        'value' => $prospecto->email2,
                                        'placeholder' => 'Email',
                                        'type' => 'email',
                                        'class' => 'form-control col-md-7 col-xs-12',
                                        'required' => 'required'

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
                                    <?php
                                    if(puede_ver($rol, array('0','1','2','3'))){ ?>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado del prospecto</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <div class="">
                                                    <label>
                                                        <?php
                                                        $estado_check=false;
                                                        if($prospecto->estado == '1'){
                                                           $estado_check = true;
                                                        }
                                                        echo form_checkbox($estado, 'accept', $estado_check);?> Activo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php if(puede_ver($rol, array('0','1','2','3'))){ ?>?>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Vendedor asignado<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php echo form_dropdown($vendedor_select, $vendedor_select_options, $prospecto->user_id);?>
                                        </div>
                                    </div>
                                    <?php }?>

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


                                    <div class="ln_solid">

                                        <?php
                                        echo form_hidden('prospecto_id', $prospecto->id);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary">Cancelar</button>
                                            <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }
                                }else{}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <!-- Switchery -->
    <script src="<?php echo base_url(); ?>ui/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>ui/vendors/switchery/dist/switchery.min.js"></script>

    <script>
        // Switchery
        $(document).ready(function() {
            if ($(".js-switch")[0]) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                elems.forEach(function (html) {
                    var switchery = new Switchery(html, {
                        color: '#26B99A'
                    });
                });
            }
        });
        // /Switchery
    </script>
<?php $this->stop() ?>