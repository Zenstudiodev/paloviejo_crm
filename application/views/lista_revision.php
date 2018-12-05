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

$proceso = $proceso->row();

?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Ion.RangeSlider -->
<link href="<?php echo base_url() ?>ui/vendors/normalize-css/normalize.css" rel="stylesheet">
<!-- iCheck -->
<link href="<?php echo base_url() ?>ui/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Hoja de acabados</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if ($proceso) { ?>
                            <div class="x_panel" style="">
                                <div class="x_title">
                                    <h2>Lista de revision</h2>
                                </div>
                                <div class="x_content">
                                    <div class="">
                                        <ul class="to_do">
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Create email address for new intern</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>
                                        Por medio de esta forma acepto los
                                    </p>
                                    <canvas id="signature-pad" class="signature-pad" width=400
                                            height=200>

                                    </canvas>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<!-- iCheck -->
<script src="<?php echo base_url()?>/ui/vendors/iCheck/icheck.min.js"></script>
<!-- Signature pad-->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>


<script>
    function init_SmartWizard() {
        "undefined" != typeof $.fn.smartWizard && (console.log("init_SmartWizard"), $("#wizard").smartWizard(), $("#wizard_verticle").smartWizard({transitionEffect: "slide"}), $(".buttonNext").addClass("btn btn-success"), $(".buttonPrevious").addClass("btn btn-primary"), $(".buttonFinish").addClass("btn btn-default"))
    }
    $(document).ready(function () {
        init_SmartWizard();
    });
</script>


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





