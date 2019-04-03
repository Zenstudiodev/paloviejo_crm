<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends Base_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Prospecto_model');
        $this->load->model('Proceso_model');
        $this->load->model('Documentos_model');
        $this->load->model('User');
        $this->load->model('Notificaciones_model');
    }

    public function index()
    {
        $this->load->view('prospectos');
    }

    public function subirDocumento()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['procesos'] = $this->Proceso_model->ListarProceso($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Subir documento';
        echo $this->templates->render('subir_documento', $data);


        //$this->load->view('subir_documento', $data);
    }

    public function guardarDocumento()
    {

        if ($this->input->post('guardarDocumento')) {
            //Check whether user upload picture
            echo $_FILES['documento']['name'];

            if (!empty($_FILES['documento']['name'])) {
                $nombreArchivo = $this->input->post('tipo_documento') . '-' . $this->input->post('prospecto_id') . '-' . $this->input->post('proceso_id');

                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'gif|jpg|png|PDF';
                $config['file_name'] = $nombreArchivo;
                $config['overwrite'] = TRUE;
                //$config['max_size']      = 100;
                //$config['max_width']     = 1024;
                //$config['max_height']    = 768;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('documento')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('subir_documento', $error);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    //$this->load->view('subir_documento', $data);
                    echo $this->upload->data('file_name');
                    echo $this->upload->data('file_size');
                }
            } else {
                $picture = '';
            }

            //Prepare array of user data
            $documentoData = array(
                'src' => $this->upload->data('file_name'),
                'proceso_id' => $this->input->post('proceso_id'),
                'tipo_documento' => $this->input->post('tipo_documento'),
                'tipo_actor' => $this->input->post('tipo_actor'),
                'extension'=> $this->upload->data('file_type')
            );

            //echo '<pre>';
            //print_r($documentoData);
            //echo '</pre>';


            //Pass user data to model
            $insertUserData = $this->Documentos_model->crear_documento($documentoData);
            redirect('documentos/verDocumentos/' . $this->input->post('prospecto_id') . '/' . $this->input->post('proceso_id'), 'refresh');

            //Storing insertion status message.
            if ($insertUserData) {

            } else {
                echo 'error';
            }
        }


    }

    public function subirPlano()
    {
        //comprobamos session desde el helper de sesion
        $data = compobarSesion();
        // Notificaciones
        $data['notificaciones'] = $this->Notificaciones_model->listar_notificaciones($data['user_id']);
        $data['notificaciones_supervisor'] = $this->Notificaciones_model->listar_notificaciones_supervisor($data['rol']);
        $data['alertas'] = $this->Notificaciones_model->listar_alertas($data['user_id']);
        $data['alertas_supervisor'] = $this->Notificaciones_model->listar_alertas_supervisor($data['rol']);

        //Id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //Id ce Proceso
        $data['segmento_pr'] = $this->uri->segment(4);
        //si no hay segmento en la url
        if (!$data['segmento_p']) {
            redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['procesos'] = $this->Proceso_model->ListarProceso($data['segmento_pr']);
        }
        //titulo de pagina
        $data['title'] = 'Subir documento';
        echo $this->templates->render('subir_planos', $data);
    }
    public function guardarPlano()
    {
        if ($this->input->post('guardarDocumento')) {
            //Check whether user upload picture
            /*echo $_FILES['documento']['name'];
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';*/

            if (!empty($_FILES['documento']['name'])) {
                //CUANDO SUBEN UN PDF
                //TODO procesar pdfs
                if ($_FILES['documento']['type'] == 'application/pdf'){
                    echo 'es PDF';
                }
                // CUANDO SUBEN UNA IMAGEN
                if ($_FILES['documento']['type'] == 'image/jpeg'){

                    $fecha = new DateTime();

                    $nombreArchivo = $this->input->post('tipo_documento') . '-' . $this->input->post('prospecto_id') . '-' . $this->input->post('proceso_id') . '-' .$fecha->format('d-m-y_H-i');
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['file_name'] = $nombreArchivo;
                    $config['overwrite'] = TRUE;
                    //$config['max_size']      = 100;
                    //$config['max_width']     = 1024;
                    //$config['max_height']    = 768;
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('documento')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('subir_documento', $error);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        //$this->load->view('subir_documento', $data);
                        echo $this->upload->data('file_name');
                        echo $this->upload->data('file_size');
                    }
                } else {
                    $picture = '';
                }

                //Prepare array of user data
                $documentoData = array(
                    'src' => $this->upload->data('file_name'),
                    'proceso_id' => $this->input->post('proceso_id'),
                    'tipo_documento' => $this->input->post('tipo_documento'),
                    'extension'=> $this->upload->data('file_type')
                );

                echo '<pre>';
                print_r($documentoData);
                echo '</pre>';

                //Pass user data to model
                $insertUserData = $this->Documentos_model->crear_documento($documentoData);
                redirect('documentos/verDocumentos/' . $this->input->post('prospecto_id') . '/' . $this->input->post('proceso_id'), 'refresh');

                //Storing insertion status message.
                if ($insertUserData) {

                } else {
                    echo 'error';
                }


            }



        }


    }

    public function verDocumentos()
    {
        //id de prospecto
        $data['segmento_p'] = $this->uri->segment(3);
        //id de documento
        $data['segmento_d'] = $this->uri->segment(4);

        if (!$data['segmento_p']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['promitente_comprador'] = $this->Documentos_model->ListarDocumentosPromitenteComprador($data['segmento_d']);
            $data['sucesor'] = $this->Documentos_model->ListarDocumentosPromitenteSucesor($data['segmento_d']);
            $data['propietario'] = $this->Documentos_model->ListarDocumentosPromitentePropietario($data['segmento_d']);
            $data['mandatario'] = $this->Documentos_model->ListarDocumentosPromitenteMandatario($data['segmento_d']);
            $data['gestor'] = $this->Documentos_model->ListarDocumentosPromitenteGestor($data['segmento_d']);
            $data['plano_cotizacion'] = $this->Documentos_model->ListarDocumentosPlanosCotizaciones($data['segmento_d']);

            //$data['documentos'] = $this->Documentos_model->ListarDocumentosProceso($data['segmento_d']);
        }

        $this->load->view('ver_documento', $data);
    }

    public function detalleDocumento()
    {
        $data['segmento_p'] = $this->uri->segment(3);
        $data['segmento_d'] = $this->uri->segment(4);

        if (!$data['segmento_d']) {
            //redirect('prospectos/prospectosList', 'refresh');
        } else {
            $data['prospectos'] = $this->Prospecto_model->ListarProspecto($data['segmento_p']);
            $data['documentos'] = $this->Documentos_model->DetalleDocumento($data['segmento_d']);
        }

        $this->load->view('detalle_documento', $data);
    }
}
