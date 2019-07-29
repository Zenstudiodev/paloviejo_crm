<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificaciones extends Base_Controller
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
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
        $this->load->model('Cita');
        $this->load->model('Prospecto_model');
    }

    public function index()
    {
        //si esta  logueado tomar datos de usuario desde la sesión
        if (isset($this->session->userdata['logged_in'])) {
            $data['user_id'] = $this->session->userdata['logged_in']['id'];
            $data['username'] = $this->session->userdata['logged_in']['username'];
            $data['email'] = $this->session->userdata['logged_in']['email'];
            $data['nombre'] = $this->session->userdata['logged_in']['nombre'];
        }

        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);

        $this->load->view('lista_notificaciones', $data);
    }

    public function notificacionOff()
    {

        $data['segmento'] = $this->uri->segment(3);

        if (!$data['segmento']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //$notificacion = $this->Notificaciones_model->notificacion_data($data['segmento']);
            //$notificacion->result_array();
            //$notificacion = $notificacion->result_array;
            //print_r($notificacion);

            $this->Notificaciones_model->notification_switch($data['segmento']);
        }

    }

    public function Alertas_cron_citas()
    {
        //comprobamos session desde el helper de sesion
        //$data = compobarSesion();
        //cargamos las citas activas
        $citas = $this->Cita->CitasActivas();
        // print_r($citas);

        //compobamos hora actual
        $hora_actual = new DateTime();
        $hora_actual = $hora_actual->format('Y-m-d H:i:s');
        echo $hora_actual . '<br>';

        if($citas){
            foreach ($citas->result() as $cita) {
                echo '<pre>';
                print_r($cita);
                echo '</pre>';

                $user_data = $this->User->userData($cita->user_id);
                $user_data = $user_data->row();

                //obtenemos el supervisor del usuario con el helper
                $supervisor =supervisor($user_data->rol);

                //echo 'su supervisor es: '.$supervisor .'<br>';

                // si la hora de la cita no ha pasado la hora actual
                if ($hora_actual < $cita->fecha_limite) {
                    echo 'la cita ' . $cita->id . ' aun esta en tiempo <br>';

                } else //si la hora de la cita ya paso la hora ctual
                {
                    echo 'La cita ' . $cita->id . ' se paso de la hora<br>';
                    //creamos la notificacion
                    echo $cita->user_id.'<br>';


                    $notificacion = array(
                        'user_id' => $cita->user_id,
                        'prospecto_id' => $cita->prospecto_id,
                        'tipo' => 'alerta',
                        'contenido' => 'La reunion paso la fecha limite sin actualizaciòn',
                        'titulo' => 'Reunión sin actualización',
                        'fecha' => $hora_actual,
                        'estado' => '1',
                        'alerta' => '1',
                        'supervisor' => $supervisor
                    );


                    $this->Notificaciones_model->crear_notificacion($notificacion);
                    $this->Cita->desactivar_citas($cita->id);



                    echo 'crear alerta <br>';
                }
            }
        }else{
            echo 'no hay citas activas';
        }

        //revisar actividad d

    }

    public function prospectosInactivos()
    {

        $prospectos = $this->Prospecto->ProspectosActivos();
        $action_text = '';
        $ahora = new DateTime();
        foreach ($prospectos->result() as $prospecto) {
            $ultima_actualizacion = new DateTime($prospecto->actualizado_en);
            $limite_iniactividad = new DateTime($prospecto->actualizado_en);
            $limite_iniactividad->modify('+4 days');

            echo '<p>' . $prospecto->id . ' nombre: ' . $prospecto->nombre . ' Estado:' . $prospecto->estado . ' ultima actividad en : ' . $prospecto->actualizado_en . '</p>';

            if ($ahora > $limite_iniactividad) {
                $action_text = 'se paso levantar alerta';
            } else {
                $action_text = 'aun no se ha pasado no hacer nada';
            }
            echo '<p>' . $action_text . '</p>';
        }
    }

    public function resultadoAlertas()
    {
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //titulo de pagina
        $data['title'] = 'resultado alerta';

        $data['segmento'] = $this->uri->segment(3);
        if (!$data['segmento']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['r_alerta'] = $this->Notificaciones_model->detalle_alerta($data['segmento']);
        }
        echo $this->templates->render('resultado_alerta', $data);
    }


}
