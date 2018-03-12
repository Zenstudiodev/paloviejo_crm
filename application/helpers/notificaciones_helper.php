<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 23/05/2017
 * Time: 2:35 PM
 */

function Notificacion(){
    echo 'Tiene una notificación';
}

function supervisor($rol){
   $supervisor ='';

    switch ($rol) {
        case 'developer':
            $supervisor ='propio';
            break;
        case 'crmadmin':
            $supervisor ='propio';
            break;
        case 'gerente':
            $supervisor ='propio';
            break;
        case 'gerenteventas':
            $supervisor ='propio';
            break;
        case 'vendedor':
            $supervisor ='gerenteventas';
            break;
        case 'cordinador_operaciones':
            $supervisor ='propio';
            break;
        case 'planificacion':
            $supervisor ='gerenteventas';
            break;
        case 'creditos':
            $supervisor ='gerenteventas';
            break;
        case 'pagos':
            $supervisor ='gerenteventas';
            break;
    }
    return $supervisor;

}
?>