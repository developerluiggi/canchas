<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eventos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('model','',TRUE);
	}	
	
    public function index() {
        	$data['main_content'] = 'eventos/eventos_view';
	        $data['title'] = '.: Solo Canchas - Eventos :.';
	        $data['menu_home'] = 'Eventos';
	        $this->load->view('master/template_view', $data);           
    }
    public function registrar(){
    	$data['main_content'] = 'eventos/eventos_view';
        $data['title'] = '.: Solo Canchas - Eventos :.';
        $data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $data);
    }
    public function mostrar($id_evento=null){
    	$data['main_content'] = 'eventos/evento_detalle';
	    $data['title'] = '.: Solo Canchas - Eventos :.';
	    $data['menu_home'] = 'Eventos';
	    $data['prueba'] =$id_evento;
	    if($id_evento!=null)
	    	$this->load->view('master/template_view', $data);
	    else
	    	redirect('/eventos');

    }

	public function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/eventos/manage/';
        $config['total_rows'] = $this->model->count('eventos');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->model->get('eventos','nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto','',$config['per_page'],$this->uri->segment(3));
        
        $this->data['main_content'] = 'eventos/list';
        $this->data['title'] = '.: Solo Canchas - Eventos :.';
        $this->data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $this->data);
       //$this->template->load('content', 'eventos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('eventos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cEveLatitud' => set_value('cEveLatitud'),
					'cEveLongitud' => set_value('cEveLongitud'),
					'cEveTitulo' => set_value('cEveTitulo'),
					'cEveDescripcion' => set_value('cEveDescripcion'),
					'cEveLinkFoto' => set_value('cEveLinkFoto'),
					'cEveLinkFacebook' => set_value('cEveLinkFacebook'),
					'cEveDireccion' => set_value('cEveDireccion'),
					'dEveStartTime' => set_value('dEveStartTime'),
					'dEveEndTime' => set_value('dEveEndTime'),
					'nUbiDepartamento' => set_value('nUbiDepartamento'),
					'nUbiProvincia' => set_value('nUbiProvincia'),
					'nUbiDistrito' => set_value('nUbiDistrito'),
					'dEveFechaRegistro' => set_value('dEveFechaRegistro'),
					'cEveEstado' => set_value('cEveEstado'),
					'nEveCosto' => set_value('nEveCosto')
            );
           
			if ($this->model->add('eventos',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/eventos/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('eventos_add', $this->data);   
        //$this->template->load('content', 'eventos_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('eventos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cEveLatitud' => $this->input->post('cEveLatitud'),
					'cEveLongitud' => $this->input->post('cEveLongitud'),
					'cEveTitulo' => $this->input->post('cEveTitulo'),
					'cEveDescripcion' => $this->input->post('cEveDescripcion'),
					'cEveLinkFoto' => $this->input->post('cEveLinkFoto'),
					'cEveLinkFacebook' => $this->input->post('cEveLinkFacebook'),
					'cEveDireccion' => $this->input->post('cEveDireccion'),
					'dEveStartTime' => $this->input->post('dEveStartTime'),
					'dEveEndTime' => $this->input->post('dEveEndTime'),
					'nUbiDepartamento' => $this->input->post('nUbiDepartamento'),
					'nUbiProvincia' => $this->input->post('nUbiProvincia'),
					'nUbiDistrito' => $this->input->post('nUbiDistrito'),
					'dEveFechaRegistro' => $this->input->post('dEveFechaRegistro'),
					'cEveEstado' => $this->input->post('cEveEstado'),
					'nEveCosto' => $this->input->post('nEveCosto')
            );
           
			if ($this->model->edit('eventos',$data,'nEveID',$this->input->post('nEveID')) == TRUE)
			{
				redirect(base_url().'index.php/eventos/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->model->get('eventos','nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto','nEveID = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('eventos_edit', $this->data);		
        //$this->template->load('content', 'eventos_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->model->delete('eventos','nEveID',$ID);             
            redirect(base_url().'index.php/eventos/manage/');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */