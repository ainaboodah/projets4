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
            try {
                return $this->signup($numero, $type);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
    public function signup($numero, $type){
        $id_client = $this->db->get_where('client',array('immatriculation' => $numero))->row();        
        if(is_null($id_client)){
            $this->db->insert('client', array('immatriculation' => $numero, 'idType' => $type));
            return $this->db->insert_id(); // Return inserted user ID
        }else{
            throw new Exception("L'immatriculation ". $numero . ' existe déja');
        }
    }

    //  get all type 
    public function getTypes() {
        return $this->db->get('type')->result_array();
    }
}
