<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {
    //  Return the client ID
    public function login($numero, $type) {
        $this->db->where('immatriculation', $numero);
        $this->db->where('idtype', $type);
        $id_client = $this->db->get('client')->row();        
        if($id_client) {
            return $id_client;
        } else {
            return $this->signup($numero, $type);
        }
    }
    public function signup($numero, $type){
        $this->db->insert('client', array('immatriculation' => $numero, 'idType' => $type));
        return $this->db->insert_id(); // Return inserted user ID
    }

    public function reset_client() {
        $this->db->truncate('client');
    }

    //  get all type 
    public function getTypes() {
        return $this->db->get('type')->result_array();
    }

}
?>
