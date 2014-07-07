<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acceso extends CI_Controller {

    public function index() {
        $this->load->view('login/panel_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */