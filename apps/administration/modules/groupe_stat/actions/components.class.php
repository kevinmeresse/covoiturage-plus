<?php

class groupe_statComponents extends sfComponents {
    /*     * ************************************************ */
    /*           Statistiques Trajets Mise en Relation        */
    /*     * ************************************************ */

    /*
     * affichage du partial permettant l'affichage des villes présente dans le groupe
     */

    public function executeAddDelVille(sfWebRequest $request) {
        $this->tab_param = $this->tab_param;
        
        //tableau servant serialiser les données (id des villes)
        $this->tab_id_ville = array();

        //valuer de l'id de la ville servant lors de la suppression d'une ville
        $id_ville = 0;

        if(!is_null($this->tab_param) && $this->tab_param != ''){
            $this->tab_id_ville = unserialize($this->tab_param);
        }



        
    }

    

}

?>