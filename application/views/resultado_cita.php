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
                <h3>Resultado de cita </h3>
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
                            <h2>Resultado de reunion con: <?php echo $prospecto->nombre1 ?></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url()?>citas/guardarResultadoCita"
                                  method="post">

                                <?php
                                $observaciones = array(
                                    'name' => 'resultado',
                                    'placeholder' => 'Resultado',
                                    'class' => 'form-control col-md-7 col-xs-12',
                                    'required' => 'required'

                                );

                                ?>


                                <?php if ($citas) {
                                    foreach ($citas->result() as $cita) { ?>

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
                                                            <?php echo $cita->observaciones ?>
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
                                                       placeholder="<?php echo $cita->fecha; ?>" required="required"
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


                                        <?php
                                        if($cita->tipo_cita == 'Cierre'){?>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cierre de prospecto</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <div class="">
                                                        <label>
                                                            <input type="checkbox" class="js-switch"  name="cerrado" id="cerrado"/> Cerrado
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                       <?php }?>




                                        <div class="ln_solid">
                                            <?php
                                            echo form_hidden('prospecto_id', $prospecto->id);
                                            echo form_hidden('cita_id', $cita->id);

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









