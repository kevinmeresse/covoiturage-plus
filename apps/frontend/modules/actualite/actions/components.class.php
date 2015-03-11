<?php

class actualiteComponents extends sfComponents {

    public function executeInfoAccueil() {
        //génération du menu dynamique
        // réalisé à partir du CMS du Backoffice
        /*
        $q1 = Doctrine_Core::getTable('ContenuActualite')
                ->createQuery('ca')
                //->leftJoin('cr.Contenu c')
                ->where('ca.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('ca.etat = 1')
                ->andWhere('ca.en_premiere_page = 1')
                ->orderBy('ca.position')
                ->limit('1')
                ;
                //->addOrderBy('c.priorite');

            //$this->actualite = $q1->fetchOne(); 
        $this->actualite = $q1->execute(); 
        */
       $this->actualite = Doctrine_Core::getTable('ContenuActualite')->getActualiteAccueil();
       //$this->result = print_r($this->actualite);
            
    }
    


}

?>