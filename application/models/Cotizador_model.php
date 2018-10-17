<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/08/2017
 * Time: 9:58AM
 */
class Cotizador_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }

    public function guardar_item($item)
    {
        $datos_item = array(
            'nombre' => $item['nombre'],
            'descripcion' => $item['descripcion'],
            'precio' => $item['precio']
        );
        $this->db->insert('items_cotizador', $datos_item);
    }
    function get_items_cotizador(){

        $query = $this->db->get('items_cotizador');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    public function guardar_cotizacion($data){
        $fecha = New DateTime();
        $datos = array(

            'cotizacion_fecha' => $fecha->format('Y-m-d'),
            'cotizacion_prospecto_id' => $data['prospecto_id'],
            'cotizacion_proceso_id' => $data['proceso_id'],
            'cotizacion_items' => $data['items'],
        );
        $this->db->insert('cotizaciones', $datos);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function get_cotizaciones_prospecto($data){
        $this->db->where('cotizacion_prospecto_id', $data['prospecto']);
        $this->db->where('cotizacion_proceso_id', $data['proceso']);
        $query = $this->db->get('cotizaciones');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    public function get_cotizacion($id){
        $this->db->where('cotizacion_id', $id);
        $query = $this->db->get('cotizaciones');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    public function gat_item_data($id){
        $this->db->where('id', $id);
        $query = $this->db->get('items_cotizador');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}