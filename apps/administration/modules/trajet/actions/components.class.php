<?php

class trajetComponents extends sfComponents {
    /*
     * liste les  trajets liées à un covoitureur
     */

    public function executeListeTrajetCovoitureur() {

        $this->trajets = Doctrine_Core::getTable('Trajet')
                ->createQuery('t')
                ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.id_utilisateur = ?',$this->id_utilisateur)
                ->orderBy('t.date_modification DESC')
                ->limit(sfConfig::get('app_max_trajet_equipage_list'))
                ->execute();
    }
    
    /*
     * liste les  trajets liées à un covoitureur pour association à un équipage
     */

    public function executeListeTrajetCovoitureurMer() {

        $this->trajets = Doctrine_Core::getTable('Trajet')
                ->createQuery('t')
                ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.id_utilisateur = ?',$this->id_covoitureur_demandeur)
                ->orderBy('t.date_modification DESC')
                ->limit(sfConfig::get('app_max_trajet_equipage_list'))
                ->execute();
        
        //récupération d' l'id equipage pour affichage du bouton association trajet/equipage si le trajet n'est pas rattaché
        //$this->id_equipage//
        
        //initialisation de l'indicateur si le trajet est équipagé avec l'équipage en cours (utilisé dans le template
        $this->indTrajetEquipageEnCours = false;
        
        //initialisation d'un indicateur sur trajet equipage
        $this->indTrajetEquipage = false;
        
        //indicateur de l'état de la MER
    }
    
    /*
     * liste les desrniers trajets liées à la communauté de commune
     */

    public function executeListeTrajetEquipage() {

        $this->trajets = Doctrine_Core::getTable('Trajet')
                ->createQuery('t')
                ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->orderBy('t.date_modification DESC')
                ->limit(sfConfig::get('app_max_trajet_equipage_list'))
                ->execute();
    }

    /*
     * liste les  trajets liées à un équipage et récupération 
     * des mer liée aux trajets
     */

    public function executeListeTrajetAssocEquipage() {
        
        /*
        $this->trajets = Doctrine_Core::getTable('Trajet')
                ->createQuery('t')
                ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.id_equipage = ?', $this->id_equipage)
                ->orderBy('t.date_modification')
                //->limit(sfConfig::get('app_max_trajet_equipage_list'))
                ->execute();
        
       
            select *
            FROM trajet t
            left join trajet_mise_en_relation tmer on tmer.id_trajet = t.id_trajet
             WHERE t.id_site = '200'
            AND t.id_equipage = '118' 
         * *
         */
        
        $q = Doctrine_Query::create()
              ->select('t.*, tmer.id_trajet_mise_en_relation as tmerid, tmer.etat as tmeretat')
              ->from('Trajet t')
              ->leftJoin('t.TrajetMiseEnRelation tmer')
              ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.id_equipage = ?', $this->id_equipage)
                ->orderBy('t.date_modification')
                ;
        
        $this->trajets = $q->execute();
        $this->id_trajet_origine = $this->id_trajet_origine;
    }

    /*
     * liste les covoitureurs pour un équipage
     */

    public function executeListeTrajetPourEquipage(sfWebRequest $request) {
        

        
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';
        $this->tab_ville_autoc['etablissement'] = '';
        $this->tab_ville_autoc['ville_etape'] = '';

        $this->form = new TrajetRecherchePourEquipageForm();

        //initialisation du champ trajet initial avec l'id_trajet
        $this->form->setDefault('id_equipage', $this->id_equipage);


        //passage de l'id equipage
        $this->id_equipage = $this->id_equipage;
        
    }
    

    /*     * ************************************************ */
    /*           Statistiques Trajets                    */
    /*     * ************************************************ */

    /*
     * répartition des trajets par statut
     */

    public function executeStatTrajetStatut(sfWebRequest $request) {
        //tableau de la liste des établissements
        $tab_etablissement = array();
        
        //indicateur indiquant si une liste (d'id) d'atblissement est founie
        $ind_etabl = 0;


        //récupération des id etabliseemnt appartenant également à une société
        if ($this->tab_stat_param['etablissement'] != '') {

            //recuperation de l'id (si il existe)
            $outil = new Util();
            $id = $outil->extractIdEtablissement($this->tab_stat_param['etablissement']);

            if ($id != 0) {
                //recuperation de la liste des id etablissement
                $tab_etablissement = array();
                $etablissement = new CpEtablissement();
                $tab_etablissement = $etablissement->getListeEtablissementSociete($id);
                
                if(count($tab_etablissement) != 0){
                    $ind_etabl = 1;
                    
                }else{
                    $ind_etabl = 0;
                }
            }
        }
        
        $Stat = new statistiqueClass();
        $this->tab_result_stat_trajet = $Stat->trajetStat($this->tab_stat_param['date_debut'],
                $this->tab_stat_param['date_fin'],
                $tab_etablissement,
                $this->tab_stat_param['groupe_stat'],
                $this->tab_stat_param['communaute_commune']
                );


         }
    
     /*     * ************************************************ */
    /*           Alerte Trajets                    */
    /*     * ************************************************ */
    
    /*
     * liste les derniers trajets enregistrés
     */

    public function executeAlerteNewTrajet() {

        $this->trajets = Doctrine_Core::getTable('Trajet')
                ->createQuery('t')
                ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.etat = 1')
                ->orderBy('t.date_modification DESC')
                ->limit(sfConfig::get('app_max_trajet_alerte'))
                ->execute();
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
    
    
    /************************************************* */
    /*           Visualisation Trajets                    */
    /************************************************* */
    
    /*
     * visualisation du résumé du trajet d'un covoitureur
     */

    public function executeShowTrajetCovoitureur() {

        $this->trajet = Doctrine_Core::getTable('Trajet')->find($this->id_trajet);

    }
    
    /*
     * visualisation du résumé du trajet d'un covoitureur en tableau horizontal
     */
    public function executeShowTrajetCovoitureurTab() {

        $this->trajet = Doctrine_Core::getTable('Trajet')->find($this->id_trajet);

    }
    
    /*
     * visualisation du résumé du trajet d'un covoitureur en tableau horizontal
     * avec détail des horaires de prise et fin service
     */
    public function executeShowTrajetCovoitureurTabService() {

        $this->trajet = Doctrine_Core::getTable('Trajet')->find($this->id_trajet);

    }


     /*
     * liste les  trajets liées à un covoitureur
     */

    public function executeFormRecherche(sfWebRequest $request) {

        if (!isset($this->tab_ville_autoc)) {
            //tableau des parametres passé en autocomplétion
            $this->tab_ville_autoc = array();
            $this->tab_ville_autoc['depart_ville'] = '';
            $this->tab_ville_autoc['destination_ville'] = '';
        }else{
            $this->tab_ville_autoc = $this->tab_ville_autoc;
        }

        $this->form = new TrajetRechercheForm(array(), array('filtre' => $this->filtre));
        //print_r($this->filtre);
    }

    /*
     * liste les covoitureurs liés à un équipage au travers des trajets liés
     */

    public function executeListCovoitureurPourEquipage(sfWebRequest $request) {

        if (isset($this->id_equipage)) {
            //tableau des parametres passé en autocomplétion
            $this->trajets = Doctrine_Core::getTable('Trajet')->getEquipageListeCovoitureur($this->id_equipage);
            
        }else{
            $this->trajets = null;
        }

    }

}

?>