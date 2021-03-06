<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 23/08/2017
 * Time: 6:42 PM
 */
class Formulario extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('proceso');
        $this->load->model('Admin_model');
        $this->load->model('Prospecto_model');
        $this->load->model('Proceso_model');
        $this->load->model('Cita');
        $this->load->model('Tarea');
        $this->load->model('Notificaciones_model');
        $this->load->model('Formularios_model');
    }

    public function index()
    {
        $this->load->view('prospectos');
    }

    public function llenar_ive()
    {
//comprobamos session desde el helper de sesion
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['formulario_master_3_pagos'] = $this->Formularios_model->get_formulario_3_pagos($data['segmento_proceso']);
        $data['formulario_master_6'] = $this->Formularios_model->get_formulario_6($data['segmento_proceso']);
        $data['formulario_master_9'] = $this->Formularios_model->get_formulario_9($data['segmento_proceso']);
        $data['formulario_ive'] = $this->Formularios_model->get_formulario_ive($data['segmento_proceso']);

        $data['parametros'] = $this->Admin_model->get_parametros();
        echo $this->templates->render('formulario_ive_new', $data);
    }

    public function guardar_ive()
    {
        print_contenido($_POST);

        $moneda_ingreso_egreso='';
        $moneda_egreso='';

        $five=array(
            'five_proceso_id'=> $this->input->post('proceso_id'),
            'five_prospecto_id'=>$this->input->post('proceso_id'),
            'five_genero'=>$this->input->post('genero'),
            'five_lugar_emision_dpi_departamento'=>$this->input->post('lugar_emision_dpi_departamento'),
            'five_lugar_emision_dpi_municipio'=>$this->input->post('lugar_emision_dpi_municipio'),
            'five_lugar_emision_dpi_pais'=>$this->input->post('lugar_emision_dpi_pais'),
            'five_condicion_migratoria'=>$this->input->post('condicion_migratoria'),
            'five_condicion_migratoria_otro'=>$this->input->post('condicion_migratoria_otro'),
            'five_fecha_nacimiento_constitucion'=>$this->input->post('fecha_nacimiento_creacion'),
            'five_otra_nacionalidad'=>$this->input->post('otra_nacionalidad'),
            'five_telefono_linea_fija'=>$this->input->post('pj_telefono_linea_fija'),
            'five_telefono_celular'=>$this->input->post('pj_telefono_celular'),
            'five_direccion_zona'=>$this->input->post('zona_persona'),
            'five_direccion_departamento'=>$this->input->post('departamento_persona'),
            'five_direccion_municipio'=>$this->input->post('municipio_trabajo'),
            'five_direccion_pais'=>$this->input->post('pais_persona'),
            'five_fuente_ingreso'=>$this->input->post('fuente_ingreso'),
            'five_trabajo_nombre'=>$this->input->post('lugar_trabajo'),
            'five_trabajo_puesto'=>$this->input->post('puesto_trabajo'),
            'five_trabajo_telefono'=>$this->input->post('telefono_trabajo'),
            'five_trabajo_direccion'=>$this->input->post('direccion_trabajo'),
            'five_trabajo_zona'=>$this->input->post('zona_trabajo'),
            'five_trabajo_municipio'=>$this->input->post('municipio_trabajo'),
            'five_trabajo_departamento'=>$this->input->post('departamento_trabajo'),
            'five_trabajo_pais'=>$this->input->post('pais_trabajo'),
            'five_fuente_ingrersos_adicional'=>$this->input->post('fuente_ingrersos_adicional'),
            'five_persona_negocio_nit'=>$this->input->post('nit_np'),
            'five_persona_negocio_direccion'=>$this->input->post('direccion_np'),
            'five_trabajo_actividad_economica'=>$this->input->post('actividad_economica'),
            'five_persona_negocio_direccion_sede'=>$this->input->post('proceso_id'),
            'five_persona_negocio_no_agencias'=>$this->input->post('trabajo_no_agencias'),
            'five_persona_negocio_no_empleados'=>$this->input->post('trabajo_no_empleados'),
            'five_proveedor_nombre_1'=>$this->input->post('nombre_proveedor1'),
            'five_proveedor_pais_1'=>$this->input->post('pais_proveedor1'),
            'five_proveedor_nombre_2'=>$this->input->post('nombre_proveedor2'),
            'five_proveedor_pais_2'=>$this->input->post('pais_proveedor2'),
            'five_cliente_nombre_1'=>$this->input->post('nombre_cliente1'),
            'five_cliente_pais_1'=>$this->input->post('pais_cliente1'),
            'five_cliente_nombre_2'=>$this->input->post('nombre_cliente2'),
            'five_cliente_pais_2'=>$this->input->post('pais_cliente2'),
            'five_ingreso_egreso_persona'=>$this->input->post('proceso_id'),
            'five_ingresos_moneda'=>$this->input->post('proceso_id'),
            'five_ingreso_rango'=>$this->input->post('proceso_id'),
            'five_egreso_moneda'=>$this->input->post('proceso_id'),
            'five_egreso_rango'=>$this->input->post('proceso_id'),
            'five_decripcion_producto_servicio'=>$this->input->post('producto_servicio'),
            'five_procedencia_fondos'=>$this->input->post('procedencia_fondos'),
            'five_tranferencia_fondos'=>$this->input->post('proceso_id'),
            'five_presona_politicamente_expuesta'=>$this->input->post('proceso_id'),
        );


    }

    public function imprimir_ive()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        $five=array(
            'proceso_id'=>$data['segmento_proceso'] ,
            'prospecto_id'=>$data['segmento_prospecto']
        );
        $data['formulario_ive']= $this->Formularios_model->get_formulario_ive($five['proceso_id']);
        echo $this->templates->render('imprimir_ive', $data);
    }

    public function llenar_sib()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        echo $this->templates->render('formulario_sib', $data);
    }
    public function imprimir_sib()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto_modelo->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        $five=array(
            'proceso_id'=>$data['segmento_proceso'] ,
            'prospecto_id'=>$data['segmento_prospecto']
        );
        $data['formulario_ive']= $this->Formularios_model->get_formulario_ive($five);
        echo $this->templates->render('imprimir_sib_1', $data);
    }
    public function llenar_sib2()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        echo $this->templates->render('formulario_sib2', $data);
    }
    public function imprimir_sib2()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto_modelo->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        $five=array(
            'proceso_id'=>$data['segmento_proceso'] ,
            'prospecto_id'=>$data['segmento_prospecto']
        );
        $data['formulario_ive']= $this->Formularios_model->get_formulario_ive($five);
        echo $this->templates->render('imprimir_sib_2', $data);
    }

    public function master_1()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);
            //formulario_master 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_prceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        echo $this->templates->render('formulario_master_1', $data);
    }

    public function guardar_master_1()
    {

        $data = array(
            'proceso_id' => $this->input->post('proceso_id'),
            'prospecto_id' => $this->input->post('prospecto_id'),
            'nombre' => $this->input->post('nombre'),
            'edad' => $this->input->post('edad'),
            'nit' => $this->input->post('nit'),
            'dpi' => $this->input->post('dpi'),
            'extendido_en' => $this->input->post('extendido_en'),
            'nacionalidad' => $this->input->post('nacionalidad'),
            'estado_civil' => $this->input->post('estado_civil'),
            'profesión' => $this->input->post('profesión'),
            'direccion' => $this->input->post('direccion'),
            'correo' => $this->input->post('correo'),
            'telefono_casa' => $this->input->post('telefono_casa'),
            'telefono_celular' => $this->input->post('telefono_celular'),
            'nombre_sucesor' => $this->input->post('nombre_sucesor'),
            'dpi_sucesor' => $this->input->post('dpi_sucesor'),
            'extendido_en_sucesor' => $this->input->post('extendido_en_sucesor'),
            'correo_sucesor' => $this->input->post('correo_sucesor'),
            'telefono_sucesor' => $this->input->post('telefono_sucesor'),
        );

        $this->Formularios_model->guardar_master_1($data);
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $data['prospecto_id']);
    }


    public function master_2()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);
            //Formulario 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_prceso']);
            $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_prceso']);
            $data['formulario_2_extras'] = $this->Formularios_model->get_formulario_2_extras($data['segmento_prceso']);
        }
        $data['title'] = 'Formulario master 2';
        echo $this->templates->render('formulario_master_2', $data);
    }

    public function guardar_master_2()
    {
        $form_2_data = array(
            'prospecto_id' => $this->input->post('prospecto_id'),
            'proceso_id' => $this->input->post('proceso_id'),
            'proyecto' => $this->input->post('proyecto'),
            'casa' => $this->input->post('casa'),
            'tipo' => $this->input->post('tipo'),
            'fecha' => $this->input->post('fecha'),
            'precio' => $this->input->post('precio'),
            'descuento' => $this->input->post('descuento'),
            'precio_descuento' => $this->input->post('precio_descuento'),
            'precio_desglose' => $this->input->post('precio_2'),
            'gastos' => $this->input->post('gastos'),
            'enganche' => $this->input->post('enganche'),
            'a_financiar' => $this->input->post('a_financiar'),
            'precio_total' => $this->input->post('precio_total'),
        );
        $formlario_id = $this->Formularios_model->guardar_master_2($form_2_data);
        $extra_fields_number = $this->input->post('extra_fields');
        $extra_fields_number = $extra_fields_number -1;
        $i = 1;
        $extra_fields = array();
        //echo $extra_fields_number;
        while ($i <= $extra_fields_number) {
            $this->Formularios_model->guardar_master_2_extra($formlario_id, $form_2_data['proceso_id'], $form_2_data['prospecto_id'], $this->input->post('extra_d_' . $i), $this->input->post('extra_p_' . $i));
            $extra_fields['extra_detalle_' . $i] = $this->input->post('extra_d_' . $i);
            $extra_fields['extra_precio_' . $i] = $this->input->post('extra_p_' . $i);
            //print_contenido($_POST);
            //echo 'accion a extra - '.$i;
            $i++;
            /* el valor presentado sería $i antes del incremento (post-incremento) */
        }
        /*echo '<pre>';
        print_r($form_2_data);
        echo '</pre>';
        echo '<pre>';
        print_r($extra_fields);
        echo '</pre>';*/
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $form_2_data['prospecto_id']);
    }
    public function actualizar_master_2(){
       // print_contenido($_POST);

        $form_2_data = array(
            'form_2_id' => $this->input->post('form_2_id'),
            'prospecto_id' => $this->input->post('prospecto_id'),
            'proceso_id' => $this->input->post('proceso_id'),
            'proyecto' => $this->input->post('proyecto'),
            'casa' => $this->input->post('casa'),
            'tipo' => $this->input->post('tipo'),
            'fecha' => $this->input->post('fecha'),
            'precio' => $this->input->post('precio'),
            'descuento' => $this->input->post('descuento'),
            'precio_descuento' => $this->input->post('precio_descuento'),
            'precio_2' => $this->input->post('precio_2'),
            'gastos' => $this->input->post('gastos'),
            'enganche' => $this->input->post('enganche'),
            'a_financiar' => $this->input->post('a_financiar'),
            'precio_total' => $this->input->post('precio_total'),
        );
       // print_contenido($form_2_data);

        $formlario_id = $this->Formularios_model->actualizar_master_2($form_2_data);
        $extra_fields_number = $this->input->post('extra_fields');
        //echo $extra_fields_number ;
        $extra_fields_number = $extra_fields_number -1;
        $i = 1;
        $extra_fields = array();
        //echo $extra_fields_number;
        //borrar extras anterires
        //guardar extras nuevos
        $this->Formularios_model->borrar_extras_formulario_2($form_2_data['proceso_id']);
        
        while ($i <= $extra_fields_number) {
            $this->Formularios_model->guardar_master_2_extra($formlario_id, $form_2_data['proceso_id'], $form_2_data['prospecto_id'], $this->input->post('extra_d_' . $i), $this->input->post('extra_p_' . $i));
            $extra_fields['extra_detalle_' . $i] = $this->input->post('extra_d_' . $i);
            $extra_fields['extra_precio_' . $i] = $this->input->post('extra_p_' . $i);
           // print_contenido($_POST);
            //echo 'accion a extra - '.$i;
            $i++;
            /* el valor presentado sería $i antes del incremento (post-incremento) */
        }
        //echo $extra_fields_number;
        /*echo '<pre>';
        print_r($form_2_data);
        echo '</pre>';
        echo '<pre>';
        print_r($extra_fields);
        echo '</pre>';*/
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $form_2_data['prospecto_id']);
    }
    public function master_3()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
         if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
             //Formulario 2
             $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
             //Forrmulario 3
             $data['formulario_3'] = $this->Formularios_model->get_formulario_3($data['segmento_proceso']);
             //Formulario 3 extras
             $data['formulario_3_pagos'] = $this->Formularios_model->get_formulario_3_pagos($data['segmento_proceso']);
         }
        $data['title'] = 'Formulario 3';
        echo $this->templates->render('formulario_master_3', $data);
    }

    public function guardar_master_3()
    {
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');

        //guardar numero formulario 3
        $datos_pago = array(
            'proceso_id' => $proceso_id,
            'prospecto_id' => $prospecto_id,
            'enganche' => $this->input->post('enganche'),
            'saldo' => $this->input->post('saldo_a_financiar'),
            'preio_total' => $this->input->post('precio_total'),
        );
        //print_contenido($datos_pago);
        $formlario_id = $this->Formularios_model->guardar_formulario_3($datos_pago);

       //print_contenido($_POST);

        $numero_de_pagos = $this->input->post('extra_fields');
        $i = 1;
        // guardar pagos formulario 3
        $extra_fields = array();
        while ($i <= $numero_de_pagos) {
            //obtenemos los datos del pago
            $pago = $this->input->post('pago_' . $i);
            $fecha_pago = $this->input->post('fecha_pago_' . $i);
            $monto_pago = $this->input->post('monto_pago_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'formulario_id' => $formlario_id,
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'pago' => $pago,
                'fecha' => $fecha_pago,
                'monto' => $monto_pago,
                'desembolso_bancario' => 'no',
            );
            $this->Formularios_model->guardar_formulario_3_pago($datos_pagos);
            $i++;
        }

        $pago = $this->input->post('pago_credito_bancario');
        $fecha_pago = $this->input->post('fecha_pago_credito_bancario');
        $monto_pago = $this->input->post('monto_pago_credito_bancario');
        // credito bancario
        $datos_pagos =array(
            'formulario_id' => $formlario_id,
            'proceso_id' => $proceso_id,
            'prospecto_id' => $prospecto_id,
            'pago' => $pago,
            'fecha' => $fecha_pago,
            'monto' => $monto_pago,
            'desembolso_bancario' => 'si',
        );
        $this->Formularios_model->guardar_formulario_3_pago($datos_pagos);


       // exit();
       //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function actualizar_master_3(){


        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');

        //guardar numero formulario 3
        $datos_pago = array(
            'proceso_id' => $proceso_id,
            'prospecto_id' => $prospecto_id,
            'enganche' => $this->input->post('enganche'),
            'saldo' => $this->input->post('saldo_a_financiar'),
            'preio_total' => $this->input->post('precio_total'),

        );
        //print_contenido($datos_pago);
        $formlario_id = $this->Formularios_model->guardar_formulario_3($datos_pago);

        //print_contenido($_POST);
        //exit();
        $this->Formularios_model->borrar_pagos_formulario_3($proceso_id);
        $numero_de_pagos = $this->input->post('extra_fields');
        $i = 1;
        // guardar pagos formulario 3
        $extra_fields = array();
        while ($i <= $numero_de_pagos) {
            //obtenemos los datos del pago
            $pago = $this->input->post('pago_' . $i);
            $fecha_pago = $this->input->post('fecha_pago_' . $i);
            $monto_pago = $this->input->post('monto_pago_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'formulario_id' => $formlario_id,
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'pago' => $pago,
                'fecha' => $fecha_pago,
                'monto' => $monto_pago,
                'desembolso_bancario' => 'no',
            );
            $this->Formularios_model->guardar_formulario_3_pago($datos_pagos);
            $i++;
        }

        $pago = $this->input->post('pago_credito_bancario');
        $fecha_pago = $this->input->post('fecha_pago_credito_bancario');
        $monto_pago = $this->input->post('monto_pago_credito_bancario');
        // credito bancario
        $datos_pagos =array(
            'formulario_id' => $formlario_id,
            'proceso_id' => $proceso_id,
            'prospecto_id' => $prospecto_id,
            'pago' => $pago,
            'fecha' => $fecha_pago,
            'monto' => $monto_pago,
            'desembolso_bancario' => 'si',
        );
        $this->Formularios_model->guardar_formulario_3_pago($datos_pagos);



        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }

    public function master_4()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_2_extras'] = $this->Formularios_model->get_formulario_2_extras($data['segmento_proceso']);
            $data['formulario_4_incluye'] = $this->Formularios_model->get_formulario_4_incluye($data['segmento_proceso']);
            $data['formulario_4'] = $this->Formularios_model->get_formulario_4($data['segmento_proceso']);
        }

        $data['title'] = 'Formulario master 4';
        echo $this->templates->render('formulario_master_4', $data);
    }
    public function guardar_master_4(){

       // print_contenido($_POST);
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');

        $datos_formulario = array(
            'prospecto'=>$prospecto_id,
            'proceso'=>$proceso_id,
            'deposito_energia'=>$this->input->post('deposito_energia'),
            'seguro_incendio_terremoto'=>$this->input->post('seguro_incendio_terremoto'),
            'cuota_seguro'=>$this->input->post('cuota_seguro'),
            'avaluo_bancario'=>$this->input->post('avaluo_bancario'),
            'porcentage_banrural'=>$this->input->post('porcentage_banrural'),
        );
        //guardar formulario
        $form_4_id = $this->Formularios_model->guardar_formularios_4($datos_formulario);
        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
       // exit();
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_4_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_incluye_formulario_4($datos_pagos);
            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $datos_formulario['prospecto']);
    }
    public function actualizar_master_4(){
// print_contenido($_POST);
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $form_4_id = $this->input->post('inlcuye_id');

        $datos_formulario = array(
            'inlcuye_id'=>$form_4_id,
            'deposito_energia'=>$this->input->post('deposito_energia'),
            'seguro_incendio_terremoto'=>$this->input->post('seguro_incendio_terremoto'),
            'cuota_seguro'=>$this->input->post('cuota_seguro'),
            'avaluo_bancario'=>$this->input->post('avaluo_bancario'),
            'porcentage_banrural'=>$this->input->post('porcentage_banrural'),
        );
        //guardar formulario
        $this->Formularios_model->actualizar_master_4($datos_formulario);
        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_incluye_formulario_4($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_4_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_incluye_formulario_4($datos_pagos);
            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function master_5()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formularios data
            $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_2_extras'] = $this->Formularios_model->get_formulario_2_extras($data['segmento_proceso']);
            $data['formulario_5'] = $this->Formularios_model->get_formulario_5($data['segmento_proceso']);
            $data['formulario_5_no_incluye'] = $this->Formularios_model->get_formulario_5_no_incluye($data['segmento_proceso']);
        }
        $data['title'] = 'Formulario master 5';
        echo $this->templates->render('formulario_master_5', $data);
    }
    public function guardar_master_5(){
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $numero_de_incluye = $this->input->post('extra_fields');
        /*echo  $proceso_id;
        echo  $prospecto_id;
        echo  $numero_de_incluye;
        print_contenido($_POST);*/
        // exit();
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
           // echo $i. ' '.$valor.'<br>';
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_formulario_5_no_incluye($datos_pagos);
            $i++;
        }
        //redirect
       redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function actualizar_master_5(){
// print_contenido($_POST);
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        //$form_4_id = $this->input->post('inlcuye_id');
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_no_incluye_formulario_5($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
           // echo $i. ' '.$valor.'<br>';
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_formulario_5_no_incluye($datos_pagos);
            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }

    public function master_6()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_master_6'] = $this->Formularios_model->get_formulario_6($data['segmento_proceso']);
            $data['formulario_master_6_og'] = $this->Formularios_model->get_formulario_6_og($data['segmento_proceso']);
        }
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);
        $data['title'] = 'Formulario master 6';
        echo $this->templates->render('formulario_master_6', $data);
    }
    public function guardar_master_6(){
      //print_contenido($_POST);
      //exit();
       $datos_formulario = array(
            'prospecto'=>$this->input->post('prospecto'),
            'proceso'=>$this->input->post('proceso'),
            'finca'=>$this->input->post('finca'),
            'folio'=>$this->input->post('folio'),
            'libro'=>$this->input->post('libro'),
            'area'=>$this->input->post('area'),
            'frente'=>$this->input->post('frente'),
            'fondo'=>$this->input->post('fondo'),
            'forma'=>$this->input->post('forma'),
            'metros_construccion'=>$this->input->post('metros_construccion'),
            'dias_de_entrega'=>$this->input->post('dias_de_entrega'),
            'arras'=>$this->input->post('arras'),
            //'excepto_de_credito'=>$this->input->post('excepto_de_credito'),
        );
       // print_contenido($datos_formulario);
        //guardar formulario
        $this->Formularios_model->guardar_formulario_6($datos_formulario);
        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $datos_formulario['prospecto']);
    }
    public function actualizar_master_6(){
    //print_contenido($_POST);
    //exit();
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $form_6_id = $this->input->post('fm_6_id');


        $datos_formulario = array(
            'form_6_id'=>$form_6_id,
            'prospecto'=>$this->input->post('prospecto'),
            'proceso'=>$this->input->post('proceso'),
            'finca'=>$this->input->post('finca'),
            'folio'=>$this->input->post('folio'),
            'libro'=>$this->input->post('libro'),
            'area'=>$this->input->post('area'),
            'frente'=>$this->input->post('frente'),
            'fondo'=>$this->input->post('fondo'),
            'forma'=>$this->input->post('forma'),
            'metros_construccion'=>$this->input->post('metros_construccion'),
            'dias_de_entrega'=>$this->input->post('dias_de_entrega'),
            'arras'=>$this->input->post('arras'),
            //'excepto_de_credito'=>$this->input->post('excepto_de_credito'),
        );
        //guardar formulario
        $this->Formularios_model->actualizar_master_6($datos_formulario);
        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_formulario_6_og($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_6_id,
                'valor' => $valor,
            );

            if($valor != ''){
                $this->Formularios_model->guardar_formulario_6_og($datos_pagos);
            }

            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function master_7()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_master_6'] = $this->Formularios_model->get_formulario_6($data['segmento_proceso']);
            $data['formulario_master_6_og'] = $this->Formularios_model->get_formulario_6_og($data['segmento_proceso']);
        }
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);
        $data['title'] = 'Formulario master 6 observaciones generales';
        echo $this->templates->render('formulario_master_7', $data);
    }
    public function guardar_master_7(){


        //print_contenido($_POST);
        //exit();
        //redirect
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $numero_de_incluye = $this->input->post('extra_fields');
        /*echo  $proceso_id;
        echo  $prospecto_id;
        echo  $numero_de_incluye;
        print_contenido($_POST);*/
        // exit();
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            // echo $i. ' '.$valor.'<br>';
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_formulario_6_og($datos_pagos);
            $i++;
        }

        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function actualizar_master_7(){
        //print_contenido($_POST);
        //exit();
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $form_6_id = $this->input->post('fm_6_id');


        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_formulario_6_og($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_6_id,
                'valor' => $valor,
            );

            if($valor != ''){
                $this->Formularios_model->guardar_formulario_6_og($datos_pagos);
            }

            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function master_8()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_master_6'] = $this->Formularios_model->get_formulario_6($data['segmento_proceso']);
            $data['formulario_master_6_og'] = $this->Formularios_model->get_formulario_6_og($data['segmento_proceso']);
            $data['formulario_master_8'] = $this->Formularios_model->get_formulario_8($data['segmento_proceso']);
        }
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);
        $data['title'] = 'Formulario master 8';
        echo $this->templates->render('formulario_master_8', $data);
    }
    public function guardar_master_8(){


        //print_contenido($_POST);
        //exit();
        //redirect
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $numero_de_incluye = $this->input->post('extra_fields');
        /*echo  $proceso_id;
        echo  $prospecto_id;
        echo  $numero_de_incluye;
        print_contenido($_POST);*/
        // exit();
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            // echo $i. ' '.$valor.'<br>';
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_formulario_8($datos_pagos);
            $i++;
        }

        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function actualizar_master_8(){
        //print_contenido($_POST);
        //exit();
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $form_6_id = $this->input->post('fm_8_id');


        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_formulario_8($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_6_id,
                'valor' => $valor,
            );

            if($valor != ''){
                $this->Formularios_model->guardar_formulario_8($datos_pagos);
            }

            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function master_9()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            //datos a pasar a vista
            //pospecto
            $data['prospecto'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
            //Formulario 1
            $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
            $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
            $data['formulario_master_3_pagos'] = $this->Formularios_model->get_formulario_3_pagos($data['segmento_proceso']);
            $data['formulario_master_6'] = $this->Formularios_model->get_formulario_6($data['segmento_proceso']);
            $data['formulario_master_9'] = $this->Formularios_model->get_formulario_9($data['segmento_proceso']);
            $data['parametros'] = $this->Admin_model->get_parametros();

        }
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);
        $data['title'] = 'Formulario master 9';
        echo $this->templates->render('formulario_master_9', $data);
    }
    public function guardar_master_9(){


        //print_contenido($_POST);
        //exit();
        //redirect
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $numero_de_incluye = $this->input->post('extra_fields');
        /*echo  $proceso_id;
        echo  $prospecto_id;
        echo  $numero_de_incluye;
        print_contenido($_POST);*/
        // exit();
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            // echo $i. ' '.$valor.'<br>';
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'valor' => $valor,
            );
            $this->Formularios_model->guardar_formulario_9($datos_pagos);
            $i++;
        }

        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }
    public function actualizar_master_9(){
        //print_contenido($_POST);
        //exit();
        $proceso_id = $this->input->post('proceso');
        $prospecto_id = $this->input->post('prospecto');
        $form_6_id = $this->input->post('fm_6_id');


        //echo $form_4_id;
        $numero_de_incluye = $this->input->post('extra_fields');
        // exit();
        $this->Formularios_model->borrar_formulario_9($proceso_id);
        $i = 1;
        // guardar incluye formulario 4
        $extra_fields = array();
        while ($i <= $numero_de_incluye) {
            //obtenemos los datos del pago
            $valor = $this->input->post('incluye_input_' . $i);
            //armamos array para pasar pagos
            $datos_pagos =array(
                'proceso_id' => $proceso_id,
                'prospecto_id' => $prospecto_id,
                'formulario_id' => $form_6_id,
                'valor' => $valor,
            );

            if($valor != ''){
                $this->Formularios_model->guardar_formulario_9($datos_pagos);
            }

            $i++;
        }

        //redirect
        redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $prospecto_id);
    }

    public function imprimir_master_1()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 1';
        echo $this->templates->render('imprimir_master_1', $data);
    }

    public function imprimir_master_2()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 1';
        echo $this->templates->render('imprimir_master_2', $data);
    }

    public function imprimir_master_3()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 3';
        echo $this->templates->render('imprimir_master_3', $data);
    }

    public function imprimir_master_4()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 4';
        echo $this->templates->render('imprimir_master_4', $data);
    }

    public function imprimir_master_5()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);
        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 5';
        echo $this->templates->render('imprimir_master_5', $data);
    }

    public function imprimir_master_6()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        //pospecto
        $data['ProspectoModel'] = $this->Prospecto_model->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 6';
        echo $this->templates->render('imprimir_master_6', $data);

    }
}