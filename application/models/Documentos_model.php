<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 11/04/2017
 * Time: 12:11 PM
 */
class Documentos_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set('America/Guatemala');
    }

    function crear_documento($data)
    {
        if ($data['tipo_actor']) {
        } else {
            $data['tipo_actor'] = 'plano_cotizacion';
        }
        $this->db->insert('documento', array(
            'src' => $data['src'],
            'proceso_id' => $data['proceso_id'],
            'tipo_documento' => $data['tipo_documento'],
            'tipo_actor' => $data['tipo_actor'],
            'extension' => $data['extension']
        ));
    }

    function ListarProspectos()
    {
        $query = $this->db->get('ProspectoModel');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosProceso($id)
    {
        $this->db->where('proceso_id', $id);
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosPromitenteComprador($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'Promitente comprador');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosPromitenteSucesor($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'Sucesor');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosPromitentePropietario($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'Propietario');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosPromitenteMandatario($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'Mandatario');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }

    function ListarDocumentosPromitenteGestor($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'Gestor de negocios');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
    function ListarDocumentosPlanosCotizaciones($id)
    {
        $this->db->where('proceso_id', $id);
        $this->db->where('tipo_actor', 'plano_cotizacion');
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }


    function DetalleDocumento($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('documento');
        if ($query->num_rows() > 0) return $query;
        else return false;
    }
}
