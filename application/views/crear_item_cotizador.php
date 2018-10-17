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
                        <h3>Items para cotizar</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Agregar items</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form class="form-horizontal form-label-left"
                                      action="http://www.paloviejosa.com/crm/index.php/cotizador/guardar_item"
                                      method="post">
                                    <?php ?>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2" name="nombre"
                                                   placeholder="nombre" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Despcirpción
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="descripcion" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2" name="descripcion"
                                                   placeholder="Descripción" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Precio
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="precio" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2" name="precio"
                                                   placeholder="Precio" required="required" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary">Cancelar</button>
                                            <!--<a class="btn btn-success" href="<?php /*echo base_url(); */ ?>index.php/prospectos/prospectosList">Guardar</a>-->
                                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>

                                <?php if ($items_cotizador){ ?>
                                <div class="x_content">
                                    <table class="table">
                                        <thead>
                                        <td>Nombre</td>
                                        <td>Descripcion</td>
                                        <td>Precio</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        foreach ($items_cotizador->result() as $item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $item->nombre?></td>
                                                <td><?php echo $item->descripcion?></td>
                                                <td><?php echo $item->precio?></td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                                    <?php
                                    } else {
                                        echo 'Aun no hay items';
                                    } ?>

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