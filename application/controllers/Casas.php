<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/07/2017
 * Time: 10:37 AM
 */
class Casas extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('casas_model');
    }

    public function index()
    {
        $this->load->view('prospectos');
    }
    public function tipo_de_casa_de_proyecto(){
        //get from URL
        $proyecto = $this->input->get('proyecto');

        $proyecto_id = $this->casas_model->tipo_de_casa($proyecto);

        echo json_encode($proyecto_id->result());

    }
    public function casa_de_proyecto(){
        //get from URL
        $proyecto = $this->input->get('proyecto');
        $this->db->where('estado','disponible');

        $proyecto_id = $this->casas_model->lotes($proyecto);

        echo json_encode($proyecto_id->result());

    }

}