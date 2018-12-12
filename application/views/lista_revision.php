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
                <h3>Hoja de preentrega</h3>
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

                                </div>
                                <div class="x_content">
                                    <h2>1 explicación de toda las instalaciones</h2><br>
                                    <h2>2 revisión de acabados  /arreglos o faltantes</h2>
                                    <div class="">
                                        <p>1</p>
                                        <h3>exterior</h3>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Caja de instalación  de agua potable</div>
                                            <div class="panel-body">
                                                <ul class="to_do">
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> llave de pago
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> llave de paso
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> llave de cheque
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> contador
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Caja de instalaciones especiales
                                            </div>
                                            <div class="panel-body">
                                                <ul class="to_do">
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Teléfono
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Cable
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Internet
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Instalaciones EEGSA
                                            </div>
                                            <div class="panel-body">
                                                <ul class="to_do">
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Caja RH
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Varilla de cobre
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Contador
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Protector de corriente
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Iluminación  publica
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Casa Frontal
                                            </div>
                                            <div class="panel-body">
                                                <ul class="to_do">
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Energía
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Agua potable
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <input type="checkbox" class="flat"> Iluminación
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Interior</h3>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Lavandería
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Pila / Caja de registro
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Reposaderas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Caja de flipones
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Conexiones	lavadora
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Conexiones Secadora
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Conexiones	Calentadores
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Garantía por tipo de calentador
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Caja control de áreas de agua potable
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Caja atrapa grasa
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Techo de lamina policarbonato y madera estructurado
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Cocina
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Garantía de muebles / uso y cuidado
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> instalacion purificador de olores

                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> instalacion refrigeradora /conexiones


                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> timbre / intercomunicador
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Baños
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Contra llaves de artefactos
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> reposaderas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> reposaderas de ducha
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> cortinas puertas de ducha
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Características del inodoro
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h3>3 tipos de humedad</h3>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Por Ambiente
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> promotores de humedad
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> salitre  / garantia
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> deshumidificador
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> ventilación natural
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Moho
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> Garantías
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h3>Por fuga</h3>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Por filtración
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> cuidado de la losa
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> sello de juntas  en terraza
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h3>Dormitorios</h3>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Por Ambiente
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> uso adecuado y manejo
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> instalaciones eléctricas, telefono y cable
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">jardínes
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> arboles y plantas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> reposadera
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> uso y mantenimiento de pérgola
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> uso y mantenimiento de fuente
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> uso y mantenimiento de churrasquera
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> gas, electricidad, agua
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Analisis sismico
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> grietas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> garantia y reparaciones
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> ley de Guatemala
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Mantenimiento general
                                        </div>
                                        <div class="panel-body">
                                            <ul class="to_do">
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> pintura
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> limpieza de terraza
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> destapado de cañerías
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> limpieza de cajas de registro
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> reposaderas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> jardinería
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> cuidados al perforar
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> chapas y bisagras
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> closets
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> piso
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> puertas corredizas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> humedad bajo gradas
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> madera
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>
                                                        <input type="checkbox" class="flat"> hierro
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h1>Revision</h1>
                                    <p>acabados  /arreglos o faltantes</p>
                                    <textarea class="form-control"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">Atendido por<br>Usuario</div>
                                        <div class="col-md-6">Atendido por proyecto</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <canvas id="signature-pad" class="signature-pad" width=400
                                                    height=200>

                                            </canvas>
                                            <p>Firma Conforme</p>
                                        </div>
                                        <div class="col-md-6">Nombre del cliente</div>
                                    </div>
                                    <p>Acompañante/s de cliente</p>
                                    <textarea class="form-control"></textarea>
                                    <a class="btn btn-success" href="#" role="button">Guardar</a>
                                    <div class="row">
                                        <div class="col-md-3"><a class="btn btn-info" href="#" role="button">Subir digital</a></div>
                                        <div class="col-md-3"><a class="btn btn-warning" href="#" role="button">Imprimir</a></div>
                                        <div class="col-md-3"><a class="btn btn-info" href="#" role="button">Subir Imagen</a></div>
                                        <div class="col-md-3"><a class="btn btn-warning" href="#" role="button">Enviar</a></div>
                                    </div>
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





