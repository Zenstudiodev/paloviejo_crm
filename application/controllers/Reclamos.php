<?php
/**
 * Created by PhpStorm.
 * User: potato
 * Date: 04/02/2019
 * Time: 12:55 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Reclamos extends Base_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('ProspectoModel');
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
    public function crear_reclamo(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Crear reclamo';
        echo $this->templates->render('crear_reclamo', $data);
    }
    public function revisar_reclamo(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Revisar reclamo';
        echo $this->templates->render('revisar_reclamo', $data);
    }
    public function historial_reclamo(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Historial reclamo';
        echo $this->templates->render('historial_reclamos', $data);
    }
    public function ver_item_historial_reclamo(){
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        //datos del prospecto
        $data['segmento_prospecto'] = $this->uri->segment(3);
        //datos del proceso
        $data['segmento_prceso'] = $this->uri->segment(4);
        if (!$data['segmento_prospecto']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            //alertas y notificaciones
            $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
            $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
            $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
            $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

            //datos a pasar a vista
            //pospecto
            $data['ProspectoModel'] = $this->Prospecto->ListarProspecto($data['segmento_prospecto']);
            //proceso
            $data['proceso'] = $this->Proceso_model->ListarProceso($data['segmento_prceso']);

        }
        $data['title'] = 'Item Historial reclamo';
        echo $this->templates->render('item_historial_reclamos', $data);
    }

}