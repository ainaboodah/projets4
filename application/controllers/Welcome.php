<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('Admin_model');
		$this->load->library('session');
	}
	public function index()
	{
		$types = $this->Client_model->getTypes();
		$data['types'] = $types;
		$this->load->view('login',$data);
	}
	public function login(){
		$numero = $this->input->get('numero');
		$type = $this->input->get('type');
		$id_client = $this->Client_model->login($numero,$type);
		$this->session->set_userdata('id_client',$id_client->id);
		$this->load-view('index');
	}
	public function loginAdminView(){
		$this->load->view('loginadmin');
	}
	public function loginAdmin(){
		echo "ato ndray izy ato";
	}
}
