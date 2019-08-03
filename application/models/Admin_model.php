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
    function get_tipos_casa_by_proyecto_id($proyecto_id){
        $this->db->where('proyecto_id',$proyecto_id);
        $query = $this->db->get('tipos_casa');
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
    function guardar_casa($data){
        $tipo_casa= array(
            'lote'=>$data['lote'],
            'proyecto_id'=>$data['proyecto'],
            'tipo_casa_id'=>$data['tipo_casa'],
            'control_casas_descripcion'=>$data['descripcion']
        );
        $query = $this->db->update('control_casas', $tipo_casa);
        $this->db->insert('control_casas', $tipo_casa);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function actualizar_casa($data){
        $tipo_casa= array(
            'lote'=>$data['lote'],
            'proyecto_id'=>$data['proyecto'],
            'tipo_casa_id'=>$data['tipo_casa'],
            'control_casas_descripcion'=>$data['descripcion']
        );
        $this->db->where('casa_id',$data['casa_id']);
        $query = $this->db->update('control_casas', $tipo_casa);

    }
    function get_casas(){
        $query = $this->db->get('control_casas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function get_casa_by_id($id){
        $this->db->where('casa_id',$id);
        $query = $this->db->get('control_casas');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function reservar_casa($casa_id){
        $tipo_casa= array(
            'estado'=>'apartado',
        );
        $this->db->where('casa_id',$casa_id);
        $query = $this->db->update('control_casas', $tipo_casa);
    }
    function liberar_casa($casa_id){
        $tipo_casa= array(
            'estado'=>'disponible',
        );
        $this->db->where('casa_id',$casa_id);
        $query = $this->db->update('control_casas', $tipo_casa);
    }

    //ususarios
    function get_usuarios(){
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function datos_usuario($user_id){
        $this->db->where('id',$user_id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function guardar_usuario($data){
        $usuario= array(
            'username'=>$data['username'],
            'email'=>$data['email'],
            'nombre'=>$data['nombre'],
            'rol'=>$data['rol'],
            'password'=>$data['password']
        );
        $this->db->insert('users', $usuario);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function desactivar_usuario($user_id){
        $ususario= array(
            'estado'=>'inactivo',
        );
        $this->db->where('id', $user_id);
        $query = $this->db->update('users', $ususario);

    }
    function actualizar_usuario($data){
        $usuario= array(
            'username'=>$data['username'],
            'email'=>$data['email'],
            'nombre'=>$data['nombre'],
            'rol'=>$data['rol'],
            'password'=>$data['password']
        );
        $this->db->where('id', $data['user_id']);
        $query = $this->db->update('users', $usuario);
    }
}