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
}
