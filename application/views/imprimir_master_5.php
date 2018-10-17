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
    <div class="right_col" role="main">
        <h1 class="titulo_page_pr"><?php echo $formulario_2->fm_2_proyecto?></h1>
        <h2 class="sub_titulo_page_pr">
            EL PRECIO DE LA CASA <?php echo $formulario_2->fm_2_casa_no?> DE <?php echo $formulario_2->fm_2_proyecto?> DE   Q. 664,800.00
            “NO” INCLUYE:
        </h2>
        <ol>
            <li>
                Depósito y conexión de energía eléctrica (+-) Q.485.-</li>

            <li>Conexión de cable de T.V., línea telefónica según la empresa donde se contrate el servicio.

            <li>No incluye cualquier aumento al impuesto del IVA más del 12%, y otros impuestos nuevos que puedan existir antes de la escrituración final.

            <li>Comisiones bancarias u otros por desembolsos de créditos bancarios si los hubiera, así
                Como pólizas de seguros:
                <ol>


                    <li>Comisión Bancaria sobre el crédito bancario: En el Banco Industrial de Q.1, 200.00
                        una Sola vez.</li>
                    <li> Prima Anual del Seguro contra incendio y terremoto 0.35 % de la construcción en el
                        Banco Industrial: (+,-) Q.3, 600.00, se divide en 12 pagos mensuales de (+,-)
                        Q.300.00</li>
                    <li>  Avalúo Bancario: Q.1, 875.-</li>
                    <li> No incluye el 1% sobre el valor del financiamiento bancario (Q. 5,648.00), si éste
                        fuera de Banrural, correspondiente al seguro de caución un año por anticipado.</li>
                </ol>
            </li>

            <li>Si el crédito se tramite por medio del programa MI CASA EN GUATE, del Banco Industrial, este posee una comisión del 1.5% sobre el monto a financiar (Q. 8,472.00)</li>

            <li>Cualquier otra extra, ampliación, modificación en la construcción de la casa que se contrate de aquí en adelante, ni extra de terreno en la fracción No. 128 de Residenciales Arcos de Santa María Fase I, no incluida en el contrato inicial.</li>

            <li>Intereses por mora de 3.85 % mensual, en alguno de los pagos aquí descritos, y con una mora máxima de hasta 60 días calendario corridos en al menos uno de los pagos aquí establecidos, o intereses por extra financiamiento que en el futuro pudieran convenirse de mutuo acuerdo entre las dos partes contratantes.</li>

            <li>Churrasqueras, chimeneas, fuentes, búcaros, pérgolas, ménsulas, domos, gárgolas, capiteles, molduras, zócalos de piedra, nichos, cascadas, artesas, muros de contención, jardineras, tabiques, masetas, cornisas, filetes, pestañas, voladizos, macetones, plantas, jetinas, balcones, lámparas, cortinas, muebles y electrodomésticos.</li>

            <li>Calentadores de agua.</li>

            <li>Cisternas y bombas hidroneumáticas dentro del lote de la casa.</li>

            <li>No incluye el cambio de estilo de los gabinetes de cocina al del tipo Catedral (laqueados), ni de su tamaño estándar.</li>

            <li>No incluye costo por avalúo bancario o certificación.</li>

            <li>No incluye las ampliaciones extras, más allá de las dimensiones estándar de la casa, y conocidas por los compradores, excepto correr la casa un (1) metro hacia atrás y dejar la cocina tipo americano (sin muros).</li>

            <li>No incluye el cambio de la puerta principal a puerta de madera sólidas o con teleras.</li>

            <li>No incluye el cambio de las ventanas de PVC, a aluminios anodizados con vidrios obscuros.</li>

            <li>No incluye el costo por el cambio de ubicación de alguno de los closets de los dormitorios.</li>

            <li>No incluye el dormitorio de servicio con baño, ya que este modelo de casa no lo lleva.</li>

            <li>No incluye correr la construcción de la casa hacia el frente, desde donde se tiene prevista su ubicación.</li>

            <li>No incluye ventanas del tipo bay-window.</li>

            <li>No incluye los zócalos de piedra laja y/ó ladrillo en el exterior de la casa.</li>

            <li>No incluye closet de blancos o linos.</li>

            <li>No incluye azulejar la lavandería y la pila.</li>

            <li>Pago mensual (inicial) de Servicio de agua Q.196.-, por media paja de agua equivalentes a 30,000 litros por mes.</li>

            <li>Pago mensual (inicial) de Garita Principal de Seguridad Q.140.- (Palo Viejo, S.A. se reserva el derecho de poder modificar la cuota por incremento de costo de funcionamiento).</li>

            <li>ago mensual inicial de mantenimiento de áreas verdes Q.100.-</li>
        </ol>
    </div>

    <!-- /page content -->
<?php $this->stop() ?>

<?php $this->start('js_p') ?>

<?php $this->stop() ?>