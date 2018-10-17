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

$nombre = "Juan Lopez";
$edad = '28';
$estado_civil ='soltero';
$nacionalidad = 'guatemalteco';
$prfesion ='Comerciante';
$direccion ='17 AVE. 12-10 ZONA 11 COLONIA MIRAFLORES 1';
$dpi ='1576561951401';
$dpilt='mil quinientos setenta y seis, cincuenta y seis mil ciento noventa y cinco, catorce cero uno';
?>

<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url(); ?>ui/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start('page_content') ?>


<!-- page content -->
<div class="right_col" role="main">
    <div id="sib_1">


        <h1>CARTA DE INTENCION DE CONTRATO.</h1>
        <p>
            Los suscritos, firmamos la presente carta de intención de contrato con base a las siguientes estipulaciones y condiciones:
        </p>
        <p>
            <span class="bold"> YO: <?php echo  $nombre; ?></span> de <?php echo  $edad; ?> años de edad, <?php echo  $estado_civil; ?>, <?php echo  $nacionalidad; ?>, <?php echo  $prfesion; ?>, con domicilio <?php echo  $direccion; ?>. Me identifico con DPI Número: <span id="dpi_en_letras"></span>, (<?php echo  $dpi; ?>). Quien podrá ser denominado como <span class="bold"> “EL CLIENTE”.</span>
        </p>


        <p><span class="bold">YO: JORGE OSWALDO GALINDO MORALES</span>, Representante Legal de la entidad Palo Viejo, Sociedad Anónima, quien podrá ser identificado como <span class="bold">“LA PROPIETARIA”.</span>
    </p>
    <p>
        <span class="bold">OBJETO:</span> Carta de intención de compra venta de terreno bajo condición de Construcción de Vivienda.
    </p>
    <p>IDENTIFICACION DEL INMUEBLE: Casa No. 21 de Residenciales Arcos de Santa María Fase I.<br>
    PRECIO: Q.100, 000.-<br>
    FORMA DE PAGO: Enganche Q. 30,500.-<br>
    FINANCIAMIENTO: Q. 69,500.-<br>
    ARRAS Q.25, 000.-
    </p>
    <p>
        <span class="bold">CONDICIONES: </span>a) el contrato se formalizará hasta que “EL CLIENTE” no tenga pagos pendientes con La Propietaria; b) se tendrá por rescindido la presente intención, si la cliente, desiste, abandona, incumple cualquier condición acordada; c) La Propietaria queda autorizada en forma exclusiva para designar a la entidad Constructora que deba realizar los trabajos de construcción en el bien inmueble objeto de la presente carta; d) No se formalizará el contrato de compra venta sin construcción, en virtud que el proyecto de terreno y vivienda son una unidad dentro del Residencial; e) No se formalizará el contrato si El Cliente no acepta a la entidad Constructora designada por la Propietaria; f)  El propietario, dará por rescindido, terminado o cancelado en forma unilateral la presente carta sin su responsabilidad por cualquier incumplimiento por parte de El Cliente a formalizar el contrato; g) Se pacta que en caso de incumplimiento por parte de El Cliente a la celebración del contrato de compra venta , pagará en concepto de arras a título de daños y perjuicios la cantidad de Veinticinco mil quetzales (Q. 25,000.00) que podrán ser deducidos de las sumas entregadas por El Cliente a la Propietaria;

    h) La presentes condiciones quedarán sin efecto legal alguno si El Cliente no acepta la designación de la entidad Constructora designada   por;   La   Propietaria  i) Cualquier sobrecosto originado por cambios en las leyes tributarias y económicas del país que afecten la presente intención de contrato será por cuenta de El Cliente.
    Los comparecientes ratificamos y aceptamos la presente carta de intención de contrato firmando al pie de la presente.
    En la ciudad de Guatemala el día seis de septiembre del año dos mil dieciséis.
    </p>

        <table class="text-center">
            <tr>
                <td>F: ______________________ </td>
                <td>F: ______________________ </td>
            </tr>
            <tr>
                <td>LA PROPIETARIA </td>
                <td>EL CLIENTE</td>
            </tr>
        </table>
    </div>
</div>

<!-- /page content -->
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
<script src="<?php echo base_url(); ?>/ui/build/js/numeros_a_letras.js"></script>
<script>
var dpi_en_letras;
var dpi;

dpi = parseFloat(<?php echo $dpi?>).toFixed(2);
dpi_en_letras = covertirNumLetras(dpi);
    console.log(dpi_en_letras);
$("#dpi_en_letras").html(dpi_en_letras);
</script>
<?php $this->stop() ?>





