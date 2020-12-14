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
$master_6 = $formulario_master_6->row();

/*
if ($formulario_master_8) {
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
}*/


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


                        <?php if ($formulario_master_8) { ?>
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>Formulario/actualizar_master_8" method="post">
                            <?php }else{ ?>
                            <form class="form-horizontal form-label-left"
                                  action="<?php echo base_url(); ?>Formulario/guardar_master_8" method="post">
                                <?php } ?>

                                <div class="ln_solid"></div>
                                <div class="x_title">
                                    <h2>Observaciones generales</h2>
                                    <div class="clearfix"></div>
                                </div>


                                <?php
                                if ($formulario_master_8) {
                                    //print_contenido($formulario_4_incluye->result());
                                    ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <?php
                                            $extra_number = 1;
                                            foreach ($formulario_master_8->result() as $incluye) { ?>
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
                                                        ><?php echo $incluye->fm_8_valor; ?>
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
                                /*print_contenido($master_1);
                                print_contenido($master_2);
                                print_contenido($master_6);*/

                                $varas_area = $master_6->fm_6_area * 1.431;
                                $dpi_en_letras = '';
                                //echo $master_1->fm_1_dpi;
                                $dpi_numero = intval($master_1->fm_1_dpi);
                                //echo $dpi_numero;
                                pasar_dpi_a_letras($dpi_numero);

                                ?>

                              <!--  <p>Plantilla</p>-->
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_1">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_1" class="incluye_checkbox">
                                            </span>
                                                <textarea class="form-control" name="incluye_input_1"
                                                          id="incluye_input_1">CARTA DE INTENCION DE CONTRATO.</textarea>
                                            </div><!-- /input-group -->
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_2">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_2" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_2" id="incluye_input_2"
                                                          class="form-control ">Los suscritos, firmamos la presente carta de intención de contrato con base a las siguientes estipulaciones y condiciones:</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container "
                                             id="incluye_container_3">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_3" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_3" id="incluye_input_3"
                                                          class="form-control">YO: <?php echo $master_1->fm_1_nombre ?> de <?php echo $master_1->fm_1_edad ?> años de edad, <?php echo $master_1->fm_1_estado_civil ?>, <?php echo $master_1->fm_1_nacionalidad ?>, <?php echo $master_1->fm_1_profesión ?>, con domicilio en: <?php echo $master_1->fm_1_direccion ?>. Me identifico con DPI Número: <?php echo pasar_dpi_a_letras($dpi_numero); ?>, (<?php echo($dpi_numero); ?>). Quien podrá ser denominado como “EL CLIENTE”.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_4">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_4" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_4" id="incluye_input_4"
                                                          class="form-control">YO: JORGE OSWALDO GALINDO MORALES, Representante Legal de la entidad Palo Viejo, Sociedad Anónima, quien podrá ser identificado como “LA PROPIETARIA”.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_5">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_5" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_5" id="incluye_input_5"
                                                          class="form-control">OBJETO: Carta de intención de compra venta de terreno bajo condición de Construcción de Vivienda.</textarea>
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

                                        /*echo 'precio casa '.$precio_casa.'<br>';
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
                                                          class="form-control" rows="4">IDENTIFICACION DEL INMUEBLE: Casa No. <?php echo $master_2->fm_2_casa_no ?> de <?php echo $master_2->fm_2_proyecto ?>.
PRECIO: Q.<?php echo $master_2->fm_2_precio_terreno ?>.-
FORMA DE PAGO: Enganche Q.<?php echo $enganche ?> -
Financiamiento Bancario: Q. <?php echo $finianciamiento_bancario ?>.-</textarea>
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
                                                          required="required" rows="">ARRAS Q.<?php echo $master_6->fm_6_arras ?>.</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 incluye_container"
                                             id="incluye_container_8">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_8" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_8" id="incluye_input_8"
                                                          class="form-control "
                                                          required="required" rows="7">CONDICIONES: a) el contrato se formalizará hasta que “EL CLIENTE” no tenga pagos pendientes con La Propietaria; b) se tendrá por rescindido la presente intención, si la cliente, desiste, abandona, incumple cualquier condición acordada; c) La Propietaria queda autorizada en forma exclusiva para designar a la entidad Constructora que deba realizar los trabajos de construcción en el bien inmueble objeto de la presente carta; d) No se formalizará el contrato de compra venta sin construcción, en virtud que el proyecto de terreno y vivienda son una unidad dentro del Residencial; e) No se formalizará el contrato si El Cliente no acepta a la entidad Constructora designada por la Propietaria; f)  El propietario, dará por rescindido, terminado o cancelado en forma unilateral la presente carta sin su responsabilidad por cualquier incumplimiento por parte de El Cliente a formalizar el contrato; g) Se pacta  que en caso de incumplimiento por parte de El Cliente a la celebración del contrato de compra  venta, pagará en concepto de arras a título de daños y perjuicios la cantidad de <?php echo numeros_a_letras($master_6->fm_6_arras)?> Quetzales (Q. <?php echo $master_6->fm_6_arras ?>) que podrán ser deducidos de las sumas entregadas por El Cliente a la propietaria;  h) La presentes condiciones quedarán sin efecto legal alguno si El Cliente no acepta la designación de la entidad Constructora designada   por;   La   Propietaria  i) Cualquier sobrecosto originado por cambios en las leyes tributarias y económicas del país que afecten la presente intención de contrato será por cuenta de El Cliente.</textarea>
                                            </div>
                                        </div>

                                        <?php
                                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                        $fecha = new DateTime();

                                        $miFecha = time();

                                        // echo 'Después de setlocale es_ES.UTF-8 strftime devuelve: '.strftime("%A, %d de %B de %Y %H:%M", $miFecha).'<br/>';


                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12  incluye_container"
                                             id="incluye_container_9">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" id="incluye_checkbox_9" class="incluye_checkbox">
                                            </span>
                                                <textarea name="incluye_input_9" id="incluye_input_9"
                                                          class="form-control ">Los comparecientes ratificamos y aceptamos la presente carta de intención de contrato firmando al pie de la presente.
En la ciudad de Guatemala el día <?php echo $fecha->format('d') ?> de <?php echo strftime("%B", $miFecha) ?> del año <?php echo $fecha->format('Y') ?> .</textarea>
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
        ($formulario_master_8) {
        $extra_number = 0;
        foreach ($formulario_master_8->result() as $extra) {

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



