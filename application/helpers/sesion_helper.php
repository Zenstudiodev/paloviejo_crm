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
     * -crmadmin 1
     * -gerente 2
     * -gerenteventas 3
     * -ventas 4
     * -cordinador_operaciones 5
     * -planificacion 6
     * -creditos 7
     * -pagos 8
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
        case 'crmadmin':
            if (in_array('1', $roles)) {
                if ($rol == 'crmadmin') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerente':
            if (in_array('2', $roles)) {
                if ($rol == 'gerente') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'gerenteventas':
            if (in_array('3', $roles)) {
                if ($rol == 'gerenteventas') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'ventas':
            if (in_array('4', $roles)) {
                if ($rol == 'ventas') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'cordinador_operaciones':
            if (in_array('5', $roles)) {
                if ($rol == 'cordinador_operaciones') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'planificacion':
            if (in_array('6', $roles)) {
                if ($rol == 'planificacion') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'creditos':
            if (in_array('7', $roles)) {
                if ($rol == 'creditos') {
                    $acceso = true;
                } else {
                    $acceso = false;
                }
            }
            break;
        case 'pagos':
            if (in_array('8', $roles)) {
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
?>