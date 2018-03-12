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
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Resultado de Tarea </h3>
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
                            <h2>Resultado de tarea</h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <form class="form-horizontal form-label-left"
                                  action="http://www.paloviejosa.com/crm/index.php/tareas/guardarResultadoTarea"
                                  method="post">

                                <?php
                                $observaciones = array(
                                    'name' => 'resultado',
                                    'placeholder' => 'Resultado',
                                    'class' => 'form-control col-md-7 col-xs-12',
                                    'required' => 'required'

                                );

                                ?>


                                <?php if ($tareas) {
                                    foreach ($tareas->result() as $tarea) { ?>

                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Info</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">

                                                        <p class="excerpt">
                                                            <?php echo $tarea->observaciones ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                   for="name">Fecha<span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <input id="name" class="form-control col-md-7 col-xs-12"
                                                       placeholder="<?php echo $tarea->fecha; ?>" required="required"
                                                       type="datetime" disabled>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Resultado
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?= form_textarea($observaciones) ?>
                                            </div>
                                        </div>
                                        <div class="ln_solid">
                                            <?php
                                            echo form_hidden('prospecto_id', $prospecto->id);
                                            echo form_hidden('tarea_id', $tarea->id);

                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a class="btn btn-danger" href="<?php echo base_url().'index.php/prospectos/prospectoDetalle/'.$prospecto->id ; ?>">Cancelar</a>
                                                <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                                <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
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
<?php $this->start('js_p') ?>
<?php $this->stop() ?>









