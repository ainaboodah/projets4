<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv_model extends CI_Model {

    //  erreur si service n'est pas disponible 
    //  reservation détails sinon
    public function reservation($debut, $service) {
        // heure de travail de 8h à 18h
        // if(début >= 8AM and <= 7PM)
        // {
            // $slot = $this->db->where('slot', 'libre');
            // if (debut + $this->db->where('duree', $service) > 7PM) {
            //     save_reservation($debut, $service, $slot);
            //     save_reservation($debut, $service, $slot);
            // }
        //     else {
        //         if ok then save_reservation return $data = service info 
        //     }
        // }
        //  else {
        //     erreurs comme pas ouvert ou depasse l'heure de fermeture...
        //  }
    }

    public function save_reservation($debut, $service, $slot) {
        $this->db->insert('rdv', array('' => $debut,'' => $service, 'slot' => $slot));
    }
    public function getAllRdv() {
        return $this->db->get('rdv')->result_array();

    }
    public function generate_devis() {
        // Impression PDF du devis correspondant au service
    }
}
