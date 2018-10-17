<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2018
 * Time: 5:15 PM
 */

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
    <div class="right_col master_print" role="main">
        <h1 class="titulo_page_pr"><?php echo $formulario_2->fm_2_proyecto?></h1>
        <table>
            <tbody>
            <tr>
                <td> DEL TERRENO DE LA CASA No. 128 DE<br>
                    RESIDENCIALES ARCOS DE SANTA MARÍA<br>
                    DATOS DE LA FINCA DE LA FRACCIÓN No. 128<br>
                    DE RESIDENCIALES ARCOS DE SANTA MARÍA
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>FINCA No.  1760<br>
                    FOLIO No.    260<br>
                    DEL LIBRO No. 144E DE SACATEPÉQUEZ</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td> ÁREA DEL TERRENO:<br>
                    FRENTE:<br>
                    FONDO:<br>
                    FORMA:
                </td>
                <td>
                    140.00 MTS.2 = 200.34 V2<br>
                    7:00 MTS. EN EL FRENTE<br>
                    20:00 MTS.  EN EL FONDO<br>
                    RECTÁNGULAR
                </td>
            </tr>
            </tbody>
        </table>
        <h2>OBSERVACIONES GENERALES</h2>
        <ol>
            <li>EL TERRENO DE LA CASA No. 128 DE RESIDENCIALES ARCOS DE SANTA MARÍA, TIENE UNA ÀREA DE: 140 METROS2: EQUIVALENTES A 200.34 VARAS2 Y ES DE FORMA RECTÁNGULAR LA CASA TIENE APROXIMADAMENTE 110 M2 DE CONSTRUCCIÓN.</li>

            <li>LA CONSTRUCCIÒN DE LA CASA CONSTA DE: PLANTA BAJA: GARAGE PARA DOS O TRES VEHICULOS PEQUEÑOS, SALA-COMEDOR EN UN SOLO AMBIENTE, COCINA CON GABINETES, LAVANDERIA TECHADA CON LOZA CON PILA SIN AZULEJAR, JARDINES AL FRENTE Y ATRÁS DE LA CASA, UN BAÑO DE VISITAS Y CUBO DE GRADAS. PLANTA ALTA: TRES DORMITORIOS CON CLOSETS, UN BAÑO COMPLETO.</li>

            <li>LA REFERENCIA DEL TIPO DE CAMBIO SE TOMARÀ DE LAS PUBLICACIONES DIARIA DEL BANCO DE GUATEMALA, EN LOS DIARIOS DEL PAÌS, DEL MERCADO BANCARIO, Y SE TOMARÀ COMO BASE SIEMPRE EL PROMEDIO PONDERADO EN LOS BANCOS DEL SISTEMA MENOS DIEZ CENTAVOS DE QUETZAL (-Q. 0.10), PARA CUALQUIER PAGO QUE SE QUISIERA HACER EN DÓLARES DE NORTEAMERICA (US$.). Y (-Q. 0.15) SI EL PAGO FUERA EN DÓLARES NORTEAMERICANOS (US$) EN EFECTIVO.</li>

            <li>TIEMPO MÁXIMO DE ENTREGA: 214 DÍAS CORRIDOS A PARTIR DE LA PRESENTE FECHA (SI NO HUBIERA MODIFICACIONES O EXTRAS NUEVAS A LA CASA). Y CONTRA LA CANCELACIÓN TOTAL DEL ENGANCHE, EL CRÉDITO BANCARIO Y TODOS LOS GASTOS Y EXTRAS RELACIONADOS CON ESTA VENTA.</li>

            <li>INTERESES POR MORA Y/O EXTRAFINANCIAMIENTO: 3.85 % MENSUAL SOBRE SALDOS DEUDORES MOROSOS, EN UNA MORA DE HASTA 60 DÍAS CALENDARIO CORRIDOS EN AL MENOS UNO DE LOS PAGOS DE ESTE CONTRATO, PREVIAMENTE ESTABLECIDOS, LUEGO DE LOS CUALES SE PROCEDERÁ A DAR POR FINALIZADO EL PRESENTE 	CONTRATO PREVIO EL COBRO DE LAS ARRAS Y OTROS GASTOS CORRESPONDIENTES.</li>

            <li>ARRAS: Q. 25,000. - MAS EL VALOR DE LAS EXTRAS SOLICITADAS, SI LAS HUBIERA Y EL VALOR DE LOS GASTOS DE ESCRITURACIÓN. SI EL CREDITO HIPOTECARIO NO ES APROBADO POR NINGUNA ENTIDAD BANCARIA, HABIENDO CUMPLIDO EL CLIENTE CON LA ENTREGA DE PAPELERIA SOLICITADA DENTRO DEL TIEMPO ESTABLECIDO (TOMANDO EN CUENTA QUE EL CLIENTE NO ES RESIDENTE, Y SI CUENTA CON PERMISO DE TRABAJO), LAS ARRAS NO SE HARAN EFECTIVAS A EXCEPCION DE LOS GASTOS ADMINISTRATIVOS DE Q. 11,000.00, MENOS EL 50% DE DESCUENTO QUEDANDO EN Q. 5,500.00.</li>

            <li>MULTA POR DÌA DE ATRASO EN LA ENTREGA DE LA CASA: Q. 25.00 DIARIOS. ÙNICAMENTE SI ES POR RESPONSABILIDAD DIRECTA DE LA EMPRESA, Y SI NO SE HUBIERA PEDIDO MODIFICACIONES O EXTRAS AL DISEÑO ORIGINAL DE LA CASA, QUE PUDIERAN RETRASAR LA CONSTRUCCIÓN DE LA MISMA, PARA LAS CUALES TUVIERON QUE HABER ACUERDOS PREVIOS A SU REALIZACIÓN POR ESCRITO.</li>

            <li>INDEXACIÓN: Q. 8.15 = $. 1.00.</li>

            <li>QUEDA A DISCRECIÓN DE LOS CONSTRUCTORES ACEPTAR O NO CUALQUIER EXTRA, MODIFICACIÓN, AMPLIACIÒN, REDUCCIÓN O CAMBIO SOLICITADO EN LA CONSTRUCCIÓN DE ESTRUCTURAS, ACABADOS, SERVICIOS, CONEXIONES, DETALLES O ELEMENTOS NO INCLUIDOS DENTRO DE ESTE CONTRATO, ASÌ COMO SU COSTO Y TIEMPO PARA REALIZARLAS, PUDIENDO ÈSTAS DE SER ACEPTADAS, RETRASAR EL TIEMPO DE ENTREGA DE LA CASA.</li>

            <li>SUCESOR: JOSE VICTOR PAR CALÁN QUIEN SE IDENTIFICAN CON NUMERO DE PASAPORTE: 000449752</li>
        </ol>

        <table>
            <tbody>
            <tr>
                <td></td>
                <td> RESIDENCIALES
                    ARCOS DE SANTA MARÍA I</td>
            </tr>
            <tr>
                <td>*FIRMA DE CONTRATO: MARTES 02 DE MAYO DEL 2017
                    HORA: 10:00 AM</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<?php $this->stop() ?>