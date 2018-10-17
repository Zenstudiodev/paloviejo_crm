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
//setlocale(LC_ALL, 'es_ES.UTF-8');
?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Ion.RangeSlider -->
<link href="<?php echo base_url(); ?>/ui/vendors/normalize-css/normalize.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/ui/vendors/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Firmar</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Aceptar Cotización
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
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
<!-- Signature pad-->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    var saveButton = document.getElementById('save');
    var cancelButton = document.getElementById('clear');

    saveButton.addEventListener('click', function (event) {


        var txt;
        var r = confirm("Al guardar su firma no podra cambiarla");
        if (r == true) {

            var data = signaturePad.toDataURL('image/png');
            console.log(data);
        } else {
        }

    });

    cancelButton.addEventListener('click', function (event) {
        signaturePad.clear();
    });

</script>

<?php $this->stop() ?>





