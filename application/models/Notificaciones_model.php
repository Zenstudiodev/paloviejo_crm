<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Notificaciones_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }

    function crear_notificacion($data)
    {
        $fecha = new DateTime();
        $this->db->insert('notificaciones', array(
            'user_id' => $data['user_id'],
            'prospecto_id' => $data['prospecto_id'],
            'tipo' => $data['tipo'],
            'contenido' => $data['contenido'],
            'titulo' => $data['titulo'],
            'fecha' => $fecha->format('Y-m-d H:i:s'),
            'estado' => $data['estado'],
            'alerta' => $data['alerta'],
            'supervisor' => $data['supervisor']
        ));
    }

    function listar_notificaciones($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('estado', 1);
        $this->db->where('alerta', 0);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('notificaciones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function listar_notificaciones_supervisor($rol)
    {
        $this->db->where('supervisor', $rol);
        $this->db->where('estado', 1);
        $this->db->where('alerta', 0);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('notificaciones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function listar_alertas($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('estado', 1);
        $this->db->where('alerta', 1);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('notificaciones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function listar_alertas_supervisor($rol)
    {
        $this->db->where('supervisor', $rol);
        $this->db->where('estado', 1);
        $this->db->where('alerta', 1);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('notificaciones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function notificacion_data($notificacion_id)
    {
        $this->db->where('id', $notificacion_id);
        $this->db->order_by("fecha DESC ");
        $query = $this->db->get('notificaciones');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function notification_switch($notificacion_id)
    {
        $datos = array(
            'estado' => 0
        );
        $this->db->where('notificacion_id', $notificacion_id);
        $query = $this->db->update('notificaciones', $datos);
    }

    function detalle_alerta($id)
    {

        $this->db->select('*');
        $this->db->from('notificaciones');
        $this->db->join('prospecto', 'prospecto.id = notificaciones.prospecto_id');
        $this->db->join('users', 'users.id = notificaciones.user_id');
        $this->db->where('notificacion_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;

    }

}
