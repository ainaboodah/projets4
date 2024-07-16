<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_model extends CI_Model {
    private $heure_debut = '08:00:00';
    private $heure_fin = '18:00:00';

        public function get_rendezvous() {
            $this->db->select('id_rdv AS id, client_id, id_service, date_debut, date_paiement');
            $this->db->from('rendezvous');
            return $this->db->get()->result();
        }
    
        // // ajouter rdv mbola tsy mazava
        // public function add_appointment($client_id, $service_id, $date_debut, $id_slot) {
        //     $data = [
        //         'client_id' => $client_id,
        //         'id_service' => $service_id,
        //         'date_debut' => $date_debut,
        //         'id_slot' => $id_slot,
        //         'date_paiement' => null
        //     ];
        //     return $this->db->insert('rendezvous', $data);
        // }

    // Fonction pour prendre un rendez-vous
    public function prendre_rdv($client_id, $date_debut, $service_id) {
        $heure_debut = date('H:i:s', strtotime($date_debut));
        if ($heure_debut >= $this->heure_debut && $heure_debut < $this->heure_fin) {
            // Vérifier la durée du service
            $service = $this->db->get_where('services', ['id_service' => $service_id])->row();
            $duree_service = $service->duree;
            $date_fin = date('Y-m-d H:i:s', strtotime("$date_debut + {$service->duree}"));

            // Si le rendez-vous dépasse les heures de travail
            if ($date_fin > date('Y-m-d ' . $this->heure_fin, strtotime($date_debut))) {
                return $this->reserver_multi_jours($client_id, $date_debut, $service_id, $duree_service);
            }
            // Vérifier les slots disponibles
            $slot = $this->check_slots_libres($date_debut, $date_fin);
            if ($slot) {
                return $this->insert_reservation($client_id, $service_id, $date_debut, $slot);
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Aucun slot disponible pour la période demandée'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Heure de début en dehors des heures de travail (8h - 18h)'
            ];
        }
    }

    // Fonction pour vérifier les slots libres
    private function check_slots_libres($date_debut, $date_fin) {
        $query = $this->db->query("
            SELECT s.id, s.slot
            FROM slots s
            LEFT JOIN v_slot_occupe o
            ON s.id = o.id_slot
            AND (
                (o.date_debut < '$date_fin' AND o.date_fin > '$date_debut')
            )
            WHERE o.id_slot IS NULL
            LIMIT 1
        ");
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        } else {
            return false;
        }
    }

    // Fonction pour gérer les réservations qui dépassent l'heure de fermeture
    private function reserver_multi_jours($client_id, $date_debut, $service_id, $duree_service) {
        $date_fin_journee = date('Y-m-d ' . $this->heure_fin, strtotime($date_debut));
        // Vérifier les slots disponibles pour la première partie de la journée
        $id_slot = $this->check_slots_libres($date_debut, $date_fin_journee);

        if ($id_slot) {
            // Enregistrer la première partie de la réservation
            $this->insert_reservation($client_id, $service_id, $date_debut, $id_slot);

            // Calculer le reste de la durée pour le jour suivant
            $remainder_duration = strtotime($duree_service) - (strtotime($this->heure_fin) - strtotime($this->heure_debut));
            $date_debut_suivant = date('Y-m-d 08:00:00', strtotime('+1 day', strtotime($date_debut)));
            $date_fin_suivant = date('Y-m-d H:i:s', strtotime("$date_debut_suivant + $remainder_duration seconds"));
            // Vérifier les slots disponibles pour la deuxième partie de la journée
            $id_slot_suivant = $this->check_slots_libres($date_debut_suivant, $date_fin_suivant);

            if ($id_slot_suivant) {
                // Enregistrer la deuxième partie de la réservation
                return $this->insert_reservation($client_id, $service_id, $date_debut_suivant, $id_slot_suivant);
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Aucun slot disponible pour la période demandée le jour suivant'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Aucun slot disponible pour la période demandée'
            ];
        }
    }


    //  mbola mila ampiana
    public function generate_devis($reservation_id) {
        $this->load->library('pdf');
        $reservation = $this->db->get_where('rendezvous', ['id_rdv' => $reservation_id])->row();
        // Prepare PDF content
        $html = "
            <h1>Devis pour le service</h1>
            <p>Client ID: {$reservation->client_id}</p>
            <p>Service ID: {$reservation->id_service}</p>
            <p>Date de début: {$reservation->date_debut}</p>
            <p>Slot ID: {$reservation->id_slot}</p>
        ";
        $this->pdf->loadHtml($html);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("devis_{$reservation_id}.pdf", array("Attachment" => 0)); // Set Attachment to 0 for inline viewing
    }
    // Import 
    public function import($csvFilePath) {
        $data = array_map('str_getcsv', file($csvFilePath));
        $headers = array_shift($data);
        $errors = [];

        foreach ($data as $row) {
            $headers = array_map('strtolower', $headers);
            $voiture = $row[array_search('voiture', $headers)];
            $typeVoiture = $row[array_search('type voiture', $headers)];
            $dateRdv = $row[array_search('date rdv', $headers)];
            $heureRdv = $row[array_search('heure rdv', $headers)];
            $typeService = $row[array_search('type service', $headers)];
            $montant = $row[array_search('montant', $headers)];
            $datePaiement = $row[array_search('date paiement', $headers)];
            $slot = isset($row[array_search('slot', $headers)]) ? $row[array_search('slot', $headers)] : null;

            $clientId = $this->Client_model->login($voiture, $this->getIdType($typeVoiture));

            $service = $this->db->get_where('services', ['nom' => $typeService])->row();
            if (!$service) {
                $errors[] = "Service not found: $typeService";
                continue;
            }
            if ($montant < 0) {
                $errors[] = "Montant doit être positif";
                continue;
            }
            if (strtotime($datePaiement) < strtotime($dateRdv)) {
                $errors[] = "La date de paiement doit être au moins égale à la date du rendez-vous.";
                continue;
            }

            $dateDebut = "$dateRdv $heureRdv";
            $insertResult = $this->insert_reservation($clientId, $service->id_service, $dateDebut, $slot, $datePaiement);
            if ($insertResult['status'] === 'error') {
                $errors[] = $insertResult['message'];
            }
        }

        if (!empty($errors)) {
            return $errors;
        } else {
            $this->create_travaux();
        }
        return true;
    }

    private function getIdType($typeVoiture) {
        $record = $this->db->get_where('type', ['value' => $typeVoiture])->row();
        if ($record) {
            return $record->id;
        } else {
            $newRecord = ['value' => $typeVoiture];
            $this->db->insert('type', $newRecord);
            return $this->db->insert_id(); 
        }
    }

    private function create_travaux() {
        $query = $this->db->query("
            CREATE OR REPLACE VIEW v_travaux AS
            SELECT rendezvous.*, client.nom AS client_name, services.nom AS service_name
            FROM rendezvous
            JOIN client ON rendezvous.client_id = client.id
            JOIN services ON rendezvous.id_service = services.id_service
        ");
        return $query ? true : false;
    }

    private function insert_reservation($client_id, $service_id, $date_debut, $id_slot, $date_paiement = null) {
        $reservation_data = array(            
            'client_id' => $client_id,
            'id_service' => $service_id,
            'date_debut' => $date_debut,
            'id_slot' => $id_slot,
            'date_paiement' => $date_paiement 
        );
        try {
            $this->db->insert('rendezvous', $reservation_data);
            return [
                'status' => 'success',
                'message' => 'Réservation effectuée avec succès',
                'reservation' => $reservation_data
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function get_total_rendezvous() {
        // Récupérer la date de référence
        $reference_date = $this->db->get('reference')->row()->date;

        $query = $this->db->query("
            SELECT 
                DATE(date_debut) AS date,
                SUM(CASE WHEN date_paiement IS NOT NULL THEN 1 ELSE 0 END) AS payes, 
                SUM(CASE WHEN date_paiement IS NULL THEN 1 ELSE 0 END) AS non_payes 
            FROM rendezvous 
            WHERE date_debut <= '$reference_date'
            GROUP BY DATE(date_debut)
            ORDER BY DATE(date_debut)
        ");

        return $query->result();
    }
    
}
