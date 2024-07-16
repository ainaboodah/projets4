<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->model('Rendezvous_model');
    }
    // Authenticate admin
    public function authenticate($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('Admin')->row();
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

    // List devis
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

    // reset database
    public function reset_database() {
        $this->check_admin();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->truncate('rendezvous');
        $this->db->truncate('services');
        $this->db->truncate('type');
        $this->Client_model->reset_client();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
        redirect('admin/dashboard');
    }

    private function check_admin() {
        if ($this->session->userdata('role') != 'admin') {
            redirect('login');
        }
    }

    public function import_services($csvFilePath) {
        $data = array_map('str_getcsv', file($csvFilePath));
        $headers = array_shift($data);
        $errors = [];
        foreach ($data as $row) {
            $headers = array_map('strtolower', $headers);
            $service = $row[array_search('nom', $headers)];
            $duree = $row[array_search('duree', $headers)];
            $prix = isset($row[array_search('prix', $headers)]) ? $row[array_search('prix', $headers)] : 0;
    
            if ($duree <= 0) {
                $errors[] = "Durée doit être positive: $service";
                continue;
            }
            $service_data = [
                'nom' => $service,
                'duree' => $duree,
                'prix' => $prix
            ];
    
            $this->db->insert('services', $service_data);
        }
    
        if (!empty($errors)) {
            return $errors;
        }
        return true;
    }    

    public function get_slot_usage($date) {
        $query = $this->db->query("
            SELECT * FROM v_travaux
            WHERE DATE(date_debut) = ?
            GROUP BY id_slot
        ", array($date));
        return $query->result();
    }

    public function get_voiture_jour($date) {
        $query = $this->db->query("
            SELECT client_id, COUNT(client_id) FROM rendezvous
            WHERE DATE(date_debut) = ?
        ", array($date));
        return $query->result();
    }

    public function get_total_revenue() {
        $this->db->select_sum('prix');
        $this->db->where('date_paiement IS NOT NULL', null, false);
        $query = $this->db->get('v_revenue');
        return $query->row()->prix;
    }

    public function get_revenue_by_car_type($startDate, $endDate) {
        $this->db->select('type.value AS car_type, SUM(services.prix) AS total_revenue');
        $this->db->from('rendezvous');
        $this->db->join('services', 'rendezvous.id_service = services.id_service');
        $this->db->join('clients', 'rendezvous.client_id = clients.id');
        $this->db->where('date_paiement IS NOT NULL');
        $this->db->where('date_paiement >=', $startDate);
        $this->db->where('date_paiement <=', $endDate);
        $this->db->group_by('type.value');
        
        $query = $this->db->get('type');
        
        return $query->result();
    }
    

    public function get_details_by_car_type($car_type) {
        $this->db->select('r.*, s.nom AS service_name, c.nom AS client_name');
        $this->db->from('rendezvous r');
        $this->db->join('services s', 'r.id_service = s.id_service');
        $this->db->join('client c', 'r.client_id = c.id');
        $this->db->join('type t', 'c.idtype = t.id');
        $this->db->where('t.value', $car_type);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
