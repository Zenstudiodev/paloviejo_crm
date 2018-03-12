<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cargamos plantilla master y pasamos variables globales
$this->layout('master', [
	'title'            => $title,
	'nombre'           => $nombre,
	'user_id'          => $user_id,
	'username'         => $username,
	'rol'              => $rol,
	'notificaciones'   => $notificaciones,
	'notificaciones_s' => $notificaciones_supervisor,
	'alertas'          => $alertas,
	'alertas_s'        => $alertas_supervisor
]);


$prospecto = $prospecto->row();
$proceso   = $proceso->row();
$formulario_1 = $formulario_1->row();
$formulario_2 = $formulario_2->row();
$fecha= New DateTime();




?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- Datatables -->
<link href="<?php echo base_url(); ?>ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
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
    <h1 class="titulo_page_pr"><?php echo $formulario_2->fm_2_proyecto?></h1>
    <h2 class="sub_titulo_page_pr">
        Datos generales <br>
        prominente comprador <br>
        <?php echo $formulario_2->fm_2_proyecto?><br>
        Casa No. <?php echo $formulario_2->fm_2_casa_no?>
    </h2>
    <table>
        <tr>
            <td>Nombre:</td>
            <td> <?php echo $formulario_1->fm_1_nombre; ?></td>
        </tr>
        <tr>
            <td>Edad:</td>
            <td><?php echo $formulario_1->fm_1_edad; ?> años</td>
        </tr>
        <tr>
            <td>DPI: </td>
            <td><?php echo $formulario_1->fm_1_dpi; ?></td>
        </tr>
        <tr>
            <td>Extendido en:</td>
            <td><?php echo $formulario_1->fm_1_extendido_en; ?></td>
        </tr>
        <tr>
            <td>NIT: </td>
            <td><?php echo $formulario_1->fm_1_nit; ?></td>
        </tr>
        <tr>
            <td>Nacionalidad: </td>
            <td><?php echo $formulario_1->fm_1_nacionalidad; ?></td>
        </tr>
        <tr>
            <td>Estado Civil:</td>
            <td><?php echo $formulario_1->fm_1_estado_civil; ?></td>
        </tr>
        <tr>
            <td>Profesión:</td>
            <td><?php echo $formulario_1->fm_1_profesión; ?></td>
        </tr>
        <tr>
            <td>Dirección:</td>
            <td><?php echo $formulario_1->fm_1_direccion; ?></td>
        </tr>
        <tr>
            <td>Correo electrónico:</td>
            <td><?php echo $formulario_1->fm_1_correo; ?></td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td><?php echo $formulario_1->fm_1_telefono_casa; ?></td>
        </tr>
        <tr>
            <td>Sucesor:</td>
            <td><?php echo $formulario_1->fm_1_nombre_sucesor; ?></td>
        </tr>
        <tr>
            <td>DPI:</td>
            <td><?php echo $formulario_1->fm_1_dpi_sucesor; ?></td>
        </tr>
        <tr>
            <td>EXTENDIDO</td>
            <td><?php echo $formulario_1->fm_1_extendido_en_sucesor; ?></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><?php echo $formulario_1->fm_1_telefono_sucesor; ?></td>
        </tr>
        <tr>
            <td>Correo eléctronico</td>
            <td><?php echo $formulario_1->fm_1_correo_sucesor; ?></td>
        </tr>

    </table>



</div>

<!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>
<!-- validator -->
<script src="<?php echo base_url(); ?>ui/vendors/validator/validator.js"></script>
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
    $(document).ready(function () {
        //init_validator();
        extra_count = 3;
        $("#extra_fields").val(extra_count);
    });
    $("#add_extra").click(function () {
        console.log('antes de añadir ' +extra_count);

        var extra_field;
        extra_field ='<div class="form-group">';
        extra_field +='<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field +='<input type="text" class="form-control" placeholder="Detalle" value="" value="" id="extra_d_'+ extra_count +'" name="extra_d_'+extra_count+'">';
        extra_field +='</div>';
        extra_field +='<div class="col-md-6 col-sm-6 col-xs-12">';
        extra_field +='<input type="text" class="form-control" placeholder="Precio" value="" id="extra_d_'+extra_count+'" name="extra_d_'+extra_count+'">';
        extra_field +='</div>';
        extra_field +='</div>';

        $("#extras_row").append(extra_field);
        extra_count += 1;
        $("#extra_fields").val(extra_count);
        console.log('luego de añadir ' +extra_count);
    });


</script>


<?php $this->stop() ?>



