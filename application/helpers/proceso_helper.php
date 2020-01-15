<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/09/2017
 * Time: 2:38 PM
 */


function proyecto_por_id($id){
	// Get a reference to the controller object
	$CI = get_instance();
	// You may need to load the model if it hasn't been pre-loaded
	$CI->load->model('Proceso_model');
	// Call a function of the model
	$proyecto = $CI->Proceso_model->proyecto_por_id($id);
	$nombre_proyecto = $proyecto->row();
	echo $nombre_proyecto->nombre_proyecto;
}
function tipo_casa_por_id($id){
	// Get a reference to the controller object
	$CI = get_instance();
	// You may need to load the model if it hasn't been pre-loaded
	$CI->load->model('Proceso_model');
	// Call a function of the model
	$tipo_casa = $CI->Proceso_model->tipo_casa_por_id($id);
	$nombre_tipo_casa = $tipo_casa->row();
	echo $nombre_tipo_casa->nombre_casa;
}
function lleno_master_1($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_1 = $CI->Formularios_model->lleno_master_1($proceso);
    return $formulario_1;
}
function lleno_master_2($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_2 = $CI->Formularios_model->lleno_master_2($proceso);
    return $formulario_2;
}
function lleno_master_3($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_3 = $CI->Formularios_model->lleno_master_3($proceso);
    return $formulario_3;
}
function lleno_master_4($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_4 = $CI->Formularios_model->lleno_master_4($proceso);
    return $formulario_4;
}
function lleno_master_5($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_5 = $CI->Formularios_model->lleno_master_5($proceso);
    return $formulario_5;
}
function lleno_master_6($proceso){
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_6 = $CI->Formularios_model->lleno_master_6($proceso);
    return $formulario_6;
}


function color_estado_proceso($id){
    $ci =& get_instance();
    $ci->load->model('Proceso_model');
    $proceso =$ci->Proceso_model->get_proceso_by_id($id);
    $proceso = $proceso->row();
    $color_class="";
    if($proceso->proceso_estado =='activo'){
        $color_class = "success";
    }
    if($proceso->proceso_estado  =='inactivo'){
        $color_class = "danger";
    }

    return $color_class;
}

function no_formatear_extra($valor_extra){
    if($valor_extra == 'Sin costo'){
        echo '';
    }else{
        echo 'extra_precio money';
    }
}
?>