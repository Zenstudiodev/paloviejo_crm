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



if ($formulario_ive) {
    $formulario_ive = $formulario_ive->row();

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

}
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
<!-- iCheck -->
<link href="<?php echo base_url(); ?>ui/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>FORMULARIO IVE</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--Datos generales  pagina 1-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FORMULARIO PARA INICIO DE RELACIONES</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left"
                              action="<?php echo base_url(); ?>formulario/guardar_ive"
                              method="post">
                            <?php
                            $lugar_documento = array(
                                'type' => 'text',
                                'name' => 'lugar_documento',
                                'id' => 'lugar_documento',
                                'placeholder' => 'Lugar:',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $fecha_documento = array(
                                'type' => 'text',
                                'name' => 'fecha_documento',
                                'id' => 'fecha_documento',
                                'placeholder' => 'Fecha:',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $nombre_compania = array(
                                'type' => 'text',
                                'name' => 'nombre_compania',
                                'id' => 'nombre_compania',
                                'placeholder' => 'Nombre compañia:',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $nombre_agecia = array(
                                'type' => 'text',
                                'name' => 'nombre_agecia',
                                'id' => 'nombre_agecia',
                                'placeholder' => 'Nombre agencia:',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $codigo_agecia = array(
                                'type' => 'text',
                                'name' => 'codigo_agecia',
                                'id' => 'codigo_agecia',
                                'placeholder' => 'Código agencia:',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $nombre_competo_razon_social = array(
                                'name' => 'nombre_competo_razon_social',
                                'id' => 'nombre_competo_razon_social',
                                'placeholder' => 'Nombre Completo o Razón Social y Nombre Comercial:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left ',
                                'required' => 'required'
                            );
                            $edad = array(
                                'name' => 'edad',
                                'id' => 'edad',
                                'placeholder' => 'Edad',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $nit = array(
                                'name' => 'nit',
                                'id' => 'nit',
                                'placeholder' => 'Nit',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $razon_social = array(
                                'name' => 'razon_social_nombre_comercial',
                                'id' => 'razon_social_nombre_comercial',
                                'placeholder' => 'Razón Social/Nombre Comercial (Persona jurídica):',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $fecha_nacimiento_creacion = array(
                                'name' => 'fecha_nacimiento_creacion',
                                'id' => 'fecha_nacimiento_creacion',
                                'placeholder' => 'Fecha nacimiento (PI) creación o constitución (PJ) (dd/mm/aaaa):',
                                'type' => 'date',
                                'data-date-format' => 'DD MMMM YYYY',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $nacionalidad = array(
                                'name' => 'nacionalidad',
                                'id' => 'nacionalidad',
                                'placeholder' => 'Nacionalidad (PI)/País de Constitución (PJ)',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $otra_nacionalidad = array(
                                'name' => 'otra_nacionalidad',
                                'id' => 'otra_nacionalidad',
                                'placeholder' => ' Otra nacionalidad (PI):',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $si_es_neegativo_nombre_completo = array(
                                'name' => 'si_es_neegativo_nombre_completo',
                                'id' => 'si_es_neegativo_nombre_completo',
                                'placeholder' => 'Si la respuesta anterior es negativa, proporcionar el nombre completo de la persona y/o razón social de la entidad en nombre de quien actúa:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $lugar_trabajo = array(
                                'name' => 'lugar_trabajo',
                                'id' => 'lugar_trabajo',
                                'placeholder' => 'Nombre de empresa/institución donde trabaja  o del negocio:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $puesto = array(
                                'name' => 'puesto',
                                'id' => 'puesto',
                                'placeholder' => 'Puesto o cargo que desempeña:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $telefono_trabajo = array(
                                'name' => 'telefono_trabajo',
                                'id' => 'telefono_trabajo',
                                'placeholder' => 'Número(s) de teléfono(s):',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $estado_civil = array(
                                'name' => 'estado_civil',
                                'id' => 'estado_civil',
                                'placeholder' => 'Estado cilvil',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $no_beneficiaro = array(
                                'name' => 'no_beneficiaro',
                                'id' => 'no_beneficiaro',
                                'placeholder' => 'Si la respuesta anterior es negativa, proporcionar el nombre completo de la persona y/o razón social de la entidad en nombre de quien actúa:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $telefono_negocio = array(
                                'name' => 'telefono_negocio',
                                'id' => 'telefono_negocio',
                                'placeholder' => 'Número(s) de teléfono(s):',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $direccion_negocio = array(
                                'name' => 'direccion_trabajo',
                                'id' => 'direccion_trabajo',
                                'placeholder' => ' Dirección o sede social completa de la empresa/institución donde trabaja o del negocio: (No. de calle o avenida, No. de casa, colonia, sector, lote, manzana, otros)',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $zona_trabajo = array(
                                'name' => 'zona_trabajo',
                                'id' => 'zona_trabajo',
                                'placeholder' => 'zona',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $departamento_trabajo = array(
                                'name' => 'departamento_trabajo',
                                'id' => 'departamento_trabajo',
                                'placeholder' => 'Departamento',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $municipio_trabajo = array(
                                'name' => 'municipio_trabajo',
                                'id' => 'municipio_trabajo',
                                'placeholder' => 'Municipio',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $pais_negocio = array(
                                'name' => 'pais_negocio',
                                'id' => 'pais_negocio',
                                'placeholder' => 'Pais',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $fuente_ingrersos_adicional = array(
                                'name' => 'fuente_ingrersos_adicional',
                                'id' => 'fuente_ingrersos_adicional',
                                'placeholder' => 'Otras fuentes o ingresos adicionales especificar:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $nit_np = array(
                                'name' => 'nit_np',
                                'id' => 'nit_np',
                                'placeholder' => 'NIT',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $telefono_np = array(
                                'name' => 'telefono_np',
                                'id' => 'telefono_np',
                                'placeholder' => 'Teléfono',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $direccion_np = array(
                                'name' => 'direccion_np',
                                'id' => 'direccion_np',
                                'placeholder' => ' Dirección o sede social completa de la empresa/institución donde trabaja o del negocio: (No. de calle o avenida, No. de casa, colonia, sector, lote, manzana, otros)',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $zona_np = array(
                                'name' => 'zona_np',
                                'id' => 'zona_np',
                                'placeholder' => 'zona',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $departamento_np = array(
                                'name' => 'departamento_np',
                                'id' => 'departamento_np',
                                'placeholder' => 'Departamento',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $municipio_np = array(
                                'name' => 'municipio_np',
                                'id' => 'municipio_np',
                                'placeholder' => 'Municipio',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $pais_np = array(
                                'name' => 'pais_np',
                                'id' => 'pais_np',
                                'placeholder' => 'Pais',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $actividad_nppj = array(
                                'name' => 'actividad_nppj',
                                'id' => 'actividad_nppj',
                                'placeholder' => 'Actividad económica en que la entidad, negocio o empresa se desarrolla',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $agencias_nppj = array(
                                'name' => 'agencias_nppj',
                                'id' => 'agencias_nppj',
                                'placeholder' => 'No. de subsidiarias, agencias, oficinas',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $origen_fondos = array(
                                'name' => 'origen_fondos',
                                'id' => 'origen_fondos',
                                'placeholder' => 'No. de subsidiarias, agencias, oficinas',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $nombre_institucion_pep = array(
                                'name' => 'nombre_institucion_pep',
                                'id' => 'nombre_institucion_pep',
                                'placeholder' => 'No. de subsidiarias, agencias, oficinas',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $nombre_institucion_pep = array(
                                'name' => 'nombre_institucion_pep',
                                'id' => 'nombre_institucion_pep',
                                'placeholder' => 'No. de subsidiarias, agencias, oficinas',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $puesto_pep = array(
                                'name' => 'puesto_pep',
                                'id' => 'puesto_pep',
                                'placeholder' => 'Puesto que desempeña:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $pais_institucion_pep = array(
                                'name' => 'pais_institucion_pep',
                                'id' => 'pais_institucion_pep',
                                'placeholder' => 'País de la institución o ente:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                                'required' => 'required'
                            );
                            $primer_apellido_parentesco_pep = array(
                                'name' => 'primer_apellido_parentesco_pep',
                                'id' => 'primer_apellido_parentesco_pep',
                                'placeholder' => 'Primer apellido: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $segndo_apellido_parentesco_pep = array(
                                'name' => 'segndo_apellido_parentesco_pep',
                                'id' => 'segndo_apellido_parentesco_pep',
                                'placeholder' => 'Segundo apellido: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $primer_nombre_parentesco_pep = array(
                                'name' => 'primer_nombre_parentesco_pep',
                                'id' => 'primer_nombre_parentesco_pep',
                                'placeholder' => 'Primer nombre: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $segndo_nombre_parentesco_pep = array(
                                'name' => 'segndo_nombre_parentesco_pep',
                                'id' => 'segndo_nombre_parentesco_pep',
                                'placeholder' => 'Segundo nombre: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $otro_nombre_parentesco_pep = array(
                                'name' => 'otro_nombre_parentesco_pep',
                                'id' => 'otro_nombre_parentesco_pep',
                                'placeholder' => 'Otro nombre: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $otro_nombre_parentesco_pep = array(
                                'name' => 'otro_nombre_parentesco_pep',
                                'id' => 'otro_nombre_parentesco_pep',
                                'placeholder' => 'Otro nombre: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $nombre_institucion_parentesco_pep = array(
                                'name' => 'nombre_institucion_parentesco_pep',
                                'id' => 'nombre_institucion_parentesco_pep',
                                'placeholder' => 'Nombre de la institución o ente donde trabaja: ',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $puesto_parentesco_pep = array(
                                'name' => 'puesto_parentesco_pep',
                                'id' => 'puesto_parentesco_pep',
                                'placeholder' => ' Puesto que desempeña:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $pais_institucion_parentesco_pep = array(
                                'name' => 'pais_institucion_parentesco_pep',
                                'id' => 'pais_institucion_parentesco_pep',
                                'placeholder' => 'País de la institución o ente:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $primer_apellido_asociado_pep = array(
                                'name' => 'primer_apellido_asociado_pep',
                                'id' => 'primer_apellido_asociado_pep',
                                'placeholder' => 'Primer apellido:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $segundo_apellido_asociado_pep = array(
                                'name' => 'segundo_apellido_asociado_pep',
                                'id' => 'segundo_apellido_asociado_pep',
                                'placeholder' => 'Segundo apellido:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $primer_nombre_asociado_pep = array(
                                'name' => 'primer_nombre_asociado_pep',
                                'id' => 'primer_nombre_asociado_pep',
                                'placeholder' => 'Primer nombre:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $segundo_nombre_asociado_pep = array(
                                'name' => 'segundo_nombre_asociado_pep',
                                'id' => 'segundo_nombre_asociado_pep',
                                'placeholder' => 'Segundo nombre:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $otro_nombre_asociado_pep = array(
                                'name' => 'otro_nombre_asociado_pep',
                                'id' => 'otro_nombre_asociado_pep',
                                'placeholder' => 'Otro nombre:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $puesto_asociado_pep = array(
                                'name' => 'puesto_asociado_pep',
                                'id' => 'puesto_asociado_pep',
                                'placeholder' => 'Nombre de la institución o ente donde trabaja:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $pais_asociado_pep = array(
                                'name' => 'pais_asociado_pep',
                                'id' => 'pais_asociado_pep',
                                'placeholder' => 'País de la institución o ente:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            $origen_bienes_asociado_pep = array(
                                'name' => 'origen_bienes_asociado_pep',
                                'id' => 'origen_bienes_asociado_pep',
                                'placeholder' => 'Indicar el origen o procedencia de su riqueza:',
                                'type' => 'text',
                                'class' => 'form-control has-feedback-left',
                            );
                            ?>

                            <form class="form-horizontal form-label-left input_mask">


                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Lugar</label>
                                        <?php echo form_input($lugar_documento); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nacionalidad">Fecha documento</label>
                                        <?php echo form_input($fecha_documento); ?>
                                        <span class="fa fa-calendar-o form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Nombre compañia o razon social</label>
                                        <?php echo form_input($nombre_compania); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Agencia</label>
                                        <?php echo form_input($nombre_agecia); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nacionalidad">Código de agencia</label>
                                        <?php echo form_input($codigo_agecia); ?>
                                        <span class="fa fa-calendar-o form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="x_title">
                                        <h2>DATOS DE LA PERSONA OBLIGADA (PO)</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <?php echo form_input($nombre_competo_razon_social); ?>
                                            <span class="fa fa-user form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="x_title">
                                        <h2>DATOS PERSONALES DEL SOLICITANTE / CLIENTE</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label>Tipo de Persona:</label>
                                            <p>
                                                Individual (PI):
                                                <input type="radio" class="flat" name="tipo_persona" id="tipo_personapi"
                                                       value="pi" checked="" required/>
                                                Jurídica (PJ)
                                                <input type="radio" class="flat" name="tipo_persona" id="tipo_personapj"
                                                       value="pj"/>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <label>Género:</label>
                                            <p>
                                                M:
                                                <input type="radio" class="flat" name="genero" id="genderM" value="M"
                                                       checked="" required/>
                                                F:
                                                <input type="radio" class="flat" name="genero" id="genderF" value="F"/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>Condición migratoria:
                                                <small>(Cuando aplique)</small>
                                            </label>
                                            <p>
                                                Residente temporal:
                                                <input type="radio" class="flat" name="condicion" id="genderM"
                                                       value="residente temporal"/>
                                                Residente permanente:
                                                <input type="radio" class="flat" name="condicion" id="genderM"
                                                       value="residente permanente"/>
                                                Persona en tránsito:
                                                <input type="radio" class="flat" name="condicion" id="genderF"
                                                       value="persona en transito"/>
                                            </p>
                                            <p>
                                                Turista o visitante:
                                                <input type="radio" class="flat" name="condicion" id="genderF"
                                                       value="turista o visitante"/>
                                                Permiso de trabajo:
                                                <input type="radio" class="flat" name="condicion" id="genderF"
                                                       value="permiso de trabajo"/>
                                                Permiso consular o similar:
                                                <input type="radio" class="flat" name="condicion" id="genderF"
                                                       value="permiso consular"/>
                                            </p>
                                            <p>
                                                Otros:
                                                <input type="radio" class="flat" name="condicion" id="genderF"
                                                       value="otro"/>
                                            </p>
                                            <p>
                                                <input type="text" class="form-control" placeholder="Especifique">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="fecha_nacimiento_creacion">Fecha nacimiento (PI) creación o constitución (PJ)</label>
                                            <?php echo form_input($fecha_nacimiento_creacion); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="nacionalidad">Nacionalidad (PI)/País de Constitución (PJ)</label>
                                            <?php echo form_input($nacionalidad); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="otra_nacionalidad">Otra nacionalidad (PI):</label>
                                            <?php echo form_input($otra_nacionalidad); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-sm-4 col-xs-12 form-group has-feedback">
                                            <label>El solicitante/cliente actúa en nombre propio (PI) o en beneficio de
                                                la entidad antes descrita (Rep. Legal):</label>
                                            <p>
                                                Si
                                                <input type="radio" class="flat" name="actua_en_nombre_propio" id="actua_en_nombre_propiosi"
                                                       value="si" required/>
                                                No
                                                <input type="radio" class="flat" name="actua_en_nombre_propio" id="actua_en_nombre_propiono"
                                                       value="no" required/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="otra_nacionalidad">Si la respuesta anterior es negativa, proporcionar el nombre completo de la persona y/o razón social de la entidad en nombre de quien actúa:</label>
                                            <?php echo form_input($si_es_neegativo_nombre_completo); ?>
                                            <span class="fa fa-map-marker form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>INFORMACIÓN ECONÓMICO-FINANCIERA DEL SOLICITANTE / CLIENTE</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Fuentes de ingreso:</label>
                                        <p>
                                            Relación de dependencia:
                                            <input type="radio" class="flat" name="fuentes_ingreso" id="fuentes_ingresord"
                                                   value="Relación de dependencia" />
                                            Negocio propio
                                            <input type="radio" class="flat" name="fuentes_ingreso" id="fuentes_ingresonp"
                                                   value="Negocio Propio" checked="" required/>
                                            Otras (ir a numeral 5.1.2)
                                            <input type="radio" class="flat" name="fuentes_ingreso" id="fuentes_ingresoo"
                                                   value="Otras"/>
                                        </p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Nombre de empresa/institución donde trabaja  o del negocio:</label>
                                        <?php echo form_input($lugar_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Puesto o cargo que desempeña:</label>
                                        <?php echo form_input($puesto); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Número(s) de teléfono(s):</label>
                                        <?php echo form_input($telefono_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($direccion_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($zona_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($municipio_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($departamento_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fuente_ingrersos_adicional">Otras fuentes o ingresos adicionales especificar:</label>
                                        <?php echo form_input($fuente_ingrersos_adicional); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Información persona individual con negocio propio:</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fuente_ingrersos_adicional">Nit</label>
                                        <?php echo form_input($nit_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fuente_ingrersos_adicional">Número de teléfono</label>
                                        <?php echo form_input($telefono_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($direccion_negocio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($zona_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($municipio_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($departamento_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_np); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Información persona individual con negocio propio o de la personas jurídica:</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="actividad_nppj">Actividad económica en que la entidad, negocio o empresa se desarrolla</label>
                                        <?php echo form_input($actividad_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">No. de subsidiarias, agencias, oficinas, etc.</label>
                                        <?php echo form_input($agencias_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>DATOS DEL PRODUCTO O SERVICIO SOLICITADO POR EL SOLICITANTE / CLIENTE</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Procedencia u origen de los fondos, valores o bienes para el inicio o durante la relación comercial</label>
                                        <?php echo form_input($agencias_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="traslado_fondos_valores_bienes">Realizará transferencias o traslado de fondos, valores o bienes: (Si es afirmativa, indicar la información siguiente)</label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="traslado_fondos_valores_bienes" id="traslado_fondos_valores_bienessi"
                                                   value="Si" />
                                            No:
                                            <input type="radio" class="flat" name="traslado_fondos_valores_bienes" id="traslado_fondos_valores_bienesno"
                                                   value="No" checked="" required/>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="transferencia_bienes">Las transferencias o traslado de fondos, valores o bienes se realizaran a nivel: </label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="transferencia_bienes" id="transferencia_bieness"
                                                   value="Si" />
                                            No:
                                            <input type="radio" class="flat" name="transferencia_bienes" id="transferencia_bienesn"
                                                   value="No" checked="" required/>
                                        </p>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>PERSONA EXPUESTA POLÍTICAMENTE (PEP) -Persona individual o Representante Legal de la persona jurídica-</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep">El solicitante (Persona individual o Representante Legal) es Persona Expuesta Políticamente (PEP): </label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="persona_pep" id="persona_peps"
                                                   value="Si" />
                                            No:
                                            <input type="radio" class="flat" name="persona_pep" id="persona_pepn"
                                                   value="No" checked="" required/>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Nombre de la institución o ente donde trabaja:</label>
                                        <?php echo form_input($agencias_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Puesto que desempeña:</label>
                                        <?php echo form_input($puesto_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">País de la institución o ente:</label>
                                        <?php echo form_input($pais_institucion_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep">El solicitante (Persona individual o Representante Legal)  tiene parentesco con una PEP:</label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="parentesco_pep" id="parentesco_peps"
                                                   value="Si" />
                                            No:
                                            <input type="radio" class="flat" name="parentesco_pep" id="parentesco_pepn
"
                                                   value="No" checked="" required/>
                                        </p>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Datos de la persona que desempeña el cargo público relevante:</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep"> Condición:</label>
                                        <p>
                                            Nacional:
                                            <input type="radio" class="flat" name="condicion_parentesco_pep" id="condicion_parentesco_peps" value="nacional" />
                                            Extranjera:
                                            <input type="radio" class="flat" name="condicion_parentesco_pep" id="condicion_parentesco_pepn" value="extranjera" checked="" required/>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Primer apellido: </label>
                                        <?php echo form_input($primer_apellido_parentesco_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Segundo apellido:</label>
                                        <?php echo form_input($pais_institucion_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Primer nombre:</label>
                                        <?php echo form_input($primer_nombre_asociado_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Segundo nombre:</label>
                                        <?php echo form_input($segundo_nombre_asociado_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">Otros nombres:</label>
                                        <?php echo form_input($otro_nombre_asociado_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep"> Género:</label>
                                        <p>
                                            M:
                                            <input type="radio" class="flat" name="condicion_parentesco_pep" id="condicion_parentesco_peps" value="nacional" />
                                            F:
                                            <input type="radio" class="flat" name="condicion_parentesco_pep" id="condicion_parentesco_pepn" value="extranjera" />
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nombre_institucion_parentesco_pep">Nombre de la institución o ente donde trabaja:</label>
                                        <?php echo form_input($nombre_institucion_parentesco_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="puesto_asociado_pep">Puesto que desempeña:</label>
                                        <?php echo form_input($puesto_parentesco_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="pais_institucion_pep">País de la institución o ente:</label>
                                        <?php echo form_input($pais_institucion_parentesco_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep"> Indicar parentesco:</label>
                                        <p>
                                            Padre:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_padre" value="Padre" />
                                            Madre:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_madre" value="Madre" />
                                            Hermano:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_hermano" value="Hermano" />
                                            Cónyuge:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_conyuge" value="Cónyuge" />
                                        </p>
                                        <p>
                                            Otro:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_otro" value="Otro" />
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep"> Género:</label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="asociado_pep" id="condicion_parentesco_peps" value="si" />
                                            No:
                                            <input type="radio" class="flat" name="asociado_pep" id="condicion_parentesco_pepn" value="no" />
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="persona_pep">Indicar motivos:</label>
                                        <p>
                                            Profesionales:
                                            <input type="radio" class="flat" name="motivos_asociado_pep" id="tipo_parenstesco_pep_padre" value="Padre" />
                                            Politicos:
                                            <input type="radio" class="flat" name="motivos_asociado_pep" id="tipo_parenstesco_pep_madre" value="Madre" />
                                            Hermano:
                                            <input type="radio" class="flat" name="motivos_asociado_pep" id="tipo_parenstesco_pep_hermano" value="Hermano" />
                                            Cónyuge:
                                            <input type="radio" class="flat" name="motivos_asociado_pep" id="tipo_parenstesco_pep_conyuge" value="Cónyuge" />
                                        </p>
                                        <p>
                                            Otro:
                                            <input type="radio" class="flat" name="tipo_parenstesco_pep" id="tipo_parenstesco_pep_otro" value="Otro" />
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nombre_institucion_parentesco_pep">Indicar el origen o procedencia de su riqueza</label>
                                        <?php echo form_input($origen_bienes_asociado_pep); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <?php
                                echo form_hidden('proceso_id', $proceso->id);
                                echo form_hidden('prospecto_id', $prospecto->id);

                                ?>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </div>

                            </form>
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
<!-- iCheck -->
<script src="<?php echo base_url(); ?>ui/vendors/iCheck/icheck.min.js"></script>
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


    $(document).ready(function () {
        //init_validator();
        $("input.flat")[0] && $(document).ready(function () {
            $("input.flat").iCheck({checkboxClass: "icheckbox_flat-green", radioClass: "iradio_flat-green"})
        });
    });


</script>


<?php $this->stop() ?>



