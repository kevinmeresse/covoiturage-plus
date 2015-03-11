<?php

class covoitureurComponents extends sfComponents {
    /*
     * liste les covoitureurs liés à un équipage
     *  => recherche dans la table CovoitureurEquipages
     */

    public function executeListeCovoitureurEquipage() {

        $this->covoitureurEquipages = Doctrine_Core::getTable('EquipageCovoitureur')
                ->createQuery('ce')
                //->leftjoin('ce.Covoitureur c')
                ->where('ce.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('ce.id_equipage = ?', $this->id_equipage)
                ->execute();
    }

    /*
     * liste les covoitureurs pour un équipage
     */

    public function executeListeCovoitureurPourEquipage(sfWebRequest $request) {

        $this->covoitureurEquipages = Doctrine_Core::getTable('Covoitureur')
                ->createQuery('ce')
                ->limit('10')
                ->execute();

        //$this->covoitureurNonEquipages = null;

        $this->form = new CovoitureurRecherchePourEquipageForm();

        //passage de l'id equipage
        $this->id_equipage = $this->id_equipage;
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

    /*     * ************************************************ */
    /*           Statistiques Covoitureurs                    */
    /*     * ************************************************ */


    /*
     * statistiques rapides sur les covoitureurs
     */

    public function executeStatCovoitureurRap() {
        
        //tableau de résultat statistique
        $this->tab_result_stat = array();

        //nombre de covoitureurs
        $q = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureur')
                ->from('Covoitureur c')
                ->where('c.etat = 1 OR c.etat=13')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'));
        
        //gestion des parametres de filtre passé par le formulaire
        if(count($this->tab_stat_param)!=0){
            if($this->tab_stat_param['date_debut']!= null){
                $q->andWhere('c.date_creation BETWEEN ? AND ?',array($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin']));
            }
        }

        $covoitureurs = $q->fetchArray();

        $this->tab_result_stat['covoitureurNb'] = $covoitureurs[0]['nb_covoitureur'];


        //nombre de comptes de femmes
        $qf = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureurf')
                ->from('Covoitureur c')
                ->where(' c.etat = 1 OR c.etat=13')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('sexe = 2');
        
        //gestion des parametres de filtre passé par le formulaire
        if(count($this->tab_stat_param)!=0){
            if($this->tab_stat_param['date_debut']!= null){
                $qf->andWhere('c.date_creation BETWEEN ? AND ?',array($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin']));
            }
        }

        $covoitureursfemme = $qf->fetchArray();

        $this->tab_result_stat['covoitureurNbF'] = $covoitureursfemme[0]['nb_covoitureurf'];



        //nombre de comptes d'homme
        $qh = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureurh')
                ->from('Covoitureur c')
                ->where(' c.etat = 1 OR c.etat=13')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('sexe = 1');
        
       //gestion des parametres de filtre passé par le formulaire
        if(count($this->tab_stat_param)!=0){
            if($this->tab_stat_param['date_debut']!= null){
                $qh->andWhere('c.date_creation BETWEEN ? AND ?',array($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin']));
            }
        }

        $covoitureurshomme = $qh->fetchArray();
        
        $this->tab_result_stat['covoitureurNbH'] = $covoitureurshomme[0]['nb_covoitureurh'];
        
        //Répartition par CSP
        /*
        $qh = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureurh')
                ->from('Covoitureur c')
                ->where(' c.etat = 1 OR c.etat=13')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('sexe = 1');

        $covoitureurshomme = $qh->fetchArray();
        
        $this->tab_result_stat['covoitureurNbH'] = $covoitureurshomme[0]['nb_covoitureurh'];
         * 
         */
      
        //nombre de RSA (en pourcentage)
        // rsa = 1 => beneficie du rsa
        //rsa = 0 => ne beneficie pas du rsa
        $qrsa = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_rsa')
                ->from('Covoitureur c')
                ->where(' c.rsa = 1 ')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'));
        
        //gestion des parametres de filtre passé par le formulaire
        if(count($this->tab_stat_param)!=0){
            if($this->tab_stat_param['date_debut']!= null){
                $qrsa->andWhere('c.date_creation BETWEEN ? AND ?',array($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin']));
            }
        }

        $covoitureursrsa = $qrsa->fetchArray();
        
        if($this->tab_result_stat['covoitureurNb'] != 0){
            $this->tab_result_stat['covoitureurNbRsa'] = ($covoitureursrsa[0]['nb_rsa'] * 100)/$this->tab_result_stat['covoitureurNb'];
        }else{
            $this->tab_result_stat['covoitureurNbRsa'] = 0;
        }
        
                
        //nombre de membre de Peugeot

        $qp = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_peugeot')
                ->from('Covoitureur c')
                ->where('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('c.id_site_site = ?', sfConfig::get('sf_id_site_peugeot'));
        
       //gestion des parametres de filtre passé par le formulaire
        if(count($this->tab_stat_param)!=0){
            if($this->tab_stat_param['date_debut']!= null){
                $qp->andWhere('c.date_creation BETWEEN ? AND ?',array($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin']));
            }
        }

        $covoitureurspgt = $qp->fetchArray();

            $this->tab_result_stat['covoitureurNbPgt'] = $covoitureurspgt[0]['nb_peugeot'] ;
        
        
    }
    
     /*     * ************************************************ */
    /*           Identification Covoitureur                    */
    /*     * ************************************************ */

    //composant générique qui permet de switcher entre le formulaire d'identification
    //   et les donnée du covoitureur (une fois que celui-ci est identifié)
    public function executeCovoitureurIdentification(sfWebRequest $request) {

        // Instanciation du covoitureur
        $this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getUser()->getAttribute('id_covoitureur')));
        // S'il n'a pas pu être créé (ex: l'id n'existe plus en BDD)
        if ($this->covoitureur == null) {
            // On réinitialise l'id du covoitureur identifié en session
            $this->getUser()->setAttribute('id_covoitureur', 0);
        }
    }
    
    //formulaire d'identification
    public function executeFormCovoitureurIdentification(sfWebRequest $request) {

        // Création du formulaire d'identification
        $this->form = new CovoitureurIdentificationForm();
    }
    
}
