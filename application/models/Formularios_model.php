<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 22/09/2017
 * Time: 12:18 PM
 */

class Formularios_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set('America/Guatemala');
	}
	
	function guardar_master_1($fomrDdata){

		$data= array(
			'fm_1_proceso_id'=>$fomrDdata['proceso_id'],
			'fm_1_prospecto_id'=>$fomrDdata['prospecto_id'],
			'fm_1_nombre'=>$fomrDdata['nombre'],
			'fm_1_edad'=>$fomrDdata['edad'],
			'fm_1_nit'=>$fomrDdata['nit'],
			'fm_1_dpi'=>$fomrDdata['dpi'],
			'fm_1_extendido_en'=>$fomrDdata['extendido_en'],
			'fm_1_nacionalidad'=>$fomrDdata['nacionalidad'],
			'fm_1_estado_civil'=>$fomrDdata['estado_civil'],
			'fm_1_profesión'=>$fomrDdata['profesión'],
			'fm_1_direccion'=>$fomrDdata['direccion'],
			'fm_1_correo'=>$fomrDdata['correo'],
			'fm_1_telefono_casa'=>$fomrDdata['telefono_casa'],
			'fm_1_telefono_celular'=>$fomrDdata['telefono_celular'],
			'fm_1_nombre_sucesor'=>$fomrDdata['nombre_sucesor'],
			'fm_1_dpi_sucesor'=>$fomrDdata['dpi_sucesor'],
			'fm_1_extendido_en_sucesor'=>$fomrDdata['extendido_en_sucesor'],
			'fm_1_correo_sucesor'=>$fomrDdata['correo_sucesor'],
			'fm_1_telefono_sucesor'=>$fomrDdata['telefono_sucesor'],
		);
		$this->db->insert('formulario_master_1', $data);
	}
	function get_formulario_1($proceso_id){
		$this->db->where('fm_1_proceso_id', $proceso_id);
		$query = $this->db->get('formulario_master_1');
		if ($query->num_rows() > 0) return $query;
	}
	function guardar_master_2($fomrDdata){

		$data= array(
			'fm_2_proceso_id'=>$fomrDdata['proceso_id'],
			'fm_2_prospecto_id'=>$fomrDdata['prospecto_id'],
			'fm_2_proyecto'=>$fomrDdata['proyecto'],
			'fm_2_casa_no'=>$fomrDdata['casa'],
			'fm_2_tipo_casa'=>$fomrDdata['tipo'],
			'fm_2_fecha'=>$fomrDdata['fecha'],
			'fm_2_precio'=>$fomrDdata['precio'],
			'fm_2_descuento'=>$fomrDdata['descuento'],
			'fm_2_precio_descuento'=>$fomrDdata['precio_descuento'],
			'fm_2_gastos'=>$fomrDdata['gastos'],
			'fm_2_enganche'=>$fomrDdata['enganche'],
			'fm_2_saldo_fiannciar'=>$fomrDdata['a_financiar'],
			'fm_2_precio_total'=>$fomrDdata['precio_total'],
		);
		$this->db->insert('formulario_master_2', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function guardar_master_2_extra($form_id, $proceso_id, $prospecto_id, $detalle, $valor){
		$data= array(
			'fm_2_extra_fm_2_id'=>$form_id,
			'fm_2_extra_proceso_id'=>$proceso_id,
			'fm_2_extra_prospecto_id'=>$prospecto_id,
			'fm_2_extra_detalle'=>$detalle,
			'fm_2_extra_valor'=>$valor,
		);
		$this->db->insert('formulario_master_2_extra', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;

	}
	function get_formulario_2($proceso_id){
		$this->db->where('fm_2_proceso_id', $proceso_id);
		$query = $this->db->get('formulario_master_2');
		if ($query->num_rows() > 0) return $query;
	}
    function get_formulario_2_extras($proceso_id){
        $this->db->where('fm_2_extra_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_2_extra');
        if ($query->num_rows() > 0) return $query;
    }

	function get_formulario_3($proceso_id){
		$this->db->where('fm_2_proceso_id', $proceso_id);
		$query = $this->db->get('formulario_master_2');
		if ($query->num_rows() > 0) return $query;
	}
    function get_formulario_ive($datos){
        $this->db->where('five_proceso_id', $datos['proceso_id']);
        $this->db->where('five_prospecto_id', $datos['prospecto_id']);
        $query = $this->db->get('formulario_ive');
        if ($query->num_rows() > 0) return $query;
    }


}