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

$nombre = "LUD-IÍM BRAIAN VILLATORO LOPEZ";
$edad = '28';
$estado_civil ='soltero';
$nacionalidad = 'guatemalteco';
$prfesion ='Odontólogo';
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


        <h1>CONTRATO PRIVADO DE CONSTRUCCION DE VIVIENDA</h1>
        <p>
            En la ciudad de Guatemala, departamento de Guatemala, el día: el día seis de septiembre del año dos mil dieciséis, en las oficinas de la entidad denominada <span class="bold">CONSTRUCCIONES DE CENTROAMERICA, SOCIEDAD ANÓNIMA,</span> ubicada en 8ª. Calle 20-06 Colonia El Mirador 1, zona 11, ciudad de Guatemala, comparecemos:
        </p>
        <p><span class="bold">A) PEDRO PABLO GALINDO MORALES</span>, quien dice ser de 43 años de edad, casado, guatemalteco,  Ingeniero Civil, de este domicilio, quien se identifica con Documento Personal de Identificación, Código Único de Identificación número Dos mil seiscientos setenta y dos, ochenta y seis mil quinientos cuarenta y seis, cero uno cero uno (2672 86546 0101) extendido por el Registro Nacional de las Personas de la República de Guatemala, quien actúa en su calidad de <span class="bold">GERENTE GENERAL Y REPRESENTANTE LEGAL</span> de la entidad <span class="bold">CONSTRUCCIONES DE CENTROAMERICA, SOCIEDAD ANONIMA,</span> representación que se encuentra documentada en acta notarial de fecha 01/09/2009, autorizada en esta ciudad, por la Notaria Mirna Liseth Hernández Vásquez, documento que se encuentra inscrito en el Registro Mercantil General de la República bajo número trecientos diecinueve mil, cuatrocientos treinta (319430), folio cuatrocientos sesenta y tres (463), libro  doscientos cuarenta y seis (246) de Auxiliares de Comercio; entidad que podrá ser denominada indistintamente como “LA CONSTRUCTORA.</p>


        <p><span class="bold">B)  Juan Lopez</span> de 28 años de edad, soltero, guatemalteco, Comerciante, con domicilio 17 AVE. 12-10 ZONA 11 COLONIA MIRAFLORES 1. Me identifico con DPI Número: mil quinientos setenta y seis, cincuenta y seis mil ciento noventa y cinco, catorce cero uno, (1576 56195 1401). Quien podrá ser denominado como <span class="bold">“EL CLIENTE”</span>. Los comparecientes celebramos Contrato Privado de Construcción de Vivienda de conformidad con los siguientes términos y condiciones:
    </p>
        <h1>I.- DE LA CONSTRUCCION:</h1>
    <p>
        Planta baja: Garage sin techar para dos o tres vehículos pequeños, con pérgola de madera y lamina de policarbonato para un vehículo de 3m x 5m, sala – comedor, en un solo ambiente, cocina con gabinetes en otro ambiente, dos dormitorios con closets, dos baños completos, lavandería techada con lamina de policarbonato transparente, con pila (sin azulejar), dos jardines interiores y jardín al frente y atrás de la casa.
    </p>
        <h1>II.-    DEL MONTO A PAGAR:</h1>
        <p>
            El monto de la obra contratada asciende a la cantidad de: Q.125, 000.- a cancelar por medio de financiamiento bancario.
        </p>
        <h1>III.-    PLAZO Y OTRAS CONDICIONES:</h1>
        <p>El plazo del presente contrato será por un plazo de 30 días a partir de la presente fecha. El presente contrato podrá ser prorrogado a petición de ambas partes, o en forma unilateral a criterio de la constructora por motivos de trabajos extras, mejoras o modificaciones en la construcción.</p>
        <p>Cualquier modificación, trabajos extras, cambios de orden de trabajos o ampliaciones modificara el valor de este contrato.</p>
        <p>Cualquier sobrecosto originado por cambios en las leyes tributarias y económicas del país que afecten el presente contrato será por cuenta de El Cliente.</p>
        <h1>IV.-     LUGAR PARA RECIBIR NOTIFICACIONES:</h1>
        <p>La Constructora señala lugar para recibir notificaciones o citaciones las oficinas de la   entidad ubicadas en: 8ª.  Calle 20-06, zona 11 Colonia El   Mirador I.</p>
        <p>
            El Cliente señala lugar para recibir notificaciones o citaciones el lugar de residencia ubicada en: 17 Ave. 12-10 Zona 11 colonia miraflores 1.
        </p>
        <h1>V.-    SOLUCIÓN DE CONTROVERSIAS:</h1>
        <p>
            Cualquier conflicto que se genere entre las partes por el presente contrato será sometido a los tribunales en materia civil y mercantil de la ciudad de Guatemala, ambas partes desde ya renuncian al fuero de su domicilio y se someten a los tribunales civiles y mercantiles de la ciudad de Guatemala, departamento de Guatemala.
        </p>
        <p>En la ciudad de Guatemala el día 7 de septiembre de 2018.</p>
        <table class="text-center">
            <tr>
                <td>F: ______________________ </td>
                <td>F: ______________________ </td>
            </tr>
            <tr>
                <td>EL CONSTRUCTOR </td>
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





