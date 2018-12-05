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
    <!-- Dropzone.js -->
    <link href="<?php echo base_url(); ?>ui/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
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
                                <form action="form_upload.html" class="dropzone"></form>
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
    <!-- Dropzone.js -->
    <script src="<?php echo base_url(); ?>ui/vendors/dropzone/dist/min/dropzone.min.js"></script>

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