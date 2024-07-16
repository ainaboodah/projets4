<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
		$this->load->model('Rendezvous_model');
		$this->load->library('session');
	}
	public function index()
	{
        if ($this->session->userdata('id_admin')) {
			$this->load->view('admindashboard');
		} else {
            $this->load->view('loginadmin');
		}
	}
    public function logoutAdmin(){
		$this->session->unset_userdata('id_admin');
        $this->load->view('loginadmin');
	}
    public function logAsUserAdmin(){
        $this->session->unset_userdata('id_admin');
        $types = $this->Client_model->getTypes();
		$data['types'] = $types;
        $this->load->view('login',$data);
    }
    public function serviceAdminView(){
        if ($this->session->userdata('id_admin')) {
            $this->load->view('adminservice');
		} else {
            $this->load->view('loginadmin');
		}
    }


    public function listRdv(){

        if ($this->session->userdata('id_admin')) {
            $this->load->view('adminrendezvous');
		} else {
            $this->load->view('loginadmin');
		}
    }
    public function getAjax($datemin, $datemax){
        $data = $this->Rendezvous_model->get_rendezvous_between_dates($datemin, $datemax);
        $response = array('events' => $data);
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($response));
    }

}
