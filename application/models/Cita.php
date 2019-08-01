<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Cita extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_citas()
    {
        return $this->db->get('citas');
    }
    function crear_cita($data)
    {
        $this->db->insert('citas', array(
            'prospecto_id' => $data['prospecto_id'],
            'user_id' => $data['user_id'],
            'observaciones' => $data['observaciones'],
            'fecha' => $data['fecha'],
            'tipo_cita' => $data['tipo_cita'],
            'fecha_limite' => $data['fecha_limite'],
            'estado' => $data['estado']
        ));
    }
    function ListarCitas($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('citas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function listar_citas_generales(){
        $query = $this->db->get('citas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarCitasProspecto($id){
        $this->db->where('prospecto_id',$id);
        $this->db->order_by("fecha ASC  ");
        $query = $this->db->get('citas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function datosCitaProspecto($prospecto_id, $cita_id){
        $where = "prospecto_id='".$prospecto_id."' AND id='".$cita_id."'";
        $this->db->where($where);
        $query = $this->db->get('citas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function ResultadoCitas($prospecto_id){
        $where = "prospecto_id='".$prospecto_id."'";
        $this->db->where($where);
        $query = $this->db->get('resultado_cita');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_resultado_cita($data)
    {
        $this->db->insert('resultado_cita', array(
            'prospecto_id' => $data['prospecto_id'],
            'resultado' => $data['resultado'],
            'cita_id' => $data['cita_id'],
        ));
    }
    function CitasActivas(){
        $where = "estado='1'";
        $this->db->where($where);
        $query = $this->db->get('citas');
        if($query->num_rows() > 0) return $query;
    }
    function desactivar_citas($cita_id){
        $data = array(
            'estado' => '0',
        );
        $this->db->where('id', $cita_id);
        $this->db->update('citas', $data);
    }
}
