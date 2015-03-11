<?php

class covoitureurAmisComponents extends sfComponents {
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

}

?>