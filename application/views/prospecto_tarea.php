
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
//setlocale(LC_ALL, 'es_ES.UTF-8');
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tarea </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <?php
        foreach ($prospectos->result() as $prospecto) {


            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Crear Tarea para prospecto #: <?php echo $prospecto->id .' - '. $prospecto->nombre1 ?></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url()?>tareas/guardarTarea"
                                  method="post">
                                <?php
                                $fecha = array(
                                    'name' => 'fecha',
                                    'placeholder' => 'Fecha',
                                    'type' => 'datetime-local',
                                    'class' => 'form-control col-md-7 col-xs-12',
                                    'required' => 'required'
                                );
                                $observaciones = array(
                                    'name' => 'observaciones',
                                    'placeholder' => 'Observaciones',
                                    'class' => 'form-control col-md-7 col-xs-12',
                                    'required' => 'required'
                                );
                                $tarea = array(
                                    'name' => 'tarea',
                                    'class' => 'form-control col-md-7 col-xs-12',
                                    'required' => 'required'
                                );
                                $tareaOptions = array(
                                    'LLamar' => 'Llamar',
                                    'Email' => 'Escribir email',
                                    'Visita' => 'Visita'
                                );
                                ?>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Fecha<span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?= form_input($fecha) ?>
                                        <!--input id="name" class="form-control col-md-7 col-xs-12"
                                               data-validate-length-range="6" data-validate-words="2" name="name"
                                               placeholder="nombre" required="required" type="text">-->
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comentario
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?= form_textarea($observaciones) ?>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <?php
                                    echo form_hidden('prospecto_id', $prospecto->id) ?>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tarea <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php echo form_dropdown($tarea, $tareaOptions) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancelar</button>
                                        <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- /page content -->
<?php $this->stop() ?>




