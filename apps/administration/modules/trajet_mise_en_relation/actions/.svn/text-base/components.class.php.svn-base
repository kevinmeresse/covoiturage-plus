<?php

class trajet_mise_en_relationComponents extends sfComponents {
    /*     * ************************************************ */
    /*           Statistiques Trajets Mise en Relation        */
    /*     * ************************************************ */

    /*
     * répartition des trajets par statut
     */

    public function executeStatTrajetMerStatut(sfWebRequest $request) {
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

        //tableau de résultat statistique
        $this->tab_result_stat_mer = array();
        
        $Stat = new statistiqueClass();
        $this->tab_result_stat_mer = $Stat->merStat($this->tab_stat_param['date_debut'], $this->tab_stat_param['date_fin'], $tab_etablissement, $tab_etablissement,$this->tab_stat_param['groupe_stat_nom'],$this->tab_stat_param['communaute_commune_nom']);


        
    }

    /*     * ************************************************ */
    /*           Alertes Trajets Mise en Relation        */
    /*     * ************************************************ */

    public function executeAlerteMer(sfWebRequest $request) {


        $this->liste_cmpt = 0;
        $this->test = 1;

        //récupération de la date du jour
        $now = date("Y-m-d");

        //sélection des enregistrements du jour et à venir
        $this->mises_en_relations = Doctrine_Core::getTable('TrajetMiseEnRelation')
                ->createQuery('tmer')
                // ->where('a.cp_action_etb_cp_etablissement_id = ?',$this->etb)
                ->where('tmer.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->orderBy('tmer.date_creation DESC')
                ->limit('10')
                ->execute();

        //si le nom d'élément retourné est vide affcihe un message de liste vide
        $this->nb_mises_en_relations = $this->mises_en_relations->count();
    }
    
    
    /*******************************************************************/
    /*   liste des MER relatives à un équipage au travers des trajets  */
    /*******************************************************************/
    public function executeEquipageMer(sfWebRequest $request) {
        $id_equipage = $request->getParameter('id_equipage');
        
        
    }

}

?>