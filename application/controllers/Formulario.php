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
        $this->load->model('Prospecto');
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        echo $this->templates->render('formulario_ive', $data);
    }

    public function guardar_ive()
    {

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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);

        }
        $data['title'] = 'Detalle de prospecto';
        $five=array(
            'proceso_id'=>$data['segmento_proceso'] ,
            'prospecto_id'=>$data['segmento_prospecto']
        );
        $data['formulario_ive']= $this->Formularios_model->get_formulario_ive($five);
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);
            //Formulario 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_prceso']);


        }
        $data['title'] = 'Detalle de prospecto';
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
            'precio_2' => $this->input->post('precio_2'),
            'gastos' => $this->input->post('gastos'),
            'enganche' => $this->input->post('enganche'),
            'a_financiar' => $this->input->post('a_financiar'),
            'precio_total' => $this->input->post('precio_total'),
        );

        $formlario_id = $this->Formularios_model->guardar_master_2($form_2_data);


        $extra_fields_number = $this->input->post('extra_fields');
        $i = 1;
        $extra_fields = array();

        while ($i <= $extra_fields_number) {

            $this->Formularios_model->guardar_master_2_extra($formlario_id, $form_2_data['proceso_id'], $form_2_data['prospecto_id'], $this->input->post('extra_d_' . $i), $this->input->post('extra_p_' . $i));
            $extra_fields['extra_detalle_' . $i] = $this->input->post('extra_d_' . $i);
            $extra_fields['extra_precio_' . $i] = $this->input->post('extra_p_' . $i);

            //echo 'accion a extra - '.$i;


            $i++;  /* el valor presentado sería
                   $i antes del incremento
                   (post-incremento) */
        }


        echo '<pre>';
        print_r($form_2_data);
        echo '</pre>';
        echo '<pre>';
        print_r($extra_fields);
        echo '</pre>';


        //redirect(base_url() . 'index.php/prospectos/prospectoDetalle/' . $data['prospecto_id']);
    }

    public function master_3()
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
            $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);
            //Formulario 1
            $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_prceso']);
            //Formulario 2
            $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_prceso']);
        }
        $data['title'] = 'Formulario 3';
        echo $this->templates->render('formulario_master_3', $data);
    }

    public function guardar_master_3()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        exit();

        $numero_de_pagos = $this->input->post('extra_fields');
        $i = 1;
        $extra_fields = array();

        while ($i <= $numero_de_pagos) {
            //obtenemos los datos del pago
            $pago = $this->input->post('pago_' . $i);
            $fecha_pago = $this->input->post('fecha_pago_' . $i);
            $monto_pago = $this->input->post('monto_pago_' . $i);


            $i++;
        }

        echo '<pre>';
        //print_r($extra_fields);
        echo '</pre>';
    }

    public function master_4()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);

        $data['title'] = 'Formulario master 5';
        echo $this->templates->render('formulario_master_4', $data);
    }

    public function master_5()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);

        $data['title'] = 'Formulario master 5';
        echo $this->templates->render('formulario_master_5', $data);
    }

    public function master_6()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_proceso'] = $this->uri->segment(4);

        $data['formulario_master_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_master_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        //$data['formulario_master_3']= $this->Formularios_model->get_formulario_3($data['segmento_proceso']);

        $data['title'] = 'Formulario master 6';
        echo $this->templates->render('formulario_master_6', $data);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
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
        $data['prospecto'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
        //proceso
        $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_proceso']);
        //Formulario 1
        $data['formulario_1'] = $this->Formularios_model->get_formulario_1($data['segmento_proceso']);
        $data['formulario_2'] = $this->Formularios_model->get_formulario_2($data['segmento_proceso']);
        $data['title'] = 'Formulario master hoja 6';
        echo $this->templates->render('imprimir_master_6', $data);

    }
}