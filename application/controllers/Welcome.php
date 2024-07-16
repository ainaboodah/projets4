<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
