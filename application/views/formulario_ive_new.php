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

//declaracion de campos


$genero_m = array(
    'type' => 'text',
    'name' => 'genero',
    'id' => 'genero_m',
    'value' => 'm',
    'class' => 'flat',
    'required' => 'required'
);
$genero_f = array(
    'type' => 'text',
    'name' => 'genero',
    'id' => 'genero_f',
    'value' => 'f',
    'class' => 'flat',
    'required' => 'required'
);
$lugar_emision_dpi_departamento = array(
    'type' => 'text',
    'name' => 'lugar_emision_dpi_departamento',
    'id' => 'lugar_emision_dpi_departamento',
    'placeholder' => 'Departamento:',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$lugar_emision_dpi_municipio = array(
    'type' => 'text',
    'name' => 'lugar_emision_dpi_municipio',
    'id' => 'lugar_emision_dpi_municipio',
    'placeholder' => 'Municipio:',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$lugar_emision_dpi_pais = array(
    'type' => 'text',
    'name' => 'lugar_emision_dpi_pais',
    'id' => 'lugar_emision_dpi_pais',
    'placeholder' => 'pais:',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);

$condicion_migratoria = array(
    'name' => 'condicion_migratoria',
    'id' => 'condicion_migratoria',
    'placeholder' => 'estado',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$condicion_migratoria_options = array(
    'na' => 'No aplica',
    'residente temporal' => 'Residente temporal',
    'residente permanente' => 'Residente permanente',
    'persona en transito' => 'Persona en transito',
    'turista o visitante' => 'Turista o visitante',
    'otro' => 'Otro',
);
$condicion_migratoria_otro = array(
    'type' => 'text',
    'name' => 'condicion_migratoria_otro',
    'id' => 'condicion_migratoria_otro',
    'placeholder' => 'Otro',
    'class' => 'form-control has-feedback-left ',
    // 'required' => 'required'
);
$pj_telefono_linea_fija = array(
    'type' => 'text',
    'name' => 'pj_telefono_linea_fija',
    'id' => 'pj_telefono_linea_fija',
    'placeholder' => 'Linea fija',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$pj_telefono_celular = array(
    'type' => 'text',
    'name' => 'pj_telefono_celular',
    'id' => 'pj_telefono_celular',
    'placeholder' => 'Linea fija',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$zona_persona = array(
    'name' => 'zona_persona',
    'id' => 'zona_persona',
    'placeholder' => 'zona',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$departamento_persona = array(
    'name' => 'departamento_persona',
    'id' => 'departamento_persona',
    'placeholder' => 'Departamento',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$municipio_perosona = array(
    'name' => 'municipio_trabajo',
    'id' => 'municipio_trabajo',
    'placeholder' => 'Municipio',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$pais_persona = array(
    'name' => 'pais_persona',
    'id' => 'pais_persona',
    'placeholder' => 'Pais',
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
$puesto_trabajo = array(
    'name' => 'puesto_trabajo',
    'id' => 'puesto_trabajo',
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
$direccion_trabajo = array(
    'name' => 'direccion_trabajo',
    'id' => 'direccion_trabajo',
    'placeholder' => 'Dirección:',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$zona_trabajo = array(
    'name' => 'zona_trabajo',
    'id' => 'zona_trabajo',
    'placeholder' => 'Zona:',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$departamento_trabajo = array(
    'name' => 'departamento_trabajo',
    'id' => 'departamento_trabajo',
    'placeholder' => 'Departamento:',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$municipio_trabajo = array(
    'name' => 'municipio_trabajo',
    'id' => 'municipio_trabajo',
    'placeholder' => 'Municipio:',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$pais_trabajo = array(
    'name' => 'pais_trabajo',
    'id' => 'pais_trabajo',
    'placeholder' => 'Pais:',
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
$trabajo_actividad_economica = array(
    'type' => 'text',
    'name' => 'trabajo_actividad_economica',
    'id' => 'actividad_economica',
    'placeholder' => 'Nombre proveedor',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$trabajo_no_agencias= array(
    'name' => 'trabajo_no_agencias',
    'id' => 'trabajo_no_agencias',
    'placeholder' => 'Numero estimado de empleados',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$trabajo_no_empleados = array(
    'name' => 'trabajo_no_empleados',
    'id' => 'trabajo_no_empleados',
    'placeholder' => 'Numero estimado de empleados',
    'type' => 'text',
    'class' => 'form-control has-feedback-left',
    'required' => 'required'
);
$nombre_proveedor1 = array(
    'type' => 'text',
    'name' => 'nombre_proveedor1',
    'id' => 'nombre_proveedor1',
    'placeholder' => 'Nombre proveedor',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$pais_proveedor1 = array(
    'type' => 'text',
    'name' => 'pais_proveedor1',
    'id' => 'pais_proveedor1',
    'placeholder' => 'Pais proveedor',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$nombre_proveedor2 = array(
    'type' => 'text',
    'name' => 'nombre_proveedor2',
    'id' => 'nombre_proveedor2',
    'placeholder' => 'Nombre proveedor',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$pais_proveedor2 = array(
    'type' => 'text',
    'name' => 'pais_proveedor2',
    'id' => 'pais_proveedor2',
    'placeholder' => 'Pais proveedor',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$nombre_cliente1 = array(
    'type' => 'text',
    'name' => 'nombre_cliente1',
    'id' => 'nombre_cliente1',
    'placeholder' => 'Nombre cliente',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$pais_cliente1 = array(
    'type' => 'text',
    'name' => 'pais_cliente1',
    'id' => 'pais_cliente1',
    'placeholder' => 'Pais cliente',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$nombre_cliente2 = array(
    'type' => 'text',
    'name' => 'nombre_cliente2',
    'id' => 'nombre_cliente2',
    'placeholder' => 'Nombre cliente',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);
$pais_cliente2 = array(
    'type' => 'text',
    'name' => 'pais_cliente2',
    'id' => 'pais_cliente2',
    'placeholder' => 'Pais cliente',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);

$ingreso_egreso_persona = array(
    'name' => 'five_ingreso_egreso_persona',
    'id' => 'five_ingreso_egreso_persona',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);

$ingreso_egreso_persona_options = array(
    'Persona individual' => 'Persona individual',
    'Persona juridica' => 'Persona juridica',
);

$ingreso_egreso_persona = array(
    'type' => 'text',
    'name' => 'five_ingresos_moneda',
    'id' => 'five_ingresos_moneda',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);

$ingreso_egreso_persona_options = array(
    'Persona individual' => 'Persona individual',
    'Persona juridica' => 'Persona juridica',
);


$descripcion_servicio = array(
    'type' => 'text',
    'name' => 'descripcion_servicio',
    'id' => 'descripcion_servicio',
    'placeholder' => 'Descripción del servicio',
    'class' => 'form-control has-feedback-left ',
    'required' => 'required'
);

$transferencia_fondos_s = array(
    'type' => 'text',
    'name' => 'transferencia_fondos',
    'id' => 'transferencia_fondos_s',
    'value' => 's',
    'class' => 'flat',
    'required' => 'required'
);
$transferencia_fondos_n = array(
    'type' => 'text',
    'name' => 'transferencia_fondos',
    'id' => 'transferencia_fondos_n',
    'value' => 'n',
    'class' => 'flat',
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
                        <form class="form-horizontal form-label-left input_mask"
                              action="<?php echo base_url(); ?>formulario/guardar_ive" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="x_title">
                                    <h2>DATOS PERSONALES DEL SOLICITANTE / CLIENTE</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <!--<div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                        <label>Tipo de Persona:</label>
                                        <p>
                                            Individual (PI):
                                            <input type="radio" class="flat" name="tipo_persona" id="tipo_personapi"
                                                   value="pi" checked="" required/>
                                            Jurídica (PJ)
                                            <input type="radio" class="flat" name="tipo_persona" id="tipo_personapj"
                                                   value="pj"/>
                                        </p>
                                    </div>-->
                                    <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                        <label>Género:</label>
                                        <p>
                                            M:
                                            <?php echo form_radio($genero_m); ?>
                                            F:
                                            <?php echo form_radio($genero_f); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Documento de identificación lugar de emisión</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Departamento:</label>
                                        <?php echo form_input($lugar_emision_dpi_departamento); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nacionalidad">Municipio</label>
                                        <?php echo form_input($lugar_emision_dpi_municipio); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Pais</label>
                                        <?php echo form_input($lugar_emision_dpi_pais); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-4 col-xs-12 form-group has-feedback">
                                        <label>Condicion migratoria si aplica</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Condición migratoria</label>
                                        <?php echo form_dropdown($condicion_migratoria, $condicion_migratoria_options) ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="nacionalidad">Otro</label>
                                        <?php echo form_input($condicion_migratoria_otro); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Fecha nacimiento (PI) creación o
                                            constitución (PJ)</label>
                                        <?php echo form_input($fecha_nacimiento_creacion); ?>
                                        <span class="fa fa fa-calendar form-control-feedback left"
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
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fecha_nacimiento_creacion">Teléfono fijo</label>
                                        <?php echo form_input($pj_telefono_linea_fija); ?>
                                        <span class="fa fa-phone form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Celular</label>
                                        <?php echo form_input($pj_telefono_celular); ?>
                                        <span class="fa fa-mobile form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($zona_persona); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($municipio_perosona); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($departamento_persona); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_persona); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
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
                                            <input type="radio" class="flat" name="fuente_ingreso"
                                                   id="fuentes_ingresord"
                                                   value="Relación de dependencia"/>
                                            Negocio propio
                                            <input type="radio" class="flat" name="fuente_ingreso"
                                                   id="fuentes_ingresonp"
                                                   value="Negocio Propio" checked="" required/>
                                            Otras (ir a numeral 5.1.2)
                                            <input type="radio" class="flat" name="fuente_ingreso"
                                                   id="fuentes_ingresoo"
                                                   value="Otras"/>
                                        </p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Nombre de empresa/institución donde trabaja o del
                                            negocio:</label>
                                        <?php echo form_input($lugar_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="otra_nacionalidad">Puesto o cargo que desempeña:</label>
                                        <?php echo form_input($puesto_trabajo); ?>
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
                                        <?php echo form_input($direccion_trabajo); ?>
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
                                        <?php echo form_input($pais_trabajo); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="fuente_ingrersos_adicional">Otras fuentes o ingresos adicionales
                                            especificar:</label>
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
                                        <?php echo form_input($direccion_np); ?>
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
                                    <h2>Información persona individual con negocio propio o de la personas
                                        jurídica:</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="actividad_nppj">Actividad económica en que la entidad, negocio o
                                            empresa se desarrolla</label>
                                        <?php echo form_input($actividad_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">No. de subsidiarias, agencias, oficinas, etc.</label>
                                        <?php echo form_input($agencias_nppj); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="agencias_nppj">No. estimado de empleados que laboran rn la
                                            entidad</label>
                                        <?php echo form_input($trabajo_no_empleados); ?>
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Proveedores</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                        <label for="agencias_nppj">Nombre proveedor</label>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                        <label for="agencias_nppj">Pais ubicación proveedor</label>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                        <label for="agencias_nppj">Nombre cliente</label>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group ">
                                        <label for="agencias_nppj">Pais del cliente</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_proveedor1); ?>
                                        <span class="fa  fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_proveedor1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_cliente1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_cliente1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_proveedor2); ?>
                                        <span class="fa  fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_proveedor2); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_cliente2); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_cliente2); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Ingresos egresos mensuales</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_proveedor1); ?>
                                        <span class="fa  fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_proveedor1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($nombre_cliente1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <?php echo form_input($pais_cliente1); ?>
                                        <span class="fa fa-file form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Rango</td>
                                                    <td>Moneda</td>
                                                    <td>Ingresos</td>
                                                    <td>Egresos</td>
                                                </tr>
                                                <tr>
                                                    <td>0.00 - 3,000.00</td>
                                                    <td><input type="text" name="moneda_pi_r1" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r1"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r1"/></td>
                                                </tr>
                                                <tr>
                                                    <td>3,000.01 - 10,000.00</td>
                                                    <td><input type="text" name="moneda_pi_r2" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r2"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r2"/></td>
                                                </tr>
                                                <tr>
                                                    <td>10,000.01 - 50,000.00</td>
                                                    <td><input type="text" name="moneda_pi_r3" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r3"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r3"/></td>
                                                </tr>
                                                <tr>
                                                    <td>50,000.01 - 100,000.00</td>
                                                    <td><input type="text" name="moneda_pi_r4" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r4"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r4"/></td>
                                                </tr>
                                                <tr>
                                                    <td>100,000.01 - 200,000.00</td>
                                                    <td><input type="text" name="moneda_pi_r5" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r5"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r5"/></td>
                                                </tr>
                                                <tr>
                                                    <td>200,000.01 - hasta</td>
                                                    <td><input type="text" name="moneda_pi_r6" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pi" value="ingreso_pi_r6"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pi" value="egreso_pi_r6"/></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group ">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Rango</td>
                                                    <td>Moneda</td>
                                                    <td>Ingresos</td>
                                                    <td>Egresos</td>
                                                </tr>
                                                <tr>
                                                    <td>0.00 - 3,000.00</td>
                                                    <td><input type="text" name="moneda_pj_r1" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r1"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r1"/></td>
                                                </tr>
                                                <tr>
                                                    <td>3,000.01 - 10,000.00</td>
                                                    <td><input type="text" name="moneda_pj_r2" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r2"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r2"/></td>
                                                </tr>
                                                <tr>
                                                    <td>10,000.01 - 50,000.00</td>
                                                    <td><input type="text" name="moneda_pj_r3" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r3"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r3"/></td>
                                                </tr>
                                                <tr>
                                                    <td>50,000.01 - 100,000.00</td>
                                                    <td><input type="text" name="moneda_pj_r4" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r4"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r4"/></td>
                                                </tr>
                                                <tr>
                                                    <td>100,000.01 - 200,000.00</td>
                                                    <td><input type="text" name="moneda_pj_r5" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r5"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r5"/></td>
                                                </tr>
                                                <tr>
                                                    <td>200,000.01 - hasta</td>
                                                    <td><input type="text" name="moneda_pj_r6" class="form-control"></td>
                                                    <td>
                                                        <input type="radio" class="flat" name="ingreso_pj" value="ingreso_pj_r6"/></td>
                                                    <td><input type="radio" class="flat" name="egreso_pj" value="egreso_pj_r6"/></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h2>Datos del producto o servicio solicitado</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="producto_servicio">Descripción datos generales del producto o servicio</label>
                                       <input type="text" class="form-control" placeholder="" name="producto_servicio" id="producto_servicio">
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label for="procedencia_fondos">Procedencia odigen de fondos</label>
                                        <input type="text" class="form-control" placeholder="" name="procedencia_fondos" id="procedencia_fondos">
                                        <span class="fa fa-map-marker form-control-feedback left"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Realizara trasferencia o traslado de fondos</label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="transferencia"
                                                   id="fuentes_ingresord"
                                                   value="Relación de dependencia"/>
                                            No:
                                            <input type="radio" class="flat" name="transferencia"
                                                   id="fuentes_ingresonp"
                                                   value="Negocio Propio" checked="" required/>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 form-group has-feedback">
                                        <label>Persona politicamente expuesta</label>
                                        <p>
                                            Si:
                                            <input type="radio" class="flat" name="pep"
                                                   id="fuentes_ingresord"
                                                   value="Relación de dependencia"/>
                                            No:
                                            <input type="radio" class="flat" name="pep"
                                                   id="fuentes_ingresonp"
                                                   value="Negocio Propio" checked="" required/>
                                        </p>
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



