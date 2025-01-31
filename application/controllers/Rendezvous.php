<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous extends CI_Controller {

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
