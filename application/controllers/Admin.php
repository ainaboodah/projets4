<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Client_model');
        $this->load->model('Rendezvous_model');
        $this->load->library('table');
    }
    public function index()
    {
        $this->load->view('loginadmin');
    }

    public function reset_bdd()
    {
        $this->Admin_model->reset_database();
    }
    public function datereference()
    {
        $data['admin_id'] = $this->session->userdata('admin_id');
        forward($this, 'configurationdate', $data);
    }
    public function set_reference()
    {
        $this->db->truncate('reference');

        // Prepare the data for insertion
        $data = [
            'date' => $this->input->post('dateref') // Assuming 'dateref' is the column name
        ];

        $this->db->insert('reference', $data);
        redirect('admin/datereference');
    }
    // Authenticate admin   
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->authenticate($username, $password);
        if ($admin) {
            $this->session->set_userdata('admin_id', $admin->idAdmin);
            $this->session->set_userdata('role', 'admin');
            redirect('admin/dashboard');
        } else {
            forward($this, 'admin/loginadmin', array('error' => 'Login Invalide'));
        }
    }

    public function dashboard($pls = null)
    {
        $data['revenue'] = $this->Admin_model->get_total_revenue();
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['rendezvous_data'] = $this->Rendezvous_model->get_total_rendezvous();
        $data['types'] = $this->Client_model->getTypes();
        $data['pls'] = $pls;
        forward($this, 'admindashboard', $data);
    }
    public function detail_ch_voiture()
    {
        $carType = $this->input->post('cartype');
        $details = $this->Admin_model->get_details_by_car_type($carType);
        $data['details'] = $details;
        forward($this, 'car_details_view', $data);
    }

    public function display_car_counts()
    {
        $startDate = $this->input->post('start_date');
        $endDate = $this->input->post('end_date');
        $carCounts = $this->Admin_model->get_revenue_by_car_type($startDate, $endDate);
        $data['car_counts'] = $carCounts;
        redirect('admin/dashboard');
    }
    // Logout admin
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/');
    }

    // Create a service
    public function create_service()
    {
        $nom = $this->input->post('nom');
        $duree = $this->input->post('duree');
        $prix = $this->input->post('prix');

        if ($this->Admin_model->create_service($nom, $duree, $prix)) {
            $this->session->set_flashdata('success', 'Service créé');
            redirect('admin/get_services');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la création du service');
            redirect('admin/get_services');
        }
    }

    // Read all services
    public function get_services()
    {
        $data['admin_id'] = $this->session->userdata('admin_id');
        $data['services'] = $this->Admin_model->get_services();
        forward($this, 'adminservice', $data);
    }

    // Update a service
    public function edit_service($id_service)
    {
        $data['service'] = $this->Admin_model->get_service($id_service); // Fetch the specific service
        forward($this, 'adminservice', $data); // Load the edit view
    }

    public function update_service($id_service)
    {
        $nom = $this->input->post('nom');
        $duree = $this->input->post('duree');
        $prix = $this->input->post('prix');

        if ($this->Admin_model->update_service($id_service, $nom, $duree, $prix)) {
            $this->session->set_flashdata('success', 'Service mis à jour');
            redirect('admin/get_services');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la mise à jour');
            redirect('admin/get_services');
        }
    }

    // Delete a service
    public function delete_service($id_service)
    {
        if ($this->Admin_model->delete_service($id_service)) {
            $this->session->set_flashdata('success', 'Service supprimé');
            redirect('admin/get_services');
        } else {
            $this->session->set_flashdata('error', 'Erreur lors de la suppression');
            redirect('admin/get_services');
        }
    }


    // Liste Devis
    public function get_devis()
    {
        $devis = $this->Admin_model->get_devis();
        $this->load->view('devis/list', ['devis' => $devis]);
    }

    // confirmation du paiement
    public function confirme_paiement($id_rdv)
    {
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
    public function get_rendezvous()
    {
        $appointments = $this->Rendezvous_model->get_rendezvous();
        echo json_encode($appointments);
    }

    public function to_rdv() {
        $data['admin_id'] = $this->session->userdata('admin_id');
        forward($this, 'adminrendezvous', $data);   
    }

    // ajouter un rendez vous
    public function ajouter_rdv()
    {
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

    public function import()
    {
        forward($this, 'adminfileinsert', array('admin_id' => $this->session->userdata('admin_id')));
    }

    public function do_import()
    {
        $this->import_services();
        $this->import_travaux();
    }
    private function import_services()
    {
        if (!empty($_FILES['services']['tmp_name'])) {
            $fileData = $_FILES['services'];
            $filePath = $fileData['tmp_name'];
            $errors = $this->Admin_model->import_services($filePath);
            $data = array('admin_id' => $this->session->userdata('admin_id'));
            if (empty($errors)) {
                $data['message'] = 'Services imported successfully!';
            } else {
                $data['errors'] = $errors;
            }
        } else {
            $data['errors'] = 'No file uploaded.';
        }
        forward($this, 'adminfileinsert', $data);
    }

    private function import_travaux()
    {
        if (!empty($_FILES['travaux']['tmp_name'])) {
            $fileData = $_FILES['travaux'];
            $filePath = $fileData['tmp_name'];

            $errors = $this->Rendezvous_model->import($filePath);
            $data = array('admin_id' => $this->session->userdata('admin_id'));

            if (empty($errors)) {
                $data['message'] = 'Rendezvous imported successfully!';
            } else {
                $data['errors'] = $errors;
            }
        } else {
            $data['errors'] = 'No file uploaded.';
        }
        forward($this, 'adminfileinsert', $data);
    }

    public function slot_usage()
    {
        $this->load->view('admin/slot_usage');
    }
    public function get_slot_usage()
    {
        $date = $this->input->post('date');
        if ($date == NULL) {
            $date = date('Y-m-d');
        }
        $slots = $this->Admin_model->get_slot_usage_for_date($date);
        echo json_encode($slots);
    }
}
