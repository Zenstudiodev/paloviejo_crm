<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends Base_Controller {

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
        $this->load->model('ProspectoModel');
        $this->load->model('Tarea');
    }
    public function index()
	{
		$this->load->view('prospectos');
	}
    public function guardarTarea()
    {
        $data= array(
            'fecha'=>$this->input->post('fecha'),
            'observaciones'=>$this->input->post('observaciones'),
            'prospecto_id'=>$this->input->post('prospecto_id'),
            'tarea'=>$this->input->post('tarea'),
        );
        $this->Tarea->crear_tarea($data);
        //actualizamos la actividad del prospecto
        $this->Prospecto->actualizado($data['prospecto_id']);
        redirect('dashboard', 'refresh');
        $this->load->view('dashboard');

    }
    public function ResultadoTarea()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        //Id de prospecto
        $data['segmento_p']=$this->uri->segment(3);
        //Id ce cita
        $data['segmento_t']=$this->uri->segment(4);

        //si no hay datos de prospecto
        if(!$data['segmento_p']){
            redirect('prospectos/prospectosList', 'refresh');
        }else{
            $data['prospectos'] = $this->Prospecto->ListarProspecto($data['segmento_p']);
            $data['tareas'] = $this->Tarea->datosTareaProspecto($data['segmento_p'], $data['segmento_t']);
        }

        $data['title'] = 'Resultado de tarea';
        echo $this->templates->render('resultado_tarea', $data);
    }
    public function guardarResultadoTarea()
    {
        $data= array(
            'resultado'=>$this->input->post('resultado'),
            'prospecto_id'=>$this->input->post('prospecto_id'),
            'tarea_id'=>$this->input->post('tarea_id')
        );
        $this->Tarea->guardar_resultado_tarea($data);
        $this->Prospecto->actualizado($data['prospecto_id']);
        redirect('prospectos/prospectoDetalle/'.$data['prospecto_id'], 'refresh');

        echo 'desde el controlador';
    }

}
