<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetch_rendezvous extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Rendezvous_model');
    }

    public function index() {
        $rendezvous = $this->Rendezvous_model->get_rendezvous();
        echo json_encode($rendezvous);
    }
}
?>
