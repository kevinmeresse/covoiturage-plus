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
     * liste les covoitureurs liés à un établissement
     *  => recherche dans la table Covoitureur
     */

    public function executeListeInscritsEtb(sfWebRequest $request) {

        $this->pager = new sfDoctrinePager(
                'Covoitureur',
                sfConfig::get('app_max_covoitureur_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($this->etb_id));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    /*     * ************************************************ */
    /*           Statistiques Covoitureurs                    */
    /*     * ************************************************ */


    /*
     * statistiques rapides sur les covoitureurs
     */

    public function executeStatCovoitureurRap() {

        //tableau de la liste des établissements
        $tab_etablissement = array();
        
        //indicateur indiquant si une liste (d'id) d'atblissement est founie
        $ind_etabl = 0;


        //récupération des id etabliseemnt appartenant également à une société
        if ($this->tab_stat_param['etablissement'] != '') {

            //recuperation de l'id (si il existe)
            $outil = new Util();
            $id = $outil->extractIdEtablissement($this->tab_stat_param['etablissement']);
            
            /*
            if ($id != 0) {
                //recuperation de la liste des id etablissement
                //$tab_etablissement = array();
                $etablissement = new CpEtablissement();
                $tab_etablissement = $etablissement->getListeEtablissementSociete($id);
                
            }
             * 
             */
            $tab_etablissement = array();
            $tab_etablissement[$id] = $id;
        }


        $Stat = new statistiqueClass();
        $this->tab_result_stat = $Stat->covoitureurStat($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin'], $tab_etablissement,$this->tab_stat_param['groupe_stat_nom'],$this->tab_stat_param['communaute_commune_nom']);

        //$this->test = print_r($this->tab_result_stat);
        //print_r($this->tab_stat_param['etablissement']);
    }

    /*     * ************************************************ */
    /*           Alertes  Covoitureurs                    */
    /*     * ************************************************ */

    /*
     * liste les covoitureurs pour un équipage
     */

    public function executeAlerteDernierCovoitureur(sfWebRequest $request) {
        //récupération de la date du jour
        $now = date("Y-m-d");

        //liste des covoitureurs non validés par C+
        $this->covoitureurs = Doctrine_Core::getTable('Covoitureur')
                ->createQuery('ce')
                ->where('ce.etat_site_client_validation = ?', 0)
                ->andWhere('ce.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->orderBy('ce.date_creation DESC')
                ->limit('10')
                ->execute();

        //nombre de covoitureurs pour le site concerné
        $qp = Doctrine_Query::create()
                ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoit_site')
                ->from('Covoitureur c')
                ->where('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->fetchArray();

        $this->nbCovoitureurs = $qp[0]['nb_covoit_site'];
    }

}
