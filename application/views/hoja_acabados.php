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
<link href="<?php echo base_url() ?>ui/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
<link href="<?php echo base_url() ?>ui/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
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
                                    <h2>Hoja de acabados</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h2>Hoja de acabados</h2>
                                    <!-- Tabs -->
                                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                                        <ul class="list-unstyled wizard_steps">
                                            <li>
                                                <a href="#step-11">
                                                    <span class="step_no">1</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-22">
                                                    <span class="step_no">2</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-33">
                                                    <span class="step_no">3</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-44">
                                                    <span class="step_no">4</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-55">
                                                    <span class="step_no">5</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-66">
                                                    <span class="step_no">6</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-77">
                                                    <span class="step_no">7</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div id="step-11">
                                            <h2 class="StepTitle">Modulo A</h2>
                                            <form class="form-horizontal form-label-left">

                                                <span class="section">Piso Ceramico</span>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">
                                                    </label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <button class="btn btn-success">Añadir Seccion</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Toda
                                                        la casa <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="last-name">Piso
                                                        de baños <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                        <div id="step-22">
                                            <h2 class="StepTitle">Modulo B</h2>
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Estuque
                                                        toda la casa <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Estuque
                                                        baños<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Otro
                                                        en el catálogo
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="step-33">
                                            <h2 class="StepTitle">Baños</h2>
                                            <form class="form-horizontal form-label-left">
                                                <span class="section">Baños</span>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">color
                                                        de baño General<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Cantidad
                                                        de baños<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <input class="form-control" type="number" value="3">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        1<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        2<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        3<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>falcon beige 44xx44</option>
                                                            <option>falcon Hueso 44xx44</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <span class="section">Azulejo</span>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Azulejo
                                                        de baño <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>Gris</option>
                                                            <option>Naranja</option>
                                                            <option>Verde</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Color
                                                        de estuque <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Listelo
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>Calipso</option>
                                                            <option>Noruega claro</option>
                                                            <option>Especial claro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <span class="section">Piso de ducha</span>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        1<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>corrugado 6x6</option>
                                                            <option>italic 10x5</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        2<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>corrugado 6x6</option>
                                                            <option>italic 10x5</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Baño
                                                        3<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>corrugado 6x6</option>
                                                            <option>italic 10x5</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                        <div id="step-44">
                                            <h2 class="StepTitle">Madera/color</h2>
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Artefacto/Color </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Pasamanos</option>
                                                            <option>Gradas</option>
                                                            <option>Zocalo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Natural</option>
                                                            <option>Nogal oscuro</option>
                                                            <option>Nogal claro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Artefacto/Color </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Pasamanos</option>
                                                            <option>Gradas</option>
                                                            <option>Zocalo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Natural</option>
                                                            <option>Nogal oscuro</option>
                                                            <option>Nogal claro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Artefacto/Color </label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Pasamanos</option>
                                                            <option>Gradas</option>
                                                            <option>Zocalo</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <select class="form-control">
                                                            <option>Natural</option>
                                                            <option>Nogal oscuro</option>
                                                            <option>Nogal claro</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="step-55">
                                            <h2 class="StepTitle">Cocina</h2>
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Tipo
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>Advantage</option>
                                                            <option>Cathedral</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">color
                                                        de mueble
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>Blanco</option>
                                                            <option>Almendra</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Top
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>wild cherry</option>
                                                            <option>Haya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Azulejo
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>napoli blanco</option>
                                                            <option>napoli bone</option>
                                                            <option>filadelfia beige</option>
                                                            <option>Mirella beige</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">estuque
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Listelo
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>leather stone chocolate</option>
                                                            <option>leather stone blend</option>
                                                            <option>Lindurs Café</option>
                                                            <option>Great peach</option>
                                                            <option>Malla Ibiza</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">estuque
                                                    </label>
                                                    <div class="col-md-4 col-sm-4">
                                                        <select class="form-control">
                                                            <option>gris acero</option>
                                                            <option>chocolate</option>
                                                            <option>kalhua</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-warning">Cotizar</button>
                                                    </div>
                                                </div>
                                            </form>


                                            <canvas id="signature-pad" class="signature-pad" width=400
                                                    height=200></canvas>
                                        </div>
                                        <div id="step-66">
                                            <h2 class="StepTitle">Notas</h2>
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Notas
                                                    </label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <textarea class="form-control">

                                                        </textarea>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div id="step-77">
                                            <h2 class="StepTitle">Aceptación</h2>
                                            <p>
                                                Por medio de esta forma acepto los
                                            </p>
                                            <canvas id="signature-pad" class="signature-pad" width=400
                                                    height=200>

                                            </canvas>
                                        </div>
                                    </div>
                                    <!-- End SmartWizard Content -->
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
<!-- Signature pad-->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url() ?>ui/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

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

    /*saveButton.addEventListener('click', function (event) {

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
    });*/

</script>

<?php $this->stop() ?>





