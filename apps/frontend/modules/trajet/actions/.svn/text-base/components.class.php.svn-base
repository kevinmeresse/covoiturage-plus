<?php

class trajetComponents extends sfComponents {
    /*
     * liste les  trajets liées à un covoitureur
     */

    public function executeFormRecherche(sfWebRequest $request) {

        if (!isset($this->tab_ville_autoc)) {
            //tableau des parametres passé en autocomplétion
            $this->tab_ville_autoc = array();
            $this->tab_ville_autoc['depart_ville'] = '';
            $this->tab_ville_autoc['destination_ville'] = '';
            $this->tab_ville_autoc['etablissement'] = '';
            $this->tab_ville_autoc['id_evenement'] = '';
            $this->tab_ville_autoc['depart_autre_lieu'] = '';
            $this->tab_ville_autoc['destination_autre_lieu'] = '';
            $this->tab_ville_autoc['type_cov'] = '';
            $this->tab_ville_autoc['id_type_trajet'] = '';
            $this->tab_ville_autoc['heure_prise_min'] = '';
            $this->tab_ville_autoc['heure_prise_max'] = '';
            $this->tab_ville_autoc['heure_fin_min'] = '';
            $this->tab_ville_autoc['heure_fin_max'] = '';
            $this->tab_ville_autoc['depart_ville_rayon'] = '';
            $this->tab_ville_autoc['destination_ville_rayon'] = '';
            $this->tab_ville_autoc['horaire_id'] = '';
            $this->tab_ville_autoc['secteur_id'] = '';
            $this->tab_ville_autoc['jour_unique_date'] = '';
        }else{
            $this->tab_ville_autoc = $this->tab_ville_autoc;
        }
        
        $this->form = new TrajetRechercheForm();
        $this->form->setDefault('id_evenement', $this->tab_ville_autoc['id_evenement']);
        $this->form->setDefault('depart_autre_lieu', $this->tab_ville_autoc['depart_autre_lieu']);
        $this->form->setDefault('destination_autre_lieu', $this->tab_ville_autoc['destination_autre_lieu']);
        $this->form->setDefault('type_cov', $this->tab_ville_autoc['type_cov']);
        $this->form->setDefault('id_type_trajet', $this->tab_ville_autoc['id_type_trajet']);
        $this->form->setDefault('heure_prise_min', $this->tab_ville_autoc['heure_prise_min']);
        $this->form->setDefault('heure_prise_max', $this->tab_ville_autoc['heure_prise_max']);
        $this->form->setDefault('heure_fin_min', $this->tab_ville_autoc['heure_fin_min']);
        $this->form->setDefault('heure_fin_max', $this->tab_ville_autoc['heure_fin_max']);
        $this->form->setDefault('depart_ville_rayon', $this->tab_ville_autoc['depart_ville_rayon']);
        $this->form->setDefault('destination_ville_rayon', $this->tab_ville_autoc['destination_ville_rayon']);
        $this->form->setDefault('horaire_id', $this->tab_ville_autoc['horaire_id']);
        $this->form->setDefault('secteur_id', $this->tab_ville_autoc['secteur_id']);
        $this->form->setDefault('jour_unique_date', $this->tab_ville_autoc['jour_unique_date']);
    }
    
    
       public function executeFormRechercheAlloStop(sfWebRequest $request) {

        if (!isset($this->tab_ville_autoc)) {
            //tableau des parametres passé en autocomplétion
            $this->tab_ville_autoc = array();
            $this->tab_ville_autoc['depart_ville'] = '';
            $this->tab_ville_autoc['destination_ville'] = '';
            $this->tab_ville_autoc['etablissement'] = '';
        }else{
            $this->tab_ville_autoc = $this->tab_ville_autoc;
        }
        
        $this->form = new TrajetRechercheAlloStopForm();
    } 
    
    /*
     * liste les  modeles de véhicule liés à une marque de vehicule
     */

    public function executeListVehiculeModeleParMarque() {

        //$vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($request->getParameter('idmarque'));
        $vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($this->idmarque);
        
         $this->tab_modele = array();
        foreach ($vehiculeModeles as $vehiculeModele){
            $this->tab_modele[$vehiculeModele['id_modele']] = $vehiculeModele['nom_modele'] ;
        }

    } 

}

?>