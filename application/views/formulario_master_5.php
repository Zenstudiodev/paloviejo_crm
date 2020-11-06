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
$prospecto = $prospecto->row();
$proceso = $proceso->row();
$master_1 = $formulario_master_1->row();
$master_2 = $formulario_master_2->row();
//$master_3 = $formulario_master_1->row();


?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
      rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
      rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>PLAN DE VENTA</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Pagos  pagina 2-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Precio de la casa #<?php echo $master_2->fm_2_casa_no; ?>
                            de <?php echo $master_2->fm_2_proyecto ?> de
                            Q.<?php echo $master_2->fm_2_precio_total; ?></h2>

                        <div class="clearfix"></div>
                    </div>

                    <?php
                    $extras = array(
                        'name' => 'extras',
                        'id' => 'extras',
                        'placeholder' => 'extras',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required'
                    );
                    $tipo_gabinete = array(
                        'name' => 'tipo_gabinete',
                        'id' => 'tipo_gabinete',
                        'class' => 'form-control',
                        'required' => 'required'
                    );
                    $tipo_gabinete_options = array(
                        'Tipo catedral (laqueados)' => 'Tipo catedral (laqueados)',
                        '-' => '-'
                    );
                    $ampliaciones_extras = array(
                        'name' => 'ampliaciones_extras',
                        'id' => 'ampliaciones_extras',
                        'class' => 'form-control',
                        'required' => 'required'
                    );
                    $ampliaciones_extras_options = array(
                        ' Baño estandar para el dormitorio de atras' => ' Baño estandar para el dormitorio de atras',
                        '-' => '-',
                    );
                    $cambio_ventanas = array(
                        'name' => 'cambio_ventanas',
                        'id' => 'cambio_ventanas',
                        'class' => 'form-control ',
                        'required' => 'required'
                    );
                    $cambio_ventanas_options = array(
                        'Aluminio' => 'Aluminio',
                        'PVC' => 'PVC',
                        '-' => '-',
                    );
                    $pago_serivicio_agua = array(
                        'name' => 'pago_agua',
                        'id' => 'pago_agua',
                        'placeholder' => 'Pago agua',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required'
                    );
                    $pago_seguridad = array(
                        'name' => 'pago_seguridad',
                        'id' => 'pago_seguridad',
                        'placeholder' => 'pago_seguridad ',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required'
                    );
                    $pago_areas_verdes = array(
                        'name' => 'pago_areas_verdes',
                        'id' => 'pago_areas_verdes',
                        'placeholder' => 'Pago areas verdes',
                        'type' => 'text',
                        'class' => 'form-control has-feedback-left ',
                        'required' => 'required'
                    );
                    ?>
                    <div class="x_content">
                        <?php if ($formulario_5_no_incluye) { ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>Formulario/actualizar_master_5" method="post">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>Formulario/guardar_master_5" method="post">
                                <?php } ?>
                                <div class="x_title">
                                    <h2>No incluye</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <?php
                                if ($formulario_5_no_incluye) {
                                    //print_contenido($formulario_4_incluye->result());
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            $extra_number = 1;
                                            foreach ($formulario_5_no_incluye->result() as $incluye) { ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                     id="incluye_container_<?php echo $extra_number; ?>">
                                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox"
                                                       id="incluye_checkbox_<?php echo $extra_number; ?>"
                                                       class="incluye_checkbox">
                                            </span>
                                                        <input type="text" class="form-control"
                                                               name="incluye_input_<?php echo $extra_number; ?>"
                                                               id="incluye_input_<?php echo $extra_number; ?>"
                                                               value="<?php echo $incluye->fm_5_no_inlcuye_valor; ?>">
                                                    </div><!-- /input-group -->
                                                </div>

                                                <?php $extra_number = $extra_number + 1; //print_contenido($extra); ?>

                                            <?php } ?>


                                            <div id="extras_row">
                                            </div>


                                        </div>
                                    </div>
                                <?php } else { ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_1">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_1" class="incluye_checkbox">
                                            </span>
                                                <input type="text" class="form-control" name="incluye_input_1"
                                                       id="incluye_input_1"
                                                       value="Depósito y conexión de energía eléctrica (+-) Q.485.-">
                                            </div><!-- /input-group -->
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_2">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_2" id="incluye_input_2"
                                                       value="Conexión de cable de T.V., línea telefónica según la empresa donde se contrate el servicio."
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container "
                                             id="incluye_container_3">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_3" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_3" id="incluye_input_3"
                                                       value="No incluye cualquier aumento al impuesto del IVA más del 12%, y otros impuestos nuevos que puedan existir antes de la escrituración final."
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_4" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_4" id="incluye_input_4"
                                                       value="Comisiones bancarias u otros por desembolsos de créditos bancarios si los hubiera, así Como pólizas de seguros:"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_5">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_5" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_5" id="incluye_input_5"
                                                       value="Comisión Bancaria sobre el crédito bancario: En el Banco Industrial de Q.1,200.00 una Sola vez.
"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_6" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_6" id="incluye_input_6"
                                                       value="Prima Anual del Seguro contra incendio y terremoto 0.35 % de la construcción en el Banco Industrial: (+,-) Q.3, 600.00, se divide en 12 pagos mensuales de (+,-) Q.300.00"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_7">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_7" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_7" id="incluye_input_7"
                                                       value="Avalúo Bancario: Q.1, 875.-"
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_8">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_8" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_8" id="incluye_input_8"
                                                       value="No incluye el 1% sobre el valor del financiamiento bancario (Q. 5,648.00), si éste fuera de Banrural, correspondiente al seguro de caución un año por anticipado."
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_9">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_9" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_9" id="incluye_input_9"
                                                       value="Si el crédito se tramite por medio del programa MI CASA EN GUATE, del Banco Industrial, este posee una comisión del 1.5% sobre el monto a financiar (Q. 8,472.00)"
                                                       class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_10">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_10" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_10" id="incluye_input_10"
                                                       value="Cualquier otra extra, ampliación, modificación en la construcción de la casa que se contrate de aquí en adelante, ni extra de terreno en la fracción No. 128 de Residenciales Arcos de Santa María Fase I, no incluida en el contrato inicial."
                                                       class="form-control "
                                                       required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_11">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_11" class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_11" id="incluye_input_11"
                                                       value="Intereses por mora de 3.85 % mensual, en alguno de los pagos aquí descritos, y con una mora máxima de hasta 60 días calendario corridos en al menos uno de los pagos aquí establecidos, o intereses por extra financiamiento que en el futuro pudieran convenirse de mutuo acuerdo entre las dos partes contratantes."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_12">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_12"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_12" id="incluye_input_12"
                                                       value="Churrasqueras, chimeneas, fuentes, búcaros, pérgolas, ménsulas, domos, gárgolas, capiteles, molduras, zócalos de piedra, nichos, cascadas, artesas, muros de contención, jardineras, tabiques, masetas, cornisas, filetes, pestañas, voladizos, macetones, plantas, jetinas, balcones, lámparas, cortinas, muebles y electrodomésticos."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_13">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_13"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_13" id="incluye_input_13"
                                                       value="Calentadores de agua."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_14">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_14"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_14" id="incluye_input_14"
                                                       value="Cisternas y bombas hidroneumáticas dentro del lote de la casa. "
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_15">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_15"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_15" id="incluye_input_15"
                                                       value="No incluye el cambio de estilo de los gabinetes de cocina al del tipo Catedral (laqueados), ni de su tamaño estándar."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_16">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_16"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_16" id="incluye_input_16"
                                                       value="No incluye costo por avalúo bancario o certificación."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_17">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_17"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_17" id="incluye_input_17"
                                                       value="No incluye las ampliaciones extras, más allá de las dimensiones estándar de la casa, y conocidas por los compradores, excepto correr la casa un (1) metro hacia atrás y dejar la cocina tipo americano (sin muros)."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_18">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_18"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_18" id="incluye_input_18"
                                                       value="No incluye el cambio de la puerta principal a puerta de madera sólidas o con teleras."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_19">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_19"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_19" id="incluye_input_19"
                                                       value="No incluye el cambio de las ventanas de PVC, a aluminios anodizados con vidrios obscuros."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_20">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_20"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_20" id="incluye_input_20"
                                                       value="No incluye el cambio de las ventanas de PVC, a aluminios anodizados con vidrios obscuros."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_21">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_21"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_21" id="incluye_input_21"
                                                       value="No incluye el costo por el cambio de ubicación de alguno de los closets de los dormitorios."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_22">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_22"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_22" id="incluye_input_22"
                                                       value="No incluye el dormitorio de servicio con baño, ya que este modelo de casa no lo lleva."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_23">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_23"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_23" id="incluye_input_23"
                                                       value="No incluye correr la construcción de la casa hacia el frente, desde donde se tiene prevista su ubicación."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_24">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_24"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_24" id="incluye_input_24"
                                                       value="No incluye ventanas del tipo bay-window."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_25">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_25"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_25" id="incluye_input_25"
                                                       value="No incluye los zócalos de piedra laja y/ó ladrillo en el exterior de la casa."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_26">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_26"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_26" id="incluye_input_26"
                                                       value="No incluye closet de blancos o linos."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_27">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_27"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_27" id="incluye_input_27"
                                                       value="No incluye azulejar la lavandería y la pila."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_28">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_28"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_28" id="incluye_input_28"
                                                       value="Pago mensual (inicial) de Servicio de agua Q.196.-, por media paja de agua equivalentes a 30,000 litros por mes."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_29">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_29"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_29" id="incluye_input_29"
                                                       value="Pago mensual (inicial) de Garita Principal de Seguridad Q.140.- (Palo Viejo, S.A. se reserva el derecho de poder modificar la cuota por incremento de costo de funcionamiento)."
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_30">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_30"
                                                       class="incluye_checkbox">
                                            </span>
                                                <input type="text" name="incluye_input_30" id="incluye_input_30"
                                                       value="Pago mensual inicial de mantenimiento de áreas verdes Q.100.-"
                                                       class="form-control " required="required">
                                            </div>
                                        </div>
                                        <div id="extras_row">
                                        </div>


                                    </div>
                                </div>
                    </div>

                    <?php } ?>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-success" id="add_extra">Añadir</button>
                                <button type="button" class="btn btn-danger" id="delete_extra">Borrar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="extra_fields" id="extra_fields">
                                <input type="hidden" name="prospecto" value="<?php echo $prospecto->id; ?>">
                                <input type="hidden" name="proceso" value="<?php echo $proceso->id; ?>">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<!--<script src="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/external/jquery/jquery.js"></script>-->
<script src="<?php echo base_url(); ?>ui/vendors/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/caret/jquery.caret.js"></script>
<script>

    /* VALIDATOR */
    function init_validator() {
        if (typeof (validator) === 'undefined') {
            return;
        }
        console.log('init_validator');
        // initialize the validator function
        validator.message.date = 'not a real date';
        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required').on('keyup blur', 'input', function () {
            validator.checkField.apply($(this).siblings().last()[0]);
        });

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;

            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();

            return false;
        });

    };
    var extra_count;
    var recounter;
    $(document).ready(function () {
        //init_validator();
        <?php if
        ($formulario_5_no_incluye) {
        $extra_number = 0;
        foreach ($formulario_5_no_incluye->result() as $extra) {

            $extra_number = $extra_number + 1;

        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 30;
        <?php } ?>



        $("#extra_fields").val(extra_count);
    });

    $("#add_extra").click(function () {
        console.log('antes de añadir ' + extra_count);
        extra_count += 1;

        var extra_field = '';

        extra_field += '<div class="col-md-12 col-sm-12 col-xs-12 incluye_container" id="incluye_container_' + extra_count + '">';
        extra_field += '<div class="input-group">';
        extra_field += '<span class="input-group-addon">';
        extra_field += '<input type="checkbox" id="incluye_checkbox_' + extra_count + '" class="incluye_checkbox">';
        extra_field += '</span>';
        extra_field += '<input type="text" name="incluye_input_' + extra_count + '" id="incluye_input_' + extra_count + '" value="" class="form-control " >';
        extra_field += '</div>';
        extra_field += '</div>';


        $("#extras_row").append(extra_field);

        console.log('luego de añadir ' + extra_count);
        $("#extra_fields").val(extra_count);
        console.log('valor de extras' + $("#extra_fields").val());

    });
    $("#delete_extra").click(function () {
        $('.incluye_checkbox:checked').each(
            function () {
                recounter = 0;
                console.log("El checkbox con valor " + $(this).val() + " está seleccionado");
                $(this).closest(".incluye_container").remove();
                $('.incluye_container').each(function () {
                    // console.log(recounter);
                    recounter += 1;
                    //console.log(recounter);
                    extra_count = recounter;
                    $("#extra_fields").val(extra_count);
                    //modificar
                    $(this).attr('id', 'incluye_container_' + recounter);
                    //checkbox
                    $(this).find(".incluye_checkbox").attr('id', 'incluye_checbox_' + recounter);
                    //input
                    $(this).find(".form-control").attr('id', 'incluye_input_' + recounter);
                    $(this).find(".form-control").attr('name', 'incluye_input_' + recounter);
                });

            }
        );

        stop();
        console.log(extra_count);
        container_d = "#incluye_container_" + extra_count;
        console.log(container_d);
        // $(container_d).remove();
        // extra_count -= 1;
    });

    //TAGS
    $('#extras').tagEditor({
        autocomplete: {
            delay: 0, // show suggestions immediately
            position: {collision: 'flip'}, // automatic menu position up/down
            source: ['Churrasquera', 'Chimeneas', 'Fuentes', 'Búcaros', 'Pérgolas',
                'ménsulas', 'domos', 'gargolas', 'capiteles', 'moduleras', 'zocalo de piedra', 'nichos'
                , 'cascadas', 'artesas', 'muros de contención', 'jardineras', 'tabiques', 'mesetas', 'cornisas', 'filetes'
                , 'pestañas', 'voladizos', 'macetones', 'plantas', 'jetinas', 'balcones', 'lámparas', 'cortinas', 'muebles y electrodomésticos']
        },
        forceLowercase: false,
        delimiter: ', ',
        placeholder: 'Opciones ...'
    });

</script>


<?php $this->stop() ?>



