<?php
class cp_action_etbComponents extends sfComponents
{
    /*
     * liste les actions liées à l'établissement passé en paramètre
     */
    public function executeListeActionEtb()
    {
        $this->id_etb = $this->etb;//
        if($this->etb == 0  ||is_null($this->etb))
        {
            $this->liste_vide = true;
            $this->test = 0;
            return ;
        }
        else {
            $this->liste_vide = false;
            $this->test = 1;

            //sélection des enregistrements relatif à l'etablissement
            $this->cp_action_etbs = Doctrine_Core::getTable('CpActionEtb')
                                    ->createQuery('a')
                                    ->where('a.cp_action_etb_cp_etablissement_id = ?',$this->etb)
                                    ->execute();

            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_vide = $this->cp_action_etbs->count();

            //récupération du nom de l'établissement
            $etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($this->etb));
            //$this->etablissement_nom = $etablissement->getCpEtablissementEtablissementNom();
            
            //différenciation en fonction de la provenance
            if(isset($this->prov) && $this->prov == 'rs'){
                $this->etablissement_nom = $etablissement->getCpEtablissementRaisonSocial();
            }else{
                $this->etablissement_nom = $etablissement->getCpEtablissementEtablissementNom();
            }
        }

    }
    
    /*
     * liste les  alertes des actions 
     */
    public function executeAlerteEtb()
    {
        
            $this->liste_cmpt = 0;
            $this->test = 1;
            
            //récupération de la date du jour
            $now = date("Y-m-d");

            //sélection des enregistrements du jour et à venir
            $this->cp_action_etbs = Doctrine_Core::getTable('CpActionEtb')
                                    ->createQuery('a')
                                   // ->where('a.cp_action_etb_cp_etablissement_id = ?',$this->etb)
                                    ->where('a.cp_action_etb_date_echeance >= ?',$now)
                                    ->orderBy('a.cp_action_etb_date_echeance DESC')
                                    ->execute();

            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_cmpt = $this->cp_action_etbs->count();
        

    }
}
?>