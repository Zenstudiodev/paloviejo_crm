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

?>