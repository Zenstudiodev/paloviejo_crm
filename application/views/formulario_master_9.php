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


if ($formulario_master_6) {
    $formulario_master_6 = $formulario_master_6->row();

    $finca_val = $formulario_master_6->fm_6_finca;
    $folio_val = $formulario_master_6->fm_6_folio;
    $libro_val = $formulario_master_6->fm_6_libro;
    $area_val = $formulario_master_6->fm_6_area;
    $frente_val = $formulario_master_6->fm_6_frente;
    $fondo_val = $formulario_master_6->fm_6_fondo;
    $forma_val = $formulario_master_6->fm_6_forma;
} else {

    $finca_val = 0;
    $folio_val = 0;
    $libro_val = 0;
    $area_val = 0;
    $frente_val = 0;
    $fondo_val = 0;
    $forma_val = 0;

    /*$formulario_master_6->fm_6_finca = '0';
    $formulario_master_6->fm_6_folio = '0';
    $formulario_master_6->fm_6_libro = '0';
    $formulario_master_6->fm_6_area = '0';
    $formulario_master_6->fm_6_frente = '0';
    $formulario_master_6->fm_6_fondo = '0';
    $formulario_master_6->fm_6_forma = '0';*/
}


?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.css" rel="stylesheet">
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

                    <div class="x_content">
                        <!-- <pre>
                        <?php
                        /*                        print_r($master_1);
                                                print_r($master_2);
                                                */ ?>
                        </pre>-->


                        <?php if ($formulario_master_9) { ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>Formulario/actualizar_master_9" method="post">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>Formulario/guardar_master_9" method="post">
                                <?php } ?>


                                <div class="ln_solid"></div>
                                <div class="x_title">
                                    <h2>Observaciones generales</h2>
                                    <div class="clearfix"></div>
                                </div>


                                <?php
                                if ($formulario_master_9) {
                                    //print_contenido($formulario_4_incluye->result());
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            $extra_number = 1;
                                            foreach ($formulario_master_9->result() as $incluye) { ?>
                                                <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                     id="incluye_container_<?php echo $extra_number; ?>">
                                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox"
                                                       id="incluye_checkbox_<?php echo $extra_number; ?>"
                                                       class="incluye_checkbox">
                                            </span>
                                                        <textarea type="text" class="form-control"
                                                                  name="incluye_input_<?php echo $extra_number; ?>"
                                                                  id="incluye_input_<?php echo $extra_number; ?>"
                                                        ><?php echo $incluye->fm_9_valor; ?>
                                            </textarea>
                                                    </div><!-- /input-group -->
                                                </div>

                                                <?php $extra_number = $extra_number + 1; //print_contenido($extra); ?>

                                            <?php } ?>


                                            <div id="extras_row">
                                            </div>


                                        </div>
                                    </div>
                                <?php } else { ?>

                                <?php
                                //print_contenido($formulario_master_6);
                                //print_contenido($master_1);
                                //print_contenido($master_2);

                                $varas_area = $formulario_master_6->fm_6_area * 1.431;

                                print_contenido($formulario_master_6);
                                print_contenido($master_1);
                                print_contenido($master_2);
                                print_contenido($formulario_master_3_pagos->result());

                                $dpi_numero = intval($master_1->fm_1_dpi);
                                ?>

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_1">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_1" class="incluye_checkbox">
                                            </span>
                                                <textarea class="form-control" name="incluye_input_1"
                                                          id="incluye_input_1"
                                                >CONTRATO PRIVADO DE CONSTRUCCION DE VIVIENDA</textarea>
                                            </div><!-- /input-group -->
                                        </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                 id="incluye_container_2">
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                    <textarea name="incluye_input_2" id="incluye_input_2"
                                                              class="form-control ">En la ciudad de Guatemala, departamento de Guatemala, el día: <?php echo fecha_formato_1_master9($master_2->fm_2_fecha); ?>, en las oficinas de la entidad denominada CONSTRUCCIONES DE CENTROAMERICA, SOCIEDAD ANÓNIMA, ubicada en 8ª. Calle 20-06 Colonia El Mirador 1, zona 11, ciudad de Guatemala, comparecemos: </textarea>
                                                </div>
                                            </div>



                                        <?php
                                        $parametros = $parametros->result();

                                        $representante_legal = $parametros[0]->parametro_valor;
                                        $fecha_nacimiento_representante = $parametros[1]->parametro_valor;
                                        $estado_civil_representante = $parametros[2]->parametro_valor;
                                        $Nacionalidad_representante = $parametros[3]->parametro_valor;
                                        $dpi_representante = $parametros[4]->parametro_valor;
                                        $dpi_emitido_representante = $parametros[5]->parametro_valor;
                                        $nombre_notaria = $parametros[6]->parametro_valor;
                                        $fecha_notaria = $parametros[7]->parametro_valor;
                                        $registro_acta = $parametros[8]->parametro_valor;
                                        $folio_acta = $parametros[9]->parametro_valor;
                                        $libro_acta = $parametros[10]->parametro_valor;

                                        //print_contenido($parametros[1]->parametro_valor);


                                        echo  diferencia_en_años($fecha_nacimiento_representante);

                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container "
                                             id="incluye_container_3">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_3" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_3" id="incluye_input_3"
                                                          class="form-control" rows="5">A) <?php echo $representante_legal?>, quien dice ser de <?php echo  diferencia_en_años($fecha_nacimiento_representante);?> años de edad, <?php echo $estado_civil_representante?>, <?php echo $Nacionalidad_representante?>,  Ingeniero Civil, de este domicilio, quien se identifica con Documento Personal de Identificación, Código Único de Identificación número Dos mil seiscientos setenta y dos, ochenta y seis mil quinientos cuarenta y seis, cero uno cero uno (<?php echo $dpi_numero?>) extendido por el Registro Nacional de las Personas de la <?php echo $dpi_emitido_representante?>, quien actúa en su calidad de GERENTE GENERAL Y REPRESENTANTE LEGAL de la entidad CONSTRUCCIONES DE CENTROAMERICA, SOCIEDAD ANONIMA, representación que se encuentra documentada en acta notarial de fecha <?php echo $fecha_notaria?>, autorizada en esta ciudad, por la Notaria <?php echo $nombre_notaria?>, documento que se encuentra inscrito en el Registro Mercantil General de la República bajo número trecientos diecinueve mil, cuatrocientos treinta (<?php echo $registro_acta?>), folio cuatrocientos sesenta y tres (<?php echo $folio_acta?>), libro  doscientos cuarenta y seis (<?php echo $libro_acta?>) de Auxiliares de Comercio; entidad que podrá ser denominada indistintamente como “LA CONSTRUCTORA.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_4" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_4" id="incluye_input_4"
                                                          class="form-control">B) <?php echo $master_1->fm_1_nombre?> de <?php echo $master_1->fm_1_edad?> años de edad, <?php echo $master_1->fm_1_estado_civil?>, <?php echo $master_1->fm_1_nacionalidad?>, <?php echo $master_1->fm_1_profesión?>, con domicilio en: <?php echo $master_1->fm_1_direccion?>. Me identifico con DPI Número:  <?php echo  pasar_dpi_a_letras($dpi_numero);?>, ( <?php echo  ($dpi_numero); ?>). Quien podrá ser denominado como “EL CLIENTE”.
Los comparecientes celebramos Contrato Privado de Construcción de Vivienda de conformidad con los siguientes términos y condiciones:

                                    </textarea>
                                </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                         id="incluye_container_5">
                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_5" class="incluye_checkbox">
                                            </span>
                            <textarea name="incluye_input_5" id="incluye_input_5"
                                      class="form-control">I): Planta baja: Carport para dos vehículos pequeños, sala – comedor en un solo ambiente, cocina con gabinetes, lavandería techada con losa, jardín al frente y atrás de la casa, un baño de visitas y cubo de gradas. Planta alta: cinco dormitorios con closets, dos baños completos.</textarea>
                        </div>
                    </div>

                                        <?php


                                        $precio_casa = $master_2->fm_2_precio;

                                        $precio_casa = str_replace (',', '', $precio_casa);

                                        $precio_70 = floatval($precio_casa) * 0.7;

                                        $precio_terreno = $master_2->fm_2_precio_terreno;
                                        $precio_terreno = str_replace (',', '', $precio_terreno);

                                        $precio_carta_intencion = floatval($precio_70 - $precio_terreno);
                                        $precio_contrato_privado_construccion = floatval($precio_70 - $precio_carta_intencion);

                                        $enganche = $master_2->fm_2_enganche;
                                        $enganche = str_replace (',', '', $enganche);

                                        $finianciamiento_bancario = floatval($precio_terreno - $enganche );

                                       /* echo 'precio casa '.$precio_casa.'<br>';
                                        echo 'precio terreno '.$precio_terreno.'<br>';
                                        echo 'precio 70 porciento casa '.$precio_70.'<br>';
                                        echo 'precio Carta de intención'.$precio_carta_intencion.'<br>';
                                        echo 'precio contrato privado de constuccion'.$precio_contrato_privado_construccion.'<br>';*/
                                        ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                         id="incluye_container_6">
                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_6" class="incluye_checkbox">
                                            </span>
                            <textarea name="incluye_input_6" id="incluye_input_6"
                                      class="form-control">II) El monto de la obra contratada asciende a la cantidad de: Q. <?php echo formato_dinero($precio_carta_intencion)?> a cancelar por medio de financiamiento bancario .</textarea>
                        </div>
                    </div>



                                        <?php
                                        $pagos_array = $formulario_master_3_pagos->result();
                                        $ultimo_pago= end($pagos_array);
                                        $primer_pago = $formulario_master_3_pagos->row();

                                        $primera_fecha= $primer_pago->fm_3_pago_fecha;
                                        $ultima_fecha= $ultimo_pago->fm_3_pago_fecha;
                                        //print_contenido($pagos_array);
                                        /*print_contenido($primer_pago);
                                        print_contenido($ultimo_pago);
                                        echo ($primera_fecha);
                                        echo ($ultima_fecha);*/

                                        //echo diferencia_en_dias($primera_fecha, $ultima_fecha);

                                        ?>
                    <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                         id="incluye_container_7">
                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_7" class="incluye_checkbox">
                                            </span>
                            <textarea name="incluye_input_7" id="incluye_input_7"
                                      class="form-control ">III) El plazo del presente contrato será por un plazo de <?php echo diferencia_en_dias($primera_fecha, $ultima_fecha)?> días a partir de la presente fecha. El presente contrato podrá ser prorrogado a petición de ambas partes, o en forma unilateral a criterio de la constructora por motivos de trabajos extras, mejoras o modificaciones en la construcción.
Cualquier modificación, trabajos extras, cambios de orden de trabajos o ampliaciones modificara el valor de este contrato.
Cualquier sobrecosto originado por cambios en las leyes tributarias y económicas del país que afecten el presente contrato será por cuenta de El Cliente.
</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                         id="incluye_container_8">
                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_8" class="incluye_checkbox">
                                            </span>
                            <textarea type="text" name="incluye_input_8" id="incluye_input_8"
                                      class="form-control ">IV) La Constructora señala lugar para recibir notificaciones o citaciones las oficinas de la   entidad ubicadas en: 8ª.  Calle 20-06, zona 11 Colonia El Mirador I.
El Cliente señala lugar para recibir notificaciones o citaciones el lugar de residencia ubicada en: <?php echo $master_1->fm_1_direccion; ?>
</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                         id="incluye_container_9">
                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_9"
                                                       class="incluye_checkbox">
                                            </span>
                            <textarea name="incluye_input_9" id="incluye_input_9"
                                      class="form-control ">Cualquier conflicto que se genere entre las partes por el presente contrato será sometido a los tribunales en materia civil y mercantil de la ciudad de Guatemala, ambas partes desde ya renuncian al fuero de su domicilio y se someten a los tribunales civiles y mercantiles de la ciudad de Guatemala, departamento de Guatemala.
En la ciudad de Guatemala el día 05 de noviembre del 2018.
</textarea>
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
                    <hr>
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
</div>
<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
<script src="<?php echo base_url(); ?>ui/vendors/jQuery-tagEditor/jquery.tag-editor.min.js"></script>
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
        ($formulario_master_9) {
        $extra_number = 0;
        foreach ($formulario_master_9->result() as $extra) {

            $extra_number = $extra_number + 1;

        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 9;
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
        extra_field += '<textarea type="text" name="incluye_input_' + extra_count + '" id="incluye_input_' + extra_count + '"  class="form-control " > </textarea>';
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

</script>

<?php $this->stop() ?>



