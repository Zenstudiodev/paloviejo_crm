<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 23/05/2017
 * Time: 2:35 PM
 */



function id_proyecto_to_nombre($id){
    $ci =& get_instance();
    $ci->load->model('admin_model');
    $proyecto =$ci->admin_model->get_proyecto_by_id($id);
    if($proyecto){
        $proyecto = $proyecto->row();
        $proyecto_name = $proyecto->nombre_proyecto;
    }else{
        $proyecto_name ='';
    }

    return$proyecto_name;
}
function id_casa_to_lote($id){
    $ci =& get_instance();
    $ci->load->model('admin_model');
    $casa =$ci->admin_model->get_casa_by_id($id);
    if($casa){
        $casa = $casa->row();
        $lote_casa = $casa->lote;
    }else{
        $lote_casa ='';
    }

    return $lote_casa;
}

?>