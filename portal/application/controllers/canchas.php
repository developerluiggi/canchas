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
        $this->load->model('admin/canchas_model');
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
        $data['list_canchas'] = $this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO', '', '', '', ''));

        $this->load->view('master/template_view', $data);
    }

    public function informacion($nombre_cancha_id) {
        $cadena = explode("_", $nombre_cancha_id);
        $data = $this->canchasGet($cadena[1]);
        $data['main_content'] = 'canchas/info_cancha_selected_view';
        $data['title'] = '.: Solo Canchas - Información de la Cancha seleccionada :.';
        $data['menu_home'] = 'canchas';
        $data['list_otrascanchas'] = $this->canchas_model->canchasQryOtros(array('LISTADO-CANCHAS-OTROS', $cadena[1], '', '', ''));
        $this->load->view('master/template_view', $data);
    }

    function canchasGet($nCanId) {
        $query = $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanId, '', '', ''));

        if ($query) {
            $data['nCanID'] = $this->canchas_model->getCanID();
            $data['cCanNombre'] = $this->canchas_model->getCanNombre();
            $data['cCanDescripcion'] = $this->canchas_model->getCanDescripcion();
            $data['cCamLatitud'] = $this->canchas_model->getCanLatitud();
            $data['cCanLongitud'] = $this->canchas_model->getCanLongitud();
            $data['fecha_registro'] = $this->canchas_model->getCanFechaRegistro();
            $data['cCanDireccion'] = $this->canchas_model->getCanDireccion();
            $data['cCamTelefono'] = $this->canchas_model->getCanTelefono();
            $data['nCanNroCanchas'] = $this->canchas_model->getCanNroCanchas();
            $data['cCanFacebook'] = $this->canchas_model->getCanFacebook();
            $data['cCanEmail'] = $this->canchas_model->getCanEmail();
            $data['cCanSitioWeb'] = $this->canchas_model->getCanSitioWeb();
            $data['nCanVisitas'] = $this->canchas_model->getCanVisitas();
            $data['cCanEstado'] = $this->canchas_model->getCanEstado();
            return $data;
        } else {
            return false;
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */