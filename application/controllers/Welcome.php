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
		$numero = $this->input->post('numero');
		$type = $this->input->post('type');
		try {
			$this->session->unset_userdata('id_client');
			$id_client = $this->Client_model->login($numero,$type);
			$this->session->set_userdata('id_client',$id_client->id);
			$this->load->view('accueil');
		} catch (\Throwable $th) {
			//throw $th;
			$data['errorMessage'] = $th->getMessage();
			$types = $this->Client_model->getTypes();
			$data['types'] = $types;
			$this->load->view('login',$data);
		}
	}
	public function loginAdminView(){
		$this->load->view('loginadmin');
	}
	// public function loginAdmin(){
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$admin = $this->Admin_model->authenticate($username,$password);
	// 	if(!is_null($admin)) {
	// 		$this->session->set_userdata('id_admin',$admin->idAdmin);
	// 		$this->load->view('admindashboard');
	// 	}else{
	// 		$data['errorMessage'] = "Username or password incorect.";
	// 		$this->load->view('loginadmin',$data);
	// 	}
	// }
	// Authenticate admin
	public function loginAdmin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$admin = $this->Admin_model->authenticate($username, $password);
		if ($admin) {
			$this->session->set_userdata('admin_id', $admin->idAdmin);
			$this->session->set_userdata('role', 'admin');
			redirect('welcome/dashboard'); 
		} else {
			forward($this, 'welcome/loginadmin', array('error' => 'Login Invalide'));
		}
	}
	public function dashboard() {
        $data ['revenue'] = $this->Admin_model->get_total_revenue();
        $data ['admin_id'] = $this->session->userdata('admin_id');
        forward($this, 'admindashboard', $data);
    }
	public function accueil(){
		if ($this->session->userdata('id_client')) {
			$this->load->view('accueil');
		} else {
			$types = $this->Client_model->getTypes();
			$data['types'] = $types;
			$this->load->view('login',$data);
		}
	}
}
