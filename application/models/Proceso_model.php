<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Proceso_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }

    function crear_proceso($data)
    {
        $this->db->insert('proceso', array(
            'casa' => $data['casa'],
            'proyecto_id' => $data['proyecto_id'],
            'tipo_casa_id' => $data['tipo_casa_id'],
            'etapa' => $data['etapa'],
            'prospecto_id' => $data['prospecto_id'],
            'codigo' => $data['codigo']
        ));
    }

    function ListarProcesos($id)
    {
        $this->db->select('*');
        $this->db->from('proceso');
        $this->db->join('proyecto', 'proyecto.proyecto_id = proceso.proyecto_id');
        $this->db->join('tipos_casa', 'tipos_casa.tipo_casa_id = proceso.tipo_casa_id');
        $this->db->where('prospecto_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;

    }
    function ListarProceso($id)
    {
        $this->db->select('*');
        $this->db->from('proceso');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) return $query;
        else return false;

    }

    function get_proceso_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('proceso');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function etapaProsceso($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('proceso');

        $proceso = $query->row_array();
        //echo $proceso['id'];
        $claseEtapa = '';
        switch ($proceso['etapa']) {
            case "Fase Firma y crédito":
                $claseEtapa = 'fase_firma';
                break;
            case "barra":
                echo "i es una barra";
                break;
            case "pastel":
                echo "i es un pastel";
                break;
        }
        return $claseEtapa;
    }

    function proyecto_por_id($id){
	    $this->db->where('proyecto_id', $id);
	    $query = $this->db->get('proyecto');
	    if ($query->num_rows() > 0) return $query;
	    else return false;
    }
	function tipo_casa_por_id($id){
		$this->db->where('tipo_casa_id', $id);
		$query = $this->db->get('tipos_casa');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function get_proceso_by_lote_id($id){
		$this->db->where('casa', $id);
		$query = $this->db->get('proceso');
		if ($query->num_rows() > 0) return $query;
		else return false;
	}
	function guardar_imagen_avance_obra($data){

    }
    function desactivar_proceso($id){
        $proceso= array(
            'proceso_estado'=>'inactivo',
        );
        $this->db->where('id', $id);
        $query = $this->db->update('proceso', $proceso);
    }


}
