<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    // Authenticate admin
    public function authenticate($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admin')->row();
    }

    // Set reference date (today's date)
    public function set_reference_date() {
        return date('Y-m-d'); // Current date
    }

    // Create a service
    public function create_service($nom, $duree, $prix) {
        $data = [
            'nom' => $nom,
            'duree' => $duree,
            'prix' => $prix
        ];
        return $this->db->insert('services', $data);
    }

    // Read all services
    public function get_services() {
        return $this->db->get('services')->result();
    }

    // Update a service
    public function update_service($id_service, $nom, $duree, $prix) {
        $data = [
            'nom' => $nom,
            'duree' => $duree,
            'prix' => $prix
        ];
        $this->db->where('id_service', $id_service);
        return $this->db->update('services', $data);
    }

    // Delete a service
    public function delete_service($id_service) {
        $this->db->where('id_service', $id_service);
        return $this->db->delete('services');
    }

    // List quotes
    public function get_devis() {
        $this->db->select('r.*, c.nom AS client_name, s.nom AS service_name');
        $this->db->from('rendezvous r');
        $this->db->join('clients c', 'r.client_id = c.id');
        $this->db->join('services s', 'r.id_service = s.id_service');
        return $this->db->get()->result();
    }

    // Set payment date for a service
    public function confirme_paiement($id_rdv, $payment_date) {
        $this->db->where('id_rdv', $id_rdv);
        $this->db->set('date_paiement', $payment_date);
        return $this->db->update('rendezvous');
    }

    // Check if payment date is valid
    public function check_date_paiement($id_rdv, $payment_date) {
        $this->db->select('date_debut');
        $this->db->from('rendezvous');
        $this->db->where('id_rdv', $id_rdv);
        $reservation = $this->db->get()->row();

        return strtotime($payment_date) >= strtotime($reservation->date_debut);
    }

}
?>
