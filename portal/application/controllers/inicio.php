<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/ubigeo_model');
        $this->load->model('admin/noticias_model');
    }

    public function index() {
        $data['main_content'] = 'master/body_view';
        $data['title'] = '.: Solo Canchas - Inicio :.';
        $data['menu_home'] = 'home';
        $data['list_departamentos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        $data['list_noticias'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-CRITERIO'));
        $this->load->view('master/template_view', $data);
    }
    
    function getUbigeo() {
        $data['Id_Departamento'] = $this->input->post('Id_Departamento');
        $data['Id_Provincia'] = $this->input->post('Id_Provincia');
        $data['name_ubigeo'] = $this->input->post('name_ubigeo');
        $data['name_mantenedor'] = $this->input->post('name_mantenedor');
        $data['accion_ubigeo'] = $this->input->post('accion_ubigeo');
  
        
        if ($data['name_ubigeo'] == 'departamentos') {
            $data['Ubigeo'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        } else if ($data['name_ubigeo'] == 'provincias') {
            $result = $this->ubigeo_model->qryubigeos('L-U-PRO', $data['Id_Departamento'],'', $data['accion_ubigeo'], $data['name_mantenedor'], $data['name_ubigeo']);
            print_r($result);
        } else if ($data['name_ubigeo'] == 'distritos') {
            $result = $this->ubigeo_model->qryubigeos('L-U-DIS', $data['Id_Departamento'], $data['Id_Provincia'], $data['accion_ubigeo'], $data['name_mantenedor'], $data['name_ubigeo']);
            print_r($result);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */