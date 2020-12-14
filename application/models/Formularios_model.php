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
        $this->db->where('fm_5_no_inlcuye_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_5_no_incluye');
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
			'fm_2_precio_desglose'=>$fomrDdata['precio_desglose'],
			'fm_2_gastos'=>$fomrDdata['gastos'],
			'fm_2_enganche'=>$fomrDdata['enganche'],
			'fm_2_saldo_fiannciar'=>$fomrDdata['a_financiar'],
			'fm_2_precio_total'=>$fomrDdata['precio_total'],
		);
		$this->db->insert('formulario_master_2', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function borrar_extras_formulario_2($proceso_id){
        $this->db->where('fm_2_extra_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_2_extra');
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
	function actualizar_master_2($fomrData){
        $data= array(
            'fm_2_proceso_id'=>$fomrData['proceso_id'],
            'fm_2_prospecto_id'=>$fomrData['prospecto_id'],
            'fm_2_proyecto'=>$fomrData['proyecto'],
            'fm_2_casa_no'=>$fomrData['casa'],
            'fm_2_tipo_casa'=>$fomrData['tipo'],
            'fm_2_fecha'=>$fomrData['fecha'],
            'fm_2_precio'=>$fomrData['precio'],
            'fm_2_descuento'=>$fomrData['descuento'],
            'fm_2_precio_descuento'=>$fomrData['precio_descuento'],
            'fm_2_gastos'=>$fomrData['gastos'],
            'fm_2_enganche'=>$fomrData['enganche'],
            'fm_2_saldo_fiannciar'=>$fomrData['a_financiar'],
            'fm_2_precio_total'=>$fomrData['precio_total'],
        );
        $this->db->where('fm_2_id', $fomrData['form_2_id']);
        $this->db->update('formulario_master_2', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
	function get_formulario_2($proceso_id){
		$this->db->where('fm_2_proceso_id', $proceso_id);
		$query = $this->db->get('formulario_master_2');
		if ($query->num_rows() > 0) return $query;
	}
    function get_formulario_2_extras($proceso_id){
        $this->db->order_by('fm_2_extra_id', 'ASC');
        $this->db->where('fm_2_extra_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_2_extra');
        if ($query->num_rows() > 0) return $query;
    }
	function get_formulario_3($proceso_id){
		$this->db->where('fm_2_proceso_id', $proceso_id);
		$query = $this->db->get('formulario_master_2');
		if ($query->num_rows() > 0) return $query;
	}
	function get_formulario_3_pagos($proceso_id){
		$this->db->where('fm_3_pago_id_proceso', $proceso_id);
        $this->db->order_by('fm_3_pago_id', 'ASC');
		$query = $this->db->get('formulario_master_3_pagos');
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
    function guardar_formulario_3_pago($formData){
        //
        $data= array(
            'fm_3_pago_id_formulario'=>$formData['formulario_id'],
            'fm_3_pago_id_proceso'=>$formData['proceso_id'],
            'fm_3_pago_id_prospecto'=>$formData['prospecto_id'],
            'fm_3_pago_pago'=>$formData['pago'],
            'fm_3_pago_fecha'=>$formData['fecha'],
            'fm_3_pago_monto'=>$formData['monto'],
            'desembolso_bancario'=>$formData['desembolso_bancario'],
        );
        $this->db->insert('formulario_master_3_pagos', $data);
    }
    function borrar_pagos_formulario_3($proceso_id){
        $this->db->where('fm_3_pago_id_proceso', $proceso_id);
        $this->db->delete('formulario_master_3_pagos');
    }
    function get_formulario_4($proceso_id){
        $this->db->where('fm_4_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_4');
        if ($query->num_rows() > 0) return $query;
    }
    function get_formulario_4_incluye($proceso_id){
        $this->db->where('fm_4_incluye_proceso_id', $proceso_id);
        $this->db->order_by('fm_4_inlcuye_id', 'ASC');
        $query = $this->db->get('formulario_master_4_incluye');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_formularios_4($fomrDdata){
        $data= array(
            'fm_4_proceso_id'=>$fomrDdata['proceso'],
            'fm_4_prospecto'=>$fomrDdata['prospecto'],
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
    function guardar_incluye_formulario_4($data){
        $incluye_data= array(
            'fm_4_incluye_proceso_id'=>$data['proceso_id'],
            'fm_4_incluye_prospecto_id'=>$data['prospecto_id'],
            'fm_4_id'=>$data['formulario_id'],
            'fm_4_inlcuye_valor'=>$data['valor'],
        );
        $this->db->insert('formulario_master_4_incluye', $incluye_data);
    }
    function borrar_incluye_formulario_4($proceso_id){
        $this->db->where('fm_4_incluye_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_4_incluye');
    }
    function actualizar_master_4($data){

	    $form_data= array(
            'fm_4_seguro'=>$data['seguro_incendio_terremoto'],
            'fm_4_cuota_seguro'=>$data['cuota_seguro'],
            'fm_4_avaluo'=>$data['avaluo_bancario'],
            'fm_4_porcentaje_banrural'=>$data['porcentage_banrural'],
            'fm_4_deposito_energia'=>$data['deposito_energia'],
        );
        $this->db->where('fm_4_id', $data['inlcuye_id']);
        $this->db->update('formulario_master_4', $form_data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function get_formulario_5($proceso_id){
        $this->db->where('fm_5_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_5');
        if ($query->num_rows() > 0) return $query;
    }
    function get_formulario_5_no_incluye($proceso_id){
        $this->db->where('fm_5_no_inlcuye_proceso_id', $proceso_id);
        $this->db->order_by('fm_5_no_inlcuye_id', 'ASC');
        $query = $this->db->get('formulario_master_5_no_incluye');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_formulario_5_no_incluye($data){
        $incluye_data= array(
            'fm_5_no_inlcuye_proceso_id'=>$data['proceso_id'],
            'fm_5_no_inlcuye_prospecto_id'=>$data['prospecto_id'],
            //'fm_4_id'=>$data['formulario_id'],
            'fm_5_no_inlcuye_valor'=>$data['valor'],
        );
        $this->db->insert('formulario_master_5_no_incluye', $incluye_data);
    }
    function borrar_no_incluye_formulario_5($proceso_id){
        $this->db->where('fm_5_no_inlcuye_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_5_no_incluye');
    }
    function get_formulario_6($proceso_id){
        $this->db->where('fm_6_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_6');
        if ($query->num_rows() > 0) return $query;
    }
    function get_formulario_6_og($proceso_id){
        $this->db->where('fm_6_og_proceso_id', $proceso_id);
        $this->db->order_by('fm_6_og_proceso_id', 'ASC');
        $query = $this->db->get('formulario_master_6_og');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_formulario_6($fomrDdata){
        $data= array(
            'fm_6_proceso_id'=>$fomrDdata['proceso'],
            'fm_6_prospecto_id'=>$fomrDdata['prospecto'],
            'fm_6_finca'=>$fomrDdata['finca'],
            'fm_6_folio'=>$fomrDdata['folio'],
            'fm_6_libro'=>$fomrDdata['libro'],
            'fm_6_area'=>$fomrDdata['area'],
            'fm_6_frente'=>$fomrDdata['frente'],
            'fm_6_fondo'=>$fomrDdata['fondo'],
            'fm_6_forma'=>$fomrDdata['forma'],
            'fm_6_metros_construccion'=>$fomrDdata['metros_construccion'],
            'fm_6_dias_de_entrega'=>$fomrDdata['dias_de_entrega'],
            'fm_6_arras'=>$fomrDdata['arras'],
            /*'fm_6_exepto_de_credito'=>$fomrDdata['excepto_de_credito'],*/
        );
        $this->db->insert('formulario_master_6', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function actualizar_master_6($fomrDdata){

        $data= array(
            'fm_6_proceso_id'=>$fomrDdata['proceso'],
            'fm_6_prospecto_id'=>$fomrDdata['prospecto'],
            'fm_6_finca'=>$fomrDdata['finca'],
            'fm_6_folio'=>$fomrDdata['folio'],
            'fm_6_libro'=>$fomrDdata['libro'],
            'fm_6_area'=>$fomrDdata['area'],
            'fm_6_frente'=>$fomrDdata['frente'],
            'fm_6_fondo'=>$fomrDdata['fondo'],
            'fm_6_forma'=>$fomrDdata['forma'],
            /*'fm_6_metros_construccion'=>$fomrDdata['metros_construccion'],
            'fm_6_dias_de_entrega'=>$fomrDdata['dias_de_entrega'],
            'fm_6_arras'=>$fomrDdata['arras'],
            'fm_6_exepto_de_credito'=>$fomrDdata['excepto_de_credito'],*/
        );
        $this->db->where('fm_6_id', $fomrDdata['form_6_id']);
        $this->db->update('formulario_master_6', $data);
    }
    function guardar_formulario_6_og($data){
        $incluye_data= array(
            'fm_6_og_proceso_id'=>$data['proceso_id'],
            'fm_6_og_prospecto_id'=>$data['prospecto_id'],
            //'fm_6_id'=>$data['formulario_id'],
            'fm_6_og_valor'=>$data['valor'],
        );
        $this->db->insert('formulario_master_6_og', $incluye_data);
    }
    function borrar_formulario_6_og($proceso_id){
        $this->db->where('fm_6_og_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_6_og');
    }
    function guardar_formulario_8($data){
        $incluye_data= array(
            'fm_8_proceso_id'=>$data['proceso_id'],
            'fm_8_prospecto_id'=>$data['prospecto_id'], //'fm_6_id'=>$data['formulario_id'],
            'fm_8_valor'=>$data['valor'],
        );
        $this->db->insert('formulario_master_8', $incluye_data);
    }
    function borrar_formulario_8($proceso_id){
        $this->db->where('fm_8_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_8');
    }
    function get_formulario_8($proceso_id){
        $this->db->where('fm_8_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_8');
        if ($query->num_rows() > 0) return $query;
    }
    function guardar_formulario_9($data){
        $incluye_data= array(
            'fm_9_proceso_id'=>$data['proceso_id'],
            'fm_9_prospecto_id'=>$data['prospecto_id'], //'fm_6_id'=>$data['formulario_id'],
            'fm_9_valor'=>$data['valor'],
        );
        $this->db->insert('formulario_master_9', $incluye_data);
    }
    function borrar_formulario_9($proceso_id){
        $this->db->where('fm_9_proceso_id', $proceso_id);
        $this->db->delete('formulario_master_9');
    }
    function get_formulario_9($proceso_id){
        $this->db->where('fm_9_proceso_id', $proceso_id);
        $query = $this->db->get('formulario_master_9');
        if ($query->num_rows() > 0) return $query;
    }
    function get_formulario_ive($datos){
        $this->db->where('five_proceso_id', $datos['proceso_id']);
        $this->db->where('five_prospecto_id', $datos['prospecto_id']);
        $query = $this->db->get('formulario_ive');
        if ($query->num_rows() > 0) return $query;
    }


}