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


                        <?php if ($formulario_master_6_og) { ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>Formulario/actualizar_master_7" method="post">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>Formulario/guardar_master_7" method="post">
                                <?php } ?>


                                <div class="ln_solid"></div>
                                <div class="x_title">
                                    <h2>Observaciones generales</h2>
                                    <div class="clearfix"></div>
                                </div>



                                <?php if ($formulario_master_6) { ?>
                                    <input type="hidden" name="fm_6_id"
                                           value="<?php echo $formulario_master_6->fm_6_id; ?>">
                                <?php } ?>

                                <?php
                                if ($formulario_master_6_og) {
                                    //print_contenido($formulario_4_incluye->result());
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            $extra_number = 1;
                                            foreach ($formulario_master_6_og->result() as $incluye) { ?>
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
                                                        ><?php echo $incluye->fm_6_og_valor; ?>
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
                               /* print_contenido($formulario_master_6);
                                print_contenido($master_1);
                                print_contenido($master_2);*/

                                $varas_area = $formulario_master_6->fm_6_area * 1.431;
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
                                                >EL TERRENO DE LA CASA No. <?php echo $master_2->fm_2_casa_no; ?> DE <?php echo $master_2->fm_2_proyecto; ?>, TIENE UNA ÀREA DE: <?php echo $formulario_master_6->fm_6_area; ?>, METROS2: EQUIVALENTES A  <?php echo $varas_area; ?> VARAS2 Y ES DE FORMA <?php echo $formulario_master_6->fm_6_forma; ?> LA CASA TIENE APROXIMADAMENTE <?php echo $formulario_master_6->fm_6_metros_construccion; ?> M2 DE CONSTRUCCIÓN.</textarea>
                                            </div><!-- /input-group -->
                                        </div>
                                        <?php if( $master_2->fm_2_niveles_casa == '1'){?>
                                            <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                 id="incluye_container_2">
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                    <textarea name="incluye_input_2" id="incluye_input_2"
                                                              class="form-control ">LA CONSTRUCCIÒN DE LA CASA CONSTA DE: PLANTA BAJA: GARAGE PARA DOS O TRES VEHICULOS PEQUEÑOS, SALA-COMEDOR EN UN SOLO AMBIENTE, COCINA CON GABINETES, LAVANDERIA TECHADA CON LOZA CON PILA SIN AZULEJAR, JARDINES AL FRENTE Y ATRÁS DE LA CASA, UN BAÑO DE VISITAS Y CUBO DE GRADAS. PLANTA ALTA: TRES DORMITORIOS CON CLOSETS, UN BAÑO COMPLETO.</textarea>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if( $master_2->fm_2_niveles_casa == '2'){?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_2">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_2" id="incluye_input_2"
                                                          class="form-control ">LA CONSTRUCCIÒN DE LA CASA CONSTA DE: PLANTA BAJA (PRIMER NIVEL), PLANTA ALTA (SEGUNDO NIVEL): GARAGE PARA DOS O TRES VEHICULOS PEQUEÑOS, SALA-COMEDOR EN UN SOLO AMBIENTE, COCINA CON GABINETES, LAVANDERIA TECHADA CON LOZA CON PILA SIN AZULEJAR, JARDINES AL FRENTE Y ATRÁS DE LA CASA, UN BAÑO DE VISITAS Y CUBO DE GRADAS. PLANTA ALTA: TRES DORMITORIOS CON CLOSETS, UN BAÑO COMPLETO.</textarea>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if( $master_2->fm_2_niveles_casa == '3'){?>
                                            <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                                 id="incluye_container_2">
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                    <textarea name="incluye_input_2" id="incluye_input_2"
                                                              class="form-control ">LA CONSTRUCCIÒN DE LA CASA CONSTA DE: PLANTA BAJA (PRIMER NIVEL), PLANTA ALTA (SEGUNDO NIVEL), PLANTA ALTA (TERCER NIVEL): GARAGE PARA DOS O TRES VEHICULOS PEQUEÑOS, SALA-COMEDOR EN UN SOLO AMBIENTE, COCINA CON GABINETES, LAVANDERIA TECHADA CON LOZA CON PILA SIN AZULEJAR, JARDINES AL FRENTE Y ATRÁS DE LA CASA, UN BAÑO DE VISITAS Y CUBO DE GRADAS. PLANTA ALTA: TRES DORMITORIOS CON CLOSETS, UN BAÑO COMPLETO.</textarea>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container "
                                             id="incluye_container_3">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_3" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_3" id="incluye_input_3"
                                                          class="form-control">LA REFERENCIA DEL TIPO DE CAMBIO SE TOMARÀ DE LAS PUBLICACIONES DIARIA DEL BANCO DE GUATEMALA, EN LOS DIARIOS DEL PAÌS, DEL MERCADO BANCARIO, Y SE TOMARÀ COMO BASE SIEMPRE EL PROMEDIO PONDERADO EN LOS BANCOS DEL SISTEMA MENOS DIEZ CENTAVOS DE QUETZAL (-Q. 0.10), PARA CUALQUIER PAGO QUE SE QUISIERA HACER EN DÓLARES DE NORTEAMERICA (US$.). Y (-Q. 0.15) SI EL PAGO FUERA EN DÓLARES NORTEAMERICANOS (US$) EN EFECTIVO.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_4" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_4" id="incluye_input_4"
                                                          class="form-control">TIEMPO MÁXIMO DE ENTREGA: <?php echo $formulario_master_6->fm_6_dias_de_entrega; ?> DÍAS CORRIDOS A PARTIR DE LA PRESENTE FECHA (SI NO HUBIERA MODIFICACIONES O EXTRAS NUEVAS A LA CASA). Y CONTRA LA CANCELACIÓN TOTAL DEL ENGANCHE, EL CRÉDITO BANCARIO Y TODOS LOS GASTOS Y EXTRAS RELACIONADOS CON ESTA VENTA.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_5">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_5" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_5" id="incluye_input_5"
                                                          class="form-control">INTERESES POR MORA Y/O EXTRAFINANCIAMIENTO: 3.85 % MENSUAL SOBRE SALDOS DEUDORES MOROSOS, EN UNA MORA DE HASTA 60 DÍAS CALENDARIO CORRIDOS EN AL MENOS UNO DE LOS PAGOS DE ESTE CONTRATO, PREVIAMENTE ESTABLECIDOS, LUEGO DE LOS CUALES SE PROCEDERÁ A DAR POR FINALIZADO EL PRESENTE 	CONTRATO PREVIO EL COBRO DE LAS ARRAS Y OTROS GASTOS CORRESPONDIENTES.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_6" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_6" id="incluye_input_6"
                                                          class="form-control">ARRAS: Q. <?php echo $formulario_master_6->fm_6_arras; ?>. - MAS EL VALOR DE LAS EXTRAS SOLICITADAS, SI LAS HUBIERA Y EL VALOR DE LOS GASTOS DE ESCRITURACIÓN. SI EL CREDITO HIPOTECARIO NO ES APROBADO POR NINGUNA ENTIDAD BANCARIA, HABIENDO CUMPLIDO EL CLIENTE CON LA ENTREGA DE PAPELERIA SOLICITADA DENTRO DEL TIEMPO ESTABLECIDO (TOMANDO EN CUENTA QUE EL CLIENTE NO ES RESIDENTE, Y SI CUENTA CON PERMISO DE TRABAJO), LAS ARRAS NO SE HARAN EFECTIVAS A EXCEPCION DE LOS GASTOS ADMINISTRATIVOS DE Q. 11,000.00, MENOS EL 50% DE DESCUENTO QUEDANDO EN Q. 5,500.00.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_7">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_7" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_7" id="incluye_input_7"
                                                          class="form-control "
                                                          required="required">MULTA POR DÌA DE ATRASO EN LA ENTREGA DE LA CASA: Q. 25.00 DIARIOS. ÙNICAMENTE SI ES POR RESPONSABILIDAD DIRECTA DE LA EMPRESA, Y SI NO SE HUBIERA PEDIDO MODIFICACIONES O EXTRAS AL DISEÑO ORIGINAL DE LA CASA, QUE PUDIERAN RETRASAR LA CONSTRUCCIÓN DE LA MISMA, PARA LAS CUALES TUVIERON QUE HABER ACUERDOS PREVIOS A SU REALIZACIÓN POR ESCRITO.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_8">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_8" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_8" id="incluye_input_8"
                                                          class="form-control ">INDEXACIÓN: Q. 8.15 = $. 1.00.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_9">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_9" class="incluye_checkbox">
                                            </span>
                                                <textarea type="text" name="incluye_input_9" id="incluye_input_9"
                                                          class="form-control ">QUEDA A DISCRECIÓN DE LOS CONSTRUCTORES ACEPTAR O NO CUALQUIER EXTRA, MODIFICACIÓN, AMPLIACIÒN, REDUCCIÓN O CAMBIO SOLICITADO EN LA CONSTRUCCIÓN DE ESTRUCTURAS, ACABADOS, SERVICIOS, CONEXIONES, DETALLES O ELEMENTOS NO INCLUIDOS DENTRO DE ESTE CONTRATO, ASÌ COMO SU COSTO Y TIEMPO PARA REALIZARLAS, PUDIENDO ÈSTAS DE SER ACEPTADAS, RETRASAR EL TIEMPO DE ENTREGA DE LA CASA.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_10">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_10"
                                                       class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_10" id="incluye_input_10"
                                                          class="form-control ">SUCESOR: <?php echo $master_1->fm_1_nombre_sucesor ?> QUIEN SE IDENTIFICAN CON NUMERO DE DPI: <?php echo $master_1->fm_1_dpi_sucesor ?></textarea>
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
        ($formulario_master_6_og) {
        $extra_number = 0;
        foreach ($formulario_master_6_og->result() as $extra) {

            $extra_number = $extra_number + 1;

        }?>
        extra_count = <?php echo $extra_number?>;
        <?php }else{ ?>
        extra_count = 10;
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



