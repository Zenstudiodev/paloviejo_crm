<?php

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class User extends CI_Model
{
    function get_users(){
        return $this->db->get('users');
    }

    function userData($id){
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
    function listado_de_vendedores(){
        $this->db->where('rol','vendedor');
        $query = $this->db->get('users');
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}