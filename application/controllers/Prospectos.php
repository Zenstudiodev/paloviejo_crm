<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospectos extends Base_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
        // Modelos
        $this->load->model('Prospecto_model');
        $this->load->model('Cita');
        $this->load->model('Tarea');
        $this->load->model('User');
        $this->load->model('Proceso_model');
        $this->load->model('Formularios_model');
        $this->load->model('Notificaciones_model');
        //Helpers
        $this->load->helper('notificaciones');
    }

    public function index()
    {
        $users = $this->User->get_users();
        $data['users'] = $users;
        $this->load->view('prospectos', $data);
    }

    //Vista de listas de prospectos
    public function prospectosList()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //titulo de pagina
        $data['title'] = 'Listado de prospectos';
        // nivel de acceso de usuario
        // comprobar si puede ver todos los prospectos
        if (puede_ver($data['rol'], array('0', '1', '2', '6'))) {
            //recojemos los listados de prospectos asociados al usuario
            $data['prospectos'] = $this->Prospecto_model->ListarPsopectosGeneral();
        } else {
            //recojemos los listados de prospectos asociados al usuario
            $data['prospectos'] = $this->Prospecto_model->ListarProspectos($data['user_id']);
        }
        echo $this->templates->render('prospectos_list', $data);

    }

    public function prospectosInactivoList()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        //titulo de pagina
        $data['title'] = 'Listado de prospectos inactivos';
        $data['prospectos'] = $this->Prospecto_model->ListarProspectosinactivos();

        echo $this->templates->render('prospectos_list', $data);

    }

    public function prospectoDetalle()
    {

        //comprobamos session desde el helper de sesion
        $data = compobarSesion();


        //prospecto id
        $data['prospecto_id'] = $this->uri->segment(3);
        $prospecto_id = $data['prospecto_id'];

        if (!$prospecto_id) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($prospecto_id);
            $data['citas'] = $this->Cita->ListarCitasProspecto($prospecto_id);
            $data['resultado_citas'] = $this->Cita->ResultadoCitas($prospecto_id);
            $data['tareas'] = $this->Tarea->ListarTareasProspecto($prospecto_id);
            $data['resultado_tareas'] = $this->Tarea->ResultadoTareas($prospecto_id);
            $data['procesos'] = $this->Proceso_model->ListarProcesos($prospecto_id);
        }
        //datos de prospecto antes de pasar a la vista
        if ($data['prospectos']) {
            $prospecto = $data['prospectos']->row_array();
            //comprobar que el prospecto que se desea ver pertenesca a al usuario loguado
            //TODO si el usuario es administrador pasar
            if (puede_ver($data['rol'], array('0', '1', '2', '6'))) {

            } else {
                if ($prospecto['user_id'] == $data['user_id']) {
                    //echo 'lo puede ver';
                } else {
                    echo 'Este prospecto no le pertenece';
                    redirect('/prospectos/prospectosList', 'refresh');
                }
            }

        }

        $data['title'] = 'Detalle de prospecto';
        echo $this->templates->render('prospecto_detalle', $data);
    }

    public function crearProspecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        // cargamos alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        //titulo de pagina
        $data['title'] = 'Crear un prospecto';
        echo $this->templates->render('prospectos', $data);
    }

    public function guardarProspecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'celular' => $this->input->post('celular'),
            'email' => $this->input->post('email'),
            'nombre2' => $this->input->post('nombre2'),
            'celular2' => $this->input->post('celular2'),
            'email2' => $this->input->post('email2'),
            'medio' => $this->input->post('medio'),
            'user_id' => $data['user_id']
        );
        $this->Prospecto_model->crear_prospecto($data);
        redirect('prospectos/prospectosList', 'refresh');
    }

    public function prospectoCita()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        // cargamos alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        //titulo de pagina
        $data['title'] = 'Crear un cita';


        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento']);
        }
        //obtener mensaje de error desde flash data
        if ($this->session->flashdata('error')) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['title'] = 'Resultado de cita';
        echo $this->templates->render('prospecto_agendar', $data);
    }

    public function prospectoTarea()
    {
        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento']);
        }
        $this->load->view('prospecto_tarea', $data);
    }

    public function prospectoEditar()
    {

        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        //titulo de pagina
        $data['title'] = 'Editar prospecto';

        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento']);
        }
        //usuarios
        $data['vendedores'] = $this->User->listado_de_vendedores();
        echo $this->templates->render('prospectos_editar', $data);
    }

    public function actualizarProspecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();

        $check = $this->input->post('estado');
        if (!isset($check)) {
            $check = 0;
        }
        echo $check;


        $dataNew = array(
            'nombre' => $this->input->post('nombre'),
            'celular' => $this->input->post('celular'),
            'email' => $this->input->post('email'),
            'nombre2' => $this->input->post('nombre2'),
            'celular2' => $this->input->post('celular2'),
            'email2' => $this->input->post('email2'),
            'medio' => $this->input->post('medio'),
            'prospecto_id' => $this->input->post('prospecto_id'),
            'estado' => $check
        );

        $Prospecto = $this->Prospecto->ListarProspecto($dataNew['prospecto_id']);
        $Prospecto->result_array();
        $Prospecto = $Prospecto->result_array;
        $dataOldProspecto = array(
            'prospecto_id' => $dataNew['prospecto_id'],
            'user_id' => $data['user_id'],
            'nombre' => $Prospecto[0]['nombre'],
            'celular' => $Prospecto[0]['celular'],
            'email' => $Prospecto[0]['email'],
            'nombre2' => $Prospecto[0]['nombre2'],
            'celular2' => $Prospecto[0]['celular2'],
            'email2' => $Prospecto[0]['email2'],
            'medio' => $Prospecto[0]['medio']
        );
        echo '<pre>';
        print_r($dataOldProspecto);

        echo '</pre>';

        //guardar datos anteriores del prospecto en el registro
        $this->Prospecto->guardar_historial_prospecto($dataOldProspecto);
        //actualizar datos nuevos de prospecto
        $this->Prospecto->actualizar_prospecto($dataNew);
        redirect('prospectos/prospectoDetalle/' . $dataNew['prospecto_id'], 'refresh');
    }

    public function faseprospecto()
    {
        $data['etapa_procesos'] = $this->Proceso_model->etapaProsceso('4');
        $this->load->view('test', $data);
    }

}

