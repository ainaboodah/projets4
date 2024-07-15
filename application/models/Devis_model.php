<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv_model extends CI_Model {
    public function save_devis($debut, $service) {
        $data = array('' => $debut,'' => $service);
        $this->db->insert('devis', $data);
    }
    public function getAllDevis() {
        return $this->db->get('devis')->result_array();
    }
}
