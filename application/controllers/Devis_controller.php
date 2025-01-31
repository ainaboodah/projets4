<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct(){
		parent::__construct();
		$this->load->model('Client_model');
		$this->load->library('session');
	}
	public function index()
	{
        if ($this->session->userdata('id_client')) {
			$this->load->view('devis');
		} else {
            $types = $this->Client_model->getTypes();
            $data['types'] = $types;
            $this->load->view('login',$data);
		}
        
	}
}
