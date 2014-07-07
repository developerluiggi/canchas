<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Canchas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/ubigeo_model');
    }

    public function index() {
        $data['main_content'] = 'master/body_view';
        $data['title'] = '.: Solo Canchas - Inicio :.';
        $data['menu_home'] = 'canchas';
        $data['list_departamentos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        $this->load->view('master/template_view', $data);
    }

    public function busqueda($criterio) {
        $data['main_content'] = 'canchas/qry_view';
        $data['title'] = '.: Solo Canchas - Busqueda de Canchas :.';
        $data['menu_home'] = 'canchas';
        $this->load->view('master/template_view', $data);
    }

    public function informacion($nombre_cancha) {
        $data['main_content'] = 'canchas/info_cancha_selected_view';
        $data['title'] = '.: Solo Canchas - Información de la Cancha seleccionada :.';
        $data['menu_home'] = 'canchas';
        $this->load->view('master/template_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */