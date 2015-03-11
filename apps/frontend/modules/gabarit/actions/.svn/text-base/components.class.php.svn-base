<?php

class gabaritComponents extends sfComponents {

    public function executeHeader() {
        //génération du menu dynamique
        // réalisé à partir du CMS du Backoffice
        
        $rubriques = Doctrine_Core::getTable('ContenuRubrique')
                ->createQuery('cr')
                //->leftJoin('cr.Contenu c')
                ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('cr.etat = 1')
                ->orderBy('cr.priorite')
                ->execute();

        $this->rubriques = $rubriques; 
        
            
    }
    
        public function executeFooter() {
        
    }
     public function executeOutils() {
        
    }
    public function executeMenuSecondaire() {
        //Gestion du nb d'inscrits
        $inscrits = Doctrine_Query::create()
        ->select('COUNT(*) as count')
        ->from('Covoitureur')
        ->where('id_site_client = ?',sfConfig::get('sf_id_site_client'))        
        ->fetchOne();
        
        //
        //$nbInscrits = $inscrits->get("count");
        $nbInscrits = $inscrits['count'];
        $tabInscrits = str_split($nbInscrits, 1);
        
        $this->tabInscrits = $tabInscrits; 
        
    }

}

?>