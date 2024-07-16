<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Rendezvous_model');
    }

    // Authenticate admin
    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $admin = $this->Admin_model->authenticate($username, $password);
        if ($admin) {
            $this->session->set_userdata('admin_id', $admin->idAdmin);
            $this->session->set_userdata('role', 'admin');
            redirect('admin/dashboard'); 
        } else {
            $this->session->set_flashdata('error', 'Login Invalide');
            redirect('admin/login');
        }
    }

    // Logout admin
    public function logout() {
        $this->session->unset_userdata('admin_id');
        redirect('admin/login');
    }

    // Create a service
    public function create_service() {
        $nom = $this->input->post('nom');
        $duree = $this->input->post('duree');
        $prix = $this->input->post('prix');

        if ($this->Admin_model->create_service($nom, $duree, $prix)) {
            $this->session->set_flashdata('success', 'Service crée');
            redirect('admin/services');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la création du service');
            redirect('admin/services');
        }
    }

    // Read all services
    public function get_services() {
        $services = $this->Admin_model->get_services();
        $this->load->view('services/list', ['services' => $services]);
    }

    // Update a service
    public function update_service($id_service) {
        $nom = $this->input->post('nom');
        $duree = $this->input->post('duree');
        $prix = $this->input->post('prix');

        if ($this->Admin_model->update_service($id_service, $nom, $duree, $prix)) {
            $this->session->set_flashdata('success', 'Service mis à jour');
            redirect('admin/services');
        } else {
            $this->session->set_flashdata('error', 'Erreur de la mis à jour');
            redirect('admin/services');
        }
    }

    // Delete a service
    public function delete_service($id_service) {
        if ($this->Admin_model->delete_service($id_service)) {
            $this->session->set_flashdata('success', 'Service supprimé');
            redirect('admin/services');
        } else {
            $this->session->set_flashdata('error', 'Erreur de la suppression');
            redirect('admin/services');
        }
    }

    // Liste Devis
    public function get_devis() {
        $devis = $this->Admin_model->get_devis();
        $this->load->view('devis/list', ['devis' => $devis]);
    }

    // confirmation du paiement
    public function confirme_paiement($id_rdv) {
        $payment_date = $this->input->post('payment_date');

        if ($this->Admin_model->check_date_paiement($id_rdv, $payment_date)) {
            if ($this->Admin_model->confirme_paiement($id_rdv, $payment_date)) {
                $this->session->set_flashdata('success', 'Paiement confirmé');
                redirect('admin/quotes');
            } else {
                $this->session->set_flashdata('error', 'Erreur de la confirmation du paiement');
                redirect('admin/quotes');
            }
        } else {
            $this->session->set_flashdata('error', 'Date de paiement invalide');
            redirect('admin/quotes');
        }
    }

    // rendez vous pour le calendrier
    public function get_rendezvous() {
        $appointments = $this->Rendezvous_model->get_rendezvous();
        echo json_encode($appointments);
    }

    // ajouter un rendez vous
    public function ajouter_rdv() {
        $client_id = $this->input->post('client_id');
        $service_id = $this->input->post('service_id');
        $date_debut = $this->input->post('date_debut');
        // $id_slot = $this->input->post('id_slot');

        if ($this->Admin_model->prendre_rdv($client_id, $date_debut, $service_id)) {
            echo json_encode(['status' => 'success', 'message' => 'Rendez-vous ajouté']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erreur pour la prise de rendez-vous']);
        }
    }

    public function import_services() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('csvfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/adminfileinsert', $error);
        } else {
            $file_data = $this->upload->data();
            $csv_file_path = $file_data['full_path'];
            $result = $this->Admin_model->import_services($csv_file_path);
            if (is_array($result)) {
                $data['errors'] = $result;
            } else {
                $data['success'] = 'Services imported successfully.';
            }

            $this->load->view('admin/adminfileinsert', $data);
        }
    }

    public function import_rendezvous() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('csvfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/adminfileinsert', $error);
        } else {
            $file_data = $this->upload->data();
            $csv_file_path = $file_data['full_path'];

            $result = $this->Rendezvous_model->import($csv_file_path);

            if (is_array($result)) {
                $data['errors'] = $result;
            } else {
                $data['success'] = 'Rendezvous imported successfully.';
            }

            $this->load->view('admin/adminfileinsert', $data);
        }
    }
}
?>
