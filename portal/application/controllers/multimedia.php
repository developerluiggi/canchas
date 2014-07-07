<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Multimedia extends CI_Controller {

    public function index() {
        $data['main_content'] = 'multimedia/contacto_view';
        $data['title'] = '.: Solo Canchas - Multimedia :.';
        $data['menu_home'] = 'multimedia';
        $this->load->view('master/template_view', $data);
    }

}