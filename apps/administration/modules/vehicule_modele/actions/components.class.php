<?php

class vehicule_modeleComponents extends sfComponents {
    /*
     * liste les  modeles liés à une marque de vehicule
     */

    public function executeListModeleParMarque() {

        //$vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($request->getParameter('idmarque'));
        $vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($this->idmarque);
        
         $this->tab_modele = array();
        foreach ($vehiculeModeles as $vehiculeModele){
            $this->tab_modele[$vehiculeModele['id_modele']] = $vehiculeModele['nom_modele'] ;
        }

    }     

}

?>