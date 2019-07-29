<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {

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

        $this->load->model('Prospecto_model');
        $this->load->model('Cita');
        $this->load->model('Notificaciones_model');
    }

    //vista de panel de inicio
    public function index()
	{
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // datos de citas de usuario en panel
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        $data['citas'] = $this->Cita->ListarCitas($data['user_id']);

        if (puede_ver($data['rol'], array('0', '1', '2','3'))) {
            //recojemos los listados de prospectos asociados al usuario
            $data['prospectos'] = $this->Prospecto_model->ListarPsopectosGeneral();
        } else {
            //recojemos los listados de prospectos asociados al usuario
            $data['prospectos'] = $this->Prospecto_model->ListarProspectos($data['user_id']);
        }
        $data['prospectos'] = $this->Prospecto_model->ListarProspectos($data['user_id']);
        //titulo de pagina
        $data['title'] = 'Dashboard';

        echo $this->templates->render('dashboard', $data);
    }

}
