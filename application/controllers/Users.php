<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Base_Controller {

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
        $this->load->model('User');

    }

    public function index()
	{
	    $users = $this->User->get_users();
        $data['users'] = $users;
		$this->load->view('users', $data);
	}
	public function perfil(){

        $data['segmento']=$this->uri->segment(3);

        if(!$data['segmento']){
            //redirect('prospectos/prospectosList', 'refresh');
        }else{
            $data['user'] = $this->User->userData($data['segmento']);
        }

        //si esta  logueado tomar datos de usuario desde la sesión
        if (isset($this->session->userdata['logged_in'])) {
            $data['username']= $this->session->userdata['logged_in']['username'];
            $data['email'] = $this->session->userdata['logged_in']['email'];
            $data['nombre'] = $this->session->userdata['logged_in']['nombre'];
        }
        // datos de prospectos
        //titulo de pagina
        $data['title'] = 'Perfil';
        $this->load->view('layout/head.php', $data);
        $this->load->view('layout/body_open.php');
        $this->load->view('layout/sidebar.php');
        $this->load->view('layout/top_navegation.php');

        $this->load->view('user_perfil.php');
        $this->load->view('layout/footer.php');
        $this->load->view('layout/js_bottom_menu.php');
        $this->load->view('layout/body_close.php');

    }
    public function detalle(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        $data['segmento'] = $this->uri->segment(3);

        if (!$data['segmento']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['user'] = $this->User->userData($data['segmento']);
        }

        $data['title'] = 'Detalle de usuario';
        echo $this->templates->render('detalle_user', $data);
    }

}
