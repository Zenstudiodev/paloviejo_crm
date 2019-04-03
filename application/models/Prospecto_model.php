<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Prospecto_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }
    function get_users()
    {
        return $this->db->get('users');

    }
    function crear_prospecto($data)
    {
        $fecha = new DateTime();
        $this->db->insert('prospecto', array(
            'nombre1' => $data['nombre'],
            'celular1' => $data['celular'],
            'email1' => $data['email'],
            'nombre2' => $data['nombre2'],
            'celular2' => $data['celular2'],
            'email2' => $data['email2'],
            'medio' => $data['medio'],
            'creado_en' =>$fecha->format('Y-m-d H:i:s'),
            'user_id'=>$data['user_id'],
            'actualizado_en'=>$fecha->format('Y-m-d H:i:s'),
            'estado' => 1
        ));
    }
    function actualizar_prospecto($data){
        $datos = array(
            'nombre' => $data['nombre'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'nombre2' => $data['nombre2'],
            'celular2' => $data['celular2'],
            'email2' => $data['email2'],
            'medio' => $data['medio'],
            'estado' => $data['estad'],
        );
        $this->db->where('id', $data['prospecto_id']);
        $query = $this->db->update('prospecto',$datos);
    }
    function guardar_historial_prospecto($data){
        $fecha = new DateTime();

        $this->db->insert('historial_prospecto', array(
            'prospecto_id' => $data['prospecto_id'],
            'user_id' => $data['user_id'],
            'nombre' => $data['nombre'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'nombre2' => $data['nombre2'],
            'celular2' => $data['celular2'],
            'email2' => $data['email2'],
            'medio' => $data['medio'],
            'modificado_en' =>$fecha->format('Y-m-d H:i:s')
        ));
    }
   //lista de prospectos para usuario normal
    function ListarProspectos($user_id){
        $this->db->where('estado',1);
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('prospecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    // obtener lista co0mpleta de prospectos para gerentes y otros roles
    function ListarPsopectosGeneral(){
        $this->db->where('estado',1);
        $query = $this->db->get('prospecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function ListarProspectosinactivos(){
        $this->db->where('estado',0);
        $query = $this->db->get('prospecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function ListarProspecto($id){
        $this->db->where('id',$id);
        $query = $this->db->get('prospecto');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function ProspectosActivos(){
        $this->db->where('estado',1);
        $query = $this->db->get('prospecto');
        if($query->num_rows() > 0) return $query;
    }
    function actualizado($prospecto_id)
    {
        $ahora = new DateTime();
        $data = array(
            'actualizado_en' => $ahora->format('Y-m-d H:i:s')
        );
        $this->db->where('id', $prospecto_id);
        $this->db->update('prospecto', $data);
    }

    function actualizarEstado(){

    }
}
