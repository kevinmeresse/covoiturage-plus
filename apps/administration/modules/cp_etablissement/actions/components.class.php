<?php

class cp_etablissementComponents extends sfComponents {
    /*
     * liste les etablissements liés à la raison sociale
     */

    public function executeListeEtablissementPourRs() {


        $this->cp_etablissements = Doctrine_Query::create()
                ->select('*')
                ->from('CpEtablissement')
                ->where('cp_etablissement_etablissement_pere_id = ?', $this->idRs)
                //->orWhere('cp_etablissement_etablissement_pere_id = ?', $idEtab)
                ->orderBy('cp_etablissement_etablissement_nom')
                ->execute();
    }

}

?>