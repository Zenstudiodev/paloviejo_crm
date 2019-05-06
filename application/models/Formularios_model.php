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
	function lleno_master_1($proceso_id){
        $this->db->where('fm_1_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_1');
        if ($query->num_rows() > 0) return true;
        else return false;
    }
    function lleno_master_2($proceso_id){
        $this->db->where('fm_2_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_2');
        if ($query->num_rows() > 0) return true;
        else return false;
    }
    function lleno_master_3($proceso_id){
        $this->db->where('fm_3_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_3');
        if ($query->num_rows() > 0) return true;
        else return false;
    }
    function lleno_master_4($proceso_id){
        $this->db->where('fm_4_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_4');
        if ($query->num_rows() > 0) return true;
        else return false;
    }
    function lleno_master_5($proceso_id){
        $this->db->where('fm_5_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_5');
        if ($query->num_rows() > 0) return true;
        else return false;
    }
    function lleno_master_6($proceso_id){
        $this->db->where('fm_6_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_6');
        if ($query->num_rows() > 0) return true;
        else return false;
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
	function guardar_formulario_3($formData){
	    //
        $data= array(
            'fm_3_proceso_id'=>$formData['proceso_id'],
            'fm_3_prospecto_id'=>$formData['prospecto_id'],
            'fm_3_enganche'=>$formData['enganche'],
            'fm_3_saldo'=>$formData['saldo'],
            'fm_3_precio_total'=>$formData['preio_total'],
        );
        $this->db->insert('formulario_master_3', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function guardar_pagos_formulario_3($formData){
        //
        $data= array(
            'fm_3_pago_id_formulario'=>$formData['formulario_id'],
            'fm_3_pago_id_proceso'=>$formData['proceso_id'],
            'fm_3_pago_id_prospecto'=>$formData['prospecto_id'],
            'fm_3_pago_pago'=>$formData['pago'],
            'fm_3_pago_fecha'=>$formData['fecha'],
            'fm_3_pago_monto'=>$formData['monto'],
        );
        $this->db->insert('formulario_master_3_pagos', $data);
    }
    function guardar_formularios_4($fomrDdata){
        $data= array(
            'fm_4_proceso_id'=>$fomrDdata['proceso'],
            'fm_4_prospecto'=>$fomrDdata['prospecto'],
            'fm_4_gabinete'=>$fomrDdata['tipo_gavinete'],
            'fm_4_descuento'=>$fomrDdata['descuento_promocion'],
            'fm_4_seguro'=>$fomrDdata['seguro_incendio_terremoto'],
            'fm_4_cuota_seguro'=>$fomrDdata['cuota_seguro'],
            'fm_4_avaluo'=>$fomrDdata['avaluo_bancario'],
            'fm_4_porcentaje_banrural'=>$fomrDdata['porcentage_banrural'],
            'fm_4_deposito_energia'=>$fomrDdata['deposito_energia'],
        );
        $this->db->insert('formulario_master_4', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function get_formulario_ive($datos){
        $this->db->where('five_proceso_id', $datos['proceso_id']);
        $this->db->where('five_prospecto_id', $datos['prospecto_id']);
        $query = $this->db->get('formulario_ive');
        if ($query->num_rows() > 0) return $query;
    }


}