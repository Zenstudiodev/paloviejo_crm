<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/09/2017
 * Time: 2:38 PM
 */


function proyecto_por_id($id)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Proceso_model');
    // Call a function of the model
    $proyecto = $CI->Proceso_model->proyecto_por_id($id);
    $nombre_proyecto = $proyecto->row();
    echo $nombre_proyecto->nombre_proyecto;
}

function tipo_casa_por_id($id)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Proceso_model');
    // Call a function of the model
    $tipo_casa = $CI->Proceso_model->tipo_casa_por_id($id);
    $nombre_tipo_casa = $tipo_casa->row();
    echo $nombre_tipo_casa->nombre_casa;
}

function lleno_master_1($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_1 = $CI->Formularios_model->lleno_master_1($proceso);
    return $formulario_1;
}

function lleno_master_2($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_2 = $CI->Formularios_model->lleno_master_2($proceso);
    return $formulario_2;
}

function lleno_master_3($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_3 = $CI->Formularios_model->lleno_master_3($proceso);
    return $formulario_3;
}

function lleno_master_4($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_4 = $CI->Formularios_model->lleno_master_4($proceso);
    return $formulario_4;
}

function lleno_master_5($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_5 = $CI->Formularios_model->lleno_master_5($proceso);
    return $formulario_5;
}

function lleno_master_6($proceso)
{
    // Get a reference to the controller object
    $CI = get_instance();
    // Call a function of the model
    $formulario_6 = $CI->Formularios_model->lleno_master_6($proceso);
    return $formulario_6;
}


function color_estado_proceso($id)
{
    $ci =& get_instance();
    $ci->load->model('Proceso_model');
    $proceso = $ci->Proceso_model->get_proceso_by_id($id);
    $proceso = $proceso->row();
    $color_class = "";
    if ($proceso->proceso_estado == 'activo') {
        $color_class = "success";
    }
    if ($proceso->proceso_estado == 'inactivo') {
        $color_class = "danger";
    }

    return $color_class;
}

function no_formatear_extra($valor_extra)
{
    if ($valor_extra == 'Sin costo') {
        echo '';
    } else {
        echo 'extra_precio money';
    }
}

function pasar_dpi_a_letras($numerop_dpi)
{
    $dpi_en_letras = '';
    $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);

    $primera_seccion = substr($numerop_dpi, 0, -9);
    $primera_seccion_en_letras = $formatterES->format($primera_seccion);
    //echo $primera_seccion . '<br>';

    $segunda_seccion = substr($numerop_dpi, 4, -4);
    $segunda_seccion_en_letras = $formatterES->format($segunda_seccion);
   // echo $segunda_seccion . '<br>';

    $tercera_seccion = substr($numerop_dpi, 9, 1);
    $cuarta_seccion = substr($numerop_dpi, 10, 3);
    //echo $tercera_seccion;
    $tercera_seccion_en_letras = $formatterES->format($tercera_seccion);
    $cuarta_seccion_en_letras = $formatterES->format($cuarta_seccion);
    //echo $cuarta_seccion;

    // echo $tercera_seccion . '<br>';

    $dpi_en_letras = $primera_seccion_en_letras . ', ' . $segunda_seccion_en_letras . ', ' . $tercera_seccion_en_letras.' '.$cuarta_seccion_en_letras ;
    return $dpi_en_letras;

}
function numeros_a_letras($numeros){

    $numeros = str_replace (',', '', $numeros);
    $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
    $numeros_a_letras = $formatterES->format($numeros);
    return $numeros_a_letras;
}


function formato_dinero($valor)
{
    $valor_formateado = number_format($valor, 2, '.', ',');
    return $valor_formateado;
}
function fecha_formato_1_master9($fecha){
    setlocale(LC_ALL,"es_ES");
    $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
    // Ahora establecemos una fecha cualquiera:
    $date = new Datetime("$fecha");
    //$mes_en_letras = strftime("La fecha es del año %y y su mes es %B", $date->getTimestamp());
    $mes_en_letras = strftime("%B", $date->getTimestamp());
    $fecha_forma_contrato = date_create($fecha);
    $dia = date_format($fecha_forma_contrato,"d");
    $dia_en_letras = $formatterES->format($dia);
    $mes = date_format($fecha_forma_contrato,"F");
    $año = date_format($fecha_forma_contrato,"Y");
    $año_en_letras = $formatterES->format($año);
   /* echo $dia.'<br>';
    echo $dia_en_letras.'<br>';
    echo $mes.'<br>';
    echo $año.'<br>';
    echo $año_en_letras;*/
    //echo $master_2->fm_2_fecha;
    //echo date_format($fecha_forma_contrato,"Y/F/l");

    $fecha_formateada =$dia_en_letras.' de '.$mes_en_letras.' del año '.$año_en_letras;
    return $fecha_formateada;
}

function diferencia_en_dias($fecha_inicio, $fecha_fin)
{
    $fecha_inicio = new DateTime($fecha_inicio);
    $fecha_fin = new DateTime($fecha_fin);

    $d1   = $fecha_fin;
    $d2   = $fecha_inicio;
    $diff = $d2->diff($d1);
    $diferencia_dias = intval($diff->format('%R%a'));

    return $diferencia_dias;

}
function diferencia_en_años($fecha_pago)
{
    $fecha_actual = new DateTime();

    $d1   = $fecha_actual;
    $d2   = new DateTime($fecha_pago);
    $diff = $d2->diff($d1);
    $diferencia_dias = intval($diff->format('%R%y'));

    return $diferencia_dias;

}




?>