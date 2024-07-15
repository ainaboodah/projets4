<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function authenticate($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admin')->row();
    }
    //confirmation de paiement
    // fate de ref
}
?>
