<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto_model');
        $this->load->model('Cita');
        $this->load->model('Tarea');
        $this->load->model('Notificaciones_model');
    }

    public function index()
    {
        $this->load->view('prospectos');
    }
    public function guardarCita()
    {
        //comprobamos session desde el helper de sesion
       $data = compobarSesion();
        //Obtenemos hora de cita en formulario para comprobar proceso

        $horaCita = new DateTime($this->input->post('fecha'));
        $horaLimite = new DateTime($this->input->post('fecha'));
        //agregamos 2 horas para crear hora limite
        $horaLimite->modify('+2 hours');

        $dataCita = array(
            'fecha' => $horaCita->format('Y-m-d H:i:s'),
            'observaciones' => $this->input->post('observaciones'),
            'prospecto_id' => $this->input->post('prospecto_id'),
            'user_id' => $data['user_id'],
            'tipo_cita' => $this->input->post('tipo_cita'),
            'estado' => 1,
            'fecha_limite' => $horaLimite->format('Y-m-d H:i:s')
        );

        //Antes de guardar a cita
        //obtenemos las citas activas
        $citasActivas = $this->Cita->CitasActivas();
        $guardarCita = 1;

        if($citasActivas){// comprobamos si hay citas activas
        //si ninguna de las citas activas  es menor a la cita del formulario mas 2 horas guardamos la cita
        foreach ($citasActivas->result() as $cita) {
            // pasamos la hora de cada cita a objeto DataTime
            $citaGuardada = new DateTime($cita->fecha);
            //Comprobamos la dierencia de horas de cita con la hora del formulario
            $diff = $citaGuardada->diff($horaCita, true);
            // convertimos la diferencia de fechas a horas
            $diffEnHoras = ($diff->d * 24);
            $diffEnHoras = $diffEnHoras + $diff->h;
            if ($diffEnHoras >= 2){
            }else{
                echo'<p>Modificando</p>';
                $guardarCita = 0;
            }
        }

        //comprobamos si se puede guardar la cita sino generamos mensaje de error y devovemos a vista de formulario
        if($guardarCita == 1){

        }else{
            $this->session->set_flashdata('error', 'No es posible guardar la cita, debe de tener mas de Horas de diferencia con otra cita guardada');
            redirect('prospectos/prospectoCita/' . $dataCita['prospecto_id'], 'refresh');
        }
        }
        //creamos la cita
        $this->Cita->crear_cita($dataCita);
        /**
        actualizamos la actividad del prospecto
        */
         $this->Prospecto_model->actualizado($dataCita['prospecto_id']);


        //datos del prospecto
        $prospecto = $this->Prospecto_model->ListarProspecto($dataCita['prospecto_id']);
        $prospecto = $prospecto->row();

        if ($dataCita['tipo_cita' == 'cierre']){
            $supervisor = 'gerentedeventas';
        }else{
            $supervisor ='propio';
        }
         //creamos la notificacion para cita si la cita es cierre
            $notificacion = array(
                'user_id' => $data['user_id'],
                'prospecto_id' =>$prospecto->id,
                'tipo' => 'cita',
                'contenido' => $dataCita['observaciones'],
                'titulo' => 'se creo '.$dataCita['tipo_cita'].' para '.$prospecto->nombre,
                'estado' => '1',
                'alerta' =>'0',
                'supervisor' =>$supervisor
            );
            $this->Notificaciones_model->crear_notificacion($notificacion);

        //a la fecha de la cita le restamos un dia para crear la tarea
        $horaCita->modify('-1 day');

        //crear tarea para confirmar cita un dia antes
        $data = array(
            'fecha' => $horaCita->format('Y-m-d H:i:s'),
            'observaciones' => 'Confirmar cita',
            'prospecto_id' => $this->input->post('prospecto_id'),
            'tarea' => 'Llamar',
        );

        $this->Tarea->crear_tarea($data);

        redirect('dashboard', 'refresh');
        $this->load->view('dashboard');
        echo 'desde el controlador';
    }
    public function ResultadoCita()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce cita
        $data['segmento_c'] = $this->uri->segment(4);

        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['citas'] = $this->Cita->datosCitaProspecto($data['segmento_p'], $data['segmento_c']);
        }

        $data['title'] = 'Resultado de cita';
        echo $this->templates->render('resultado_cita', $data);

    }
    public function guardarResultadoCita()
    {
        $data = array(
            'resultado' => $this->input->post('resultado'),
            'prospecto_id' => $this->input->post('prospecto_id'),
            'cita_id' => $this->input->post('cita_id')
        );


        $this->Cita->guardar_resultado_cita($data);
        //actualizamos la actividad del prospecto
        $this->Prospecto_model->actualizado($data['prospecto_id']);
        if ($this->input->post('cerrado')) {
            redirect('proceso/crearProceso/' . $data['prospecto_id'], 'refresh');
        }
        redirect('prospectos/prospectoDetalle/' . $data['prospecto_id'], 'refresh');
    }


}
