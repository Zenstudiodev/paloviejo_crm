<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 15/04/2019
 * Time: 07:29 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto_model');
        $this->load->model('Proceso_model');
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
    }

    //proyectos
    public function administrar_proyectos()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('listado_proyectos', $data);
    }

    public function administrar_proyectos_inactivos()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('listado_proyectos', $data);
    }

    public function crear_proyecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Listado de proyectos';
        echo $this->templates->render('crear_proyecto', $data);
    }

    public function guardar_proyecto()
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'estado' => $this->input->post('estado'),
        );

        $this->Admin_model->guardar_proyecto($data);
        redirect(base_url() . 'admin/administrar_proyectos/');
    }

    public function editar_proyecto()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //datos del proyectop
        $proyecto_id = $this->uri->segment(3);
        //proyectos
        $data['proyecto'] = $this->Admin_model->get_proyecto_by_id($proyecto_id);

        $data['title'] = 'Editar proyecto';
        echo $this->templates->render('editar_proyecto', $data);
    }

    public function actualizar_proyecto()
    {
        $data = array(
            'proyecto_id' => $this->input->post('proyecto_id'),
            'nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'estado' => $this->input->post('estado'),
        );

        $this->Admin_model->actualizar_proyecto($data);
        redirect(base_url() . 'admin/administrar_proyectos/');
    }

    public function desactivar_proyecto()
    {
    }

    //tipos de casas
    public function administrar_tipos_casas()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['tipos_de_casa'] = $this->Admin_model->get_tipos_de_casas();

        $data['title'] = 'Listado de tipos de casas';
        echo $this->templates->render('listado_tipos_casa', $data);
    }

    public function crear_tipo_de_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();

        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('crear_tipo_casa', $data);
    }

    public function guardar_tipo_de_casa()
    {
        //print_contenido($_POST);
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'proyecto' => $this->input->post('proyecto'),
        );
        $this->Admin_model->guardar_tipo_casa($data);
        redirect(base_url() . 'admin/administrar_tipos_casas/');
    }

    public function editar_tipo_de_casa()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        //tipo de casa
        //datos del proyectop
        $tipo_casa_id = $this->uri->segment(3);
        //datos tipo_casa
        $data['datos_tipo_casa'] = $this->Admin_model->get_info_tipo_casa_by_id($tipo_casa_id);
        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('editar_tipo_casa', $data);
    }

    public function actualizar_tipo_de_casa()
    {
        $data = array(
            'tipo_casa_id' => $this->input->post('tipo_casa_id'),
            'nombre' => $this->input->post('nombre'),
            'proyecto' => $this->input->post('proyecto'),
            'estado' => $this->input->post('estado'),
        );
        $this->Admin_model->actualizar_tipo_casa($data);
        redirect(base_url() . 'admin/administrar_tipos_casas/');
    }

    public function desactivar_tipo_de_casa()
    {
    }

    //porpiedades
    public function administrar_casas()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['casas'] = $this->Admin_model->get_casas();
        $data['title'] = 'Listado de de casas';
        echo $this->templates->render('listado_casas', $data);
    }
    public function crear_casa(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Crear tipo de casa';
        echo $this->templates->render('crear_casa', $data);
    }
    public function guardar_casa(){
        $data = array(
            'lote' => $this->input->post('lote'),
            'proyecto' => $this->input->post('proyecto'),
            'tipo_casa' => $this->input->post('tipo_casa'),
        );

        $this->Admin_model->guardar_casa($data);
        redirect(base_url() . 'admin/administrar_casas/');

    }
    public function get_tipos_casa(){
        header("Access-Control-Allow-Origin: *");
        //datos del proyectop
        $proyecto_id = $this->uri->segment(3);
       // echo $proyecto_id;
        $tipos_de_casa = $this->Admin_model->get_tipos_casa_by_proyecto_id($proyecto_id);
        //imprimimos en formato json el resultado
        if($tipos_de_casa) {
            echo json_encode($tipos_de_casa->result_array());
        }
    }

    //usuarios
    public function administrar_usuarios(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['usuarios'] = $this->Admin_model->get_usuarios();
        $data['title'] = 'Listado de usuarios';
        echo $this->templates->render('listado_usuarios', $data);
    }
    public function crear_usuario(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //alertas y notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);
        //proyectos
        $data['proyectos'] = $this->Admin_model->get_proyectos();
        $data['title'] = 'Crear usuario';
        echo $this->templates->render('crear_usuario', $data);
    }


}