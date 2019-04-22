<?php
/**
 * Created by PhpStorm.
 * User: carlos samayoa
 * Date: 15/04/2019
 * Time: 07:40 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }
    //proyectos
    function get_proyectos(){
        $query = $this->db->get('proyecto');
        if ($query->num_rows() > 0) return $query;
    }
    function get_proyecto_by_id($id){
        $this->db->where('proyecto_id',$id);
        $query = $this->db->get('proyecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_proyecto($data){
        $proyecto= array(
            'nombre_proyecto'=>$data['nombre'],
            'tipo_proyecto'=>$data['tipo'],
            'descripcion_proyecto'=>$data['descripcion'],
            'estado_proyecto'=>$data['estado'],
        );
        $this->db->insert('proyecto', $proyecto);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function actualizar_proyecto($data){
        $proyecto= array(
            'nombre_proyecto'=>$data['nombre'],
            'tipo_proyecto'=>$data['tipo'],
            'descripcion_proyecto'=>$data['descripcion'],
            'estado_proyecto'=>$data['estado'],
        );
        $this->db->where('proyecto_id', $data['proyecto_id']);
        $query = $this->db->update('proyecto',$proyecto);
    }
    //tipos de casa
    function get_tipos_de_casas(){
        $query = $this->db->get('tipos_casa');
        if ($query->num_rows() > 0) return $query;
    }
    function get_tipo_casa_by_id($id){
        $this->db->where('proyecto_id',$id);
        $query = $this->db->get('proyecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_tipo_casa($data){
        $tipo_casa= array(
            'nombre_casa'=>$data['nombre'],
            'proyecto_id'=>$data['proyecto']
        );
        $this->db->insert('tipos_casa', $tipo_casa);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function get_info_tipo_casa_by_id($id){
        $this->db->where('tipo_casa_id',$id);
        $query = $this->db->get('tipos_casa');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function actualizar_tipo_casa($data){
        $tipo_casa= array(
            'nombre_casa'=>$data['nombre'],
            'proyecto_id'=>$data['proyecto'],
            'estado_tipo_casa'=>$data['estado']
        );
        $this->db->where('tipo_casa_id', $data['tipo_casa_id']);
        $query = $this->db->update('tipos_casa',$tipo_casa);
    }

}