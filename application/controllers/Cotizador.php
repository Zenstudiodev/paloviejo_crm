<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 28/06/2018
 * Time: 2:24 PM
 */
class Cotizador extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('proceso');
        $this->load->model('Prospecto');
        $this->load->model('Proceso_model');
        $this->load->model('Cotizador_model');
        $this->load->model('Cita');
        $this->load->model('Tarea');
        $this->load->model('Notificaciones_model');
        $this->load->model('Formularios_model');
    }

    public function index()
    {

    }

    function crear_items()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // cargamos alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);


        //titulo de pagina
        $data['title'] = 'Crear un item cotizador';
        $data['items_cotizador']= $this->Cotizador_model->get_items_cotizador();
        echo $this->templates->render('crear_item_cotizador', $data);
    }
    function crear_items_acabado()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // cargamos alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //titulo de pagina
        $data['title'] = 'Crear un item cotizador';
        $data['items_cotizador']= $this->Cotizador_model->get_items_cotizador();
        echo $this->templates->render('crear_item_cotizador', $data);
    }

    function subir_foto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // cargamos alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);


        //titulo de pagina
        $data['title'] = 'Crear un item cotizador';
        $data['items_cotizador']= $this->Cotizador_model->get_items_cotizador();
        echo $this->templates->render('subir_foto', $data);
    }

    function guardar_item()
    {

        $item_cotizacion = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
        );
        $this->Cotizador_model->guardar_item($item_cotizacion);

        redirect(base_url().'index.php/cotizador/crear_items');

    }
    function items_cotizador_json(){
        $items_cotizador = $this->Cotizador_model->get_items_cotizador();

        $json_items = json_encode($items_cotizador->result());
        echo $json_items;

    }
}