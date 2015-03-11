 <?php

class equipageComponents extends sfComponents {
    /*
     * liste les equipages 
     *  => recherche dans la table CovoitureurEquipages
     */

    public function executeListeRechercheEquipage() {

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
     * Résumé d'un équipage
     * 
     */
    public function executeResumeEquipage() {

        $this->equipage = Doctrine_Core::getTable('Equipage')->find($this->id_equipage);

    }
    
    public function executeResumeEquipageTab() {

        $this->equipage = Doctrine_Core::getTable('Equipage')->find($this->id_equipage);

    }

    /*
     * liste des équipages rattachés à un trajet
     */
    public function executeListeEquipagePourTrajet() {

        $this->equipages = Doctrine_Core::getTable('Equipage')->find($this->id_equipage);

    }
    
    /*     * ************************************************ */
    /*           Statistiques Equipages                    */
    /*     * ************************************************ */

/*
     * nombre équipage
     */

    public function executeStatRapEquipage(sfWebRequest $request) {

              
        //tableau de résultat statistique
        $this->tab_result_stat_equip = array();

        //nombre de covoitureurs
        $q = Doctrine_Query::create()
                ->select('COUNT(DISTINCT e.id_equipage) AS nb_equipage')
                ->from('Equipage e')
                ->where('e.etat = 1 ')
                ->andWhere('e.id_site = ?', sfConfig::get('sf_id_site_client'));

        $equipages = $q->fetchArray();

        $this->tab_result_stat_equip['equipageNb'] = $equipages[0]['nb_equipage'];
    }
    

}

?>