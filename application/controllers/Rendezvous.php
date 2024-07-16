<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('Client_model');
		$this->load->model('Rendezvous_model');
		$this->load->library('session');
	}
	public function index()
	{
        if ($this->session->userdata('id_client')) {
            $services = $this->Rendezvous_model->getServiceType();

            $data['services'] = $services;
			$this->load->view('rendezvous',$data);
		} else {
            $types = $this->Client_model->getTypes();
            $data['types'] = $types;
            $this->load->view('login',$data);
		}
	}
    public function takeRdv(){
        $id_client = $this->session->userdata('id_client');

		$date = $this->input->get('daty');
        $hour = $this->input->get('heure');
		$services_id = $this->input->get('typeservice');
		$datetime = $date . ' ' . str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00:00';
		// $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
		try {
			$return = $this->Rendezvous_model->prendre_rdv($id_client,$datetime,$services_id);
			foreach ($return as $r){
				echo $r;
			}
		} catch (\Throwable $th) {
			echo $th->getMessage();
		}

    }
}
