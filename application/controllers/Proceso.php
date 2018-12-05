<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proceso extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto');
        $this->load->model('Proceso_model');
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
        $this->load->model('casas_model');
        $this->load->model('Cotizador_model');
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
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
        }

        $data['title'] = 'Resultado de cita';
        echo $this->templates->render('crear_proceso', $data);
        //$this->load->view('crear_proceso', $data);
    }
    public function guardarProceso()
    {
        $proyecto='';
        switch ($this->input->post('proyecto')) {
            case 0:
                $proyecto = '1';
                break;
            case 1:
                $proyecto = '1';
                break;
            case 2:
                $proyecto = '1';
                break;
            case 3:
                $proyecto = '2';
                break;
        }
        $data= array(
            'casa'=>$this->input->post('casa'),
            'tipo_casa_id' =>$this->input->post('tipo_casa'),
            'proyecto_id'=> $proyecto,
            'etapa'=>'Fase Firma y crédito',
            'prospecto_id'=>$this->input->post('prospecto_id'),
            'codigo'=>$this->input->post('codigo')
        );
        $this->Proceso_model->crear_proceso($data);
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
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Avance de obra';
        echo $this->templates->render('avance_obra', $data);
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
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
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
            'prospecto' =>$data['segmento_pr'],
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

        $data['title'] = 'Imprimir cotizacion';
        echo $this->templates->render('imprimir_cotizacion', $data);
    }
    public function hoja_de_acabados(){
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
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
            $data['proceso'] = $this->Proceso_model->get_proceso_by_id($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Avance de obra';
        echo $this->templates->render('lista_revision', $data);
    }
}
