<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 23/05/2017
 * Time: 2:35 PM
 */

function compobarSesion()
{
    $ci =& get_instance();
    $data = array();
    //si esta  logueado tomar datos de usuario desde la sesión
    if (isset($ci->session->userdata['logged_in'])) {
        $data['user_id'] = $ci->session->userdata['logged_in']['id'];
        $data['username'] = $ci->session->userdata['logged_in']['username'];
        $data['email'] = $ci->session->userdata['logged_in']['email'];
        $data['nombre'] = $ci->session->userdata['logged_in']['nombre'];
        $data['rol'] = $ci->session->userdata['logged_in']['rol'];
    } else {
        redirect('/login', 'refresh');
    }
    return $data;

}

function puede_ver($rol, $roles)
{
    /**
     * listado de roles
     * -developer 0
     * -administrador 1
     * -gerente de operaciones 2
     * -gerente de planificacion 3
     * -gerente genera 4
     * -gerente de construccion 5
     * -gerente de ventas 6
     * -ventas 7
     * -coordinacion de operaciones 8
     * -planificacion 9
     * -creditos 10
     * -pagos 11
     */
    $acceso = '';

    switch ($rol) {
        case 'developer':
            if (in_array('0', $roles)) {
                if ($rol == 'developer') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'administrador':
            if (in_array('1', $roles)) {
                if ($rol == 'administrador') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente de operaciones':
            if (in_array('2', $roles)) {
                if ($rol == 'gerente de operaciones') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente de planificacion':
            if (in_array('3', $roles)) {
                if ($rol == 'gerente de planificacion') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente general':
            if (in_array('4', $roles)) {
                if ($rol == 'gerente general') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente de construccion':
            if (in_array('5', $roles)) {
                if ($rol == 'gerente de construccion') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente de ventas':
            if (in_array('6', $roles)) {
                if ($rol == 'gerente de ventas') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'ventas':
            if (in_array('7', $roles)) {
                if ($rol == 'ventas') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'coordinacion de operaciones':
            if (in_array('8', $roles)) {
                if ($rol == 'coordinacion de operaciones') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'planificacion':
            if (in_array('9', $roles)) {
                if ($rol == 'planificacion') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'creditos':
            if (in_array('10', $roles)) {
                if ($rol == 'creditos') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'pagos':
            if (in_array('11', $roles)) {
                if ($rol == 'pagos') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
    }
return $acceso;
}

function print_contenido($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function id_to_nombre($id){
    $ci =& get_instance();
    $ci->load->model('User');
    $user_data =$ci->User->userData($id);
    if($user_data){
        $user_data = $user_data->row();
        $user_name = $user_data->nombre;
    }else{
        $user_name =0;
    }

    return$user_name;
}

?>