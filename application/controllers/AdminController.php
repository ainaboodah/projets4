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
        $this->load->view('login');
    }
    public function serviceAdminView(){
        $this->load->view('adminservice');
    }

}
