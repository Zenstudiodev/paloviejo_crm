<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proceso extends Base_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto_model');
        $this->load->model('Proceso_model');
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
        $this->load->model('casas_model');
        $this->load->model('Cotizador_model');
        $this->load->model('Admin_model');
    }
    public function index()
	{
        $this->load->view('lista_notificaciones');
	}
    public function crearProceso()
    {

        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);

        //Id de prospecto
        $data['segmento_p']=$this->uri->segment(3);

        //si no hay datos de prospecto
        if(!$data['segmento_p']){
            redirect('prospectos/prospectosList', 'refresh');
        }else{
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
        }

        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Creas Proceso';
        echo $this->templates->render('crear_proceso', $data);
        //$this->load->view('crear_proceso', $data);
    }
    public function guardarProceso()
    {

       /* print_contenido($_POST);
        exit();*/

        $data= array(
            'casa'=>$this->input->post('casa'),
            'tipo_casa_id' =>$this->input->post('tipo_casa'),
            'proyecto_id'=> $this->input->post('proyecto'),
            'etapa'=>'Fase Firma y crédito',
            'prospecto_id'=>$this->input->post('prospecto_id'),
            'codigo'=>$this->input->post('codigo')
        );
        $this->Proceso_model->crear_proceso($data);
        //appartar casa
        $this->Admin_model->reservar_casa($data['casa']);
        //redirect('prospectos/prospectosList', 'refresh');
        redirect('prospectos/prospectoDetalle/'.$data['prospecto_id'], 'refresh');

    }
    public function actualizarProceso(){
        //si esta  logueado tomar datos de usuario desde la sesión
        if (isset($this->session->userdata['logged_in'])) {
            $data['username']= $this->session->userdata['logged_in']['username'];
            $data['email'] = $this->session->userdata['logged_in']['email'];
            $data['nombre'] = $this->session->userdata['logged_in']['nombre'];
        }else{
            redirect('/login', 'refresh');
        }
    }
    public function avance_obra()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Avance de obra';
        echo $this->templates->render('avance_obra', $data);
    }
    public function guardar_imagen_avance_obra(){


        if ($this->input->post('gardar_imagen_avance')) {
            //Check whether user upload picture
            echo $_FILES['documento']['name'];

            if (!empty($_FILES['documento']['name'])) {
                $nombreArchivo = $this->input->post('tipo_documento') . '-' . $this->input->post('prospecto_id') . '-' . $this->input->post('proceso_id');

                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'gif|jpg|png|PDF';
                $config['file_name'] = $nombreArchivo;
                $config['overwrite'] = TRUE;
                //$config['max_size']      = 100;
                //$config['max_width']     = 1024;
                //$config['max_height']    = 768;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('documento')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('subir_documento', $error);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    //$this->load->view('subir_documento', $data);
                    echo $this->upload->data('file_name');
                    echo $this->upload->data('file_size');
                }
            } else {
                $picture = '';
            }

            //Prepare array of user data
            $documentoData = array(
                'src' => $this->upload->data('file_name'),
                'proceso_id' => $this->input->post('proceso_id'),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'tipo_actor' => $this->input->post('tipo_actor'),
                'extension'=> $this->upload->data('file_type')
            );

            echo '<pre>';
            print_r($documentoData);
            echo '</pre>';


            //Pass user data to model
            $insertUserData = $this->Documentos_model->crear_documento($documentoData);
            redirect('documentos/verDocumentos/' . $this->input->post('prospecto_id') . '/' . $this->input->post('proceso_id'), 'refresh');

            //Storing insertion status message.
            if ($insertUserData) {

            } else {
                echo 'error';
            }
        }
    }
    public function cotizador()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);

        //Id dee Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['procesos'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Cotizador';
        $data['items_cotizacion'] = $this->Cotizador_model->get_items_cotizador();

        echo $this->templates->render('cotizador', $data);
    }
    public function aceptar_cotizacion(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);

        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
            $data['procesos'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Cotizador';
        $data['items_cotizacion'] = $this->Cotizador_model->get_items_cotizador();

        echo $this->templates->render('firmar', $data);
    }
    public function guardar_cotizacion(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        $datos = array(
            'prospecto_id' => $this->input->post('prospecto_id'),
            'proceso_id' => $this->input->post('proceso_id'),
            'items' => $this->input->post('items')

        );
        $this->Cotizador_model->guardar_cotizacion($datos);
        redirect(base_url() . 'Proceso/ver_cotizaciones_proceso/'.$datos['prospecto_id'].'/'.$datos['proceso_id']);
    }
    public function ver_cotizaciones_proceso(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        $datos = array(
            'proceso' =>$data['segmento_p'],
            'ProspectoModel' =>$data['segmento_pr'],
        );
        $data['cotizaciones'] = $this->Cotizador_model->get_cotizaciones_prospecto($datos);
        echo $this->templates->render('cotizaciones', $data);
    }
    public function imprimir_cotizacion(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //Id de prospecto
        $data['cotizacion_id'] = $this->uri->segment(3);
        $data['cotizacion'] = $this->Cotizador_model->get_cotizacion($data['cotizacion_id']);
        $cotizacion = $data['cotizacion']->row();
        $data['ProspectoModel'] =$this->Prospecto->ListarProspecto($cotizacion->cotizacion_prospecto_id);
        $data['proceso'] =$this->Proceso_model->get_proceso_by_id($cotizacion->cotizacion_proceso_id);

        $data['title'] = 'Imprimir cotizacion';
        echo $this->templates->render('imprimir_cotizacion', $data);
    }
    public function hoja_de_acabados(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //todo 1
        //$this->Prospecto_model->ListarProspecto();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }

        //titulo de pagina
        $data['title'] = 'Avance de obra';
        echo $this->templates->render('hoja_acabados', $data);
    }
    public function lista_revision(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Lista de revisión';
        echo $this->templates->render('lista_revision', $data);
    }
}
