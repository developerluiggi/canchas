<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index() {
        $data['main_content'] = 'noticias/contacto_view';
        $data['title'] = '.: Solo Canchas - Noticias :.';
        $data['menu_home'] = 'noticias';
        $this->load->view('master/template_view', $data);
    }

}