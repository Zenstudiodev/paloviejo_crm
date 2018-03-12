<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Tarea extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_tareas()
    {
        return $this->db->get('tareas');

    }

    function crear_tarea($data)
    {
        $this->db->insert('tareas', array(
            'prospecto_id' => $data['prospecto_id'],
            'observaciones' => $data['observaciones'],
            'fecha' => $data['fecha'],
            'tarea' => $data['tarea']
        ));
    }

    function ListarTareas(){
        $this->db->order_by("fecha ASC ");
        $query = $this->db->get('tareas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function ListarTareasProspecto($id){
        $this->db->where('prospecto_id',$id);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('tareas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function datosTareaProspecto($prospecto_id, $tarea_id){

        $where = "prospecto_id='".$prospecto_id."' AND id='".$tarea_id."'";
        $this->db->where($where);
        $query = $this->db->get('tareas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_resultado_tarea($data)
    {
        $this->db->insert('resultado_tarea', array(
            'prospecto_id' => $data['prospecto_id'],
            'resultado' => $data['resultado'],
            'tarea_id' => $data['tarea_id'],
        ));
    }
    function ResultadoTareas($prospecto_id){
        $where = "prospecto_id='".$prospecto_id."'";
        $this->db->where($where);
        $query = $this->db->get('resultado_tarea');
        if($query->num_rows() > 0) return $query;
        else return false;
    }


}
