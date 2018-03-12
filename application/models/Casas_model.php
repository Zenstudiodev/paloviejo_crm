<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 13/07/2017
 * Time: 11:20 AM
 */
class casas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }

    public function tipo_de_casa($proyecto)
    {
        $proyecto_id = '';
        switch ($proyecto) {
            case '1':
                $proyecto_id = '1';
                break;
            case '2':
                $proyecto_id = '1';
                break;
            case '3':
                $proyecto_id = '2';
                break;
        }

        $this->db->where('proyecto_id',$proyecto_id);
        $query = $this->db->get('tipos_casa');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}