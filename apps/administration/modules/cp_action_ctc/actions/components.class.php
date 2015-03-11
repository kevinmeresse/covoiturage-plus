<?php
class cp_action_ctcComponents extends sfComponents
{
    /*
     * liste les actions liées à l'établissement passé en paramètre
     */
    public function executeListeActionCtc()
    {
        $this->id_ctc = $this->ctc;//
        if($this->ctc == 0  ||is_null($this->ctc))
        {
            $this->liste_vide = 0;
            $this->test = 0;
            return ;
        }
        else {
            //$this->liste_vide = false;
            $this->test = 1;

            //sélection des enregistrements relatif à l'etablissement
            $this->cp_action_ctcs = Doctrine_Core::getTable('CpActionCtc')
                                    ->createQuery('a')
                                    ->where('a.cp_action_ctc_cp_contact_id = ?',$this->ctc)
                                    ->execute();

            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_vide = $this->cp_action_ctcs->count();
        }

    }
    
    /*
     * liste les actions liées aux contacts de l'établissement passé en paramètre
     */
    public function executeListeActionCtcEtb()
    {
        $this->id_etb = $this->etb;//
        if($this->etb == 0  ||is_null($this->etb))
        {
            $this->liste_vide = 0;
            $this->test = 0;
            return ;
        }
        else {
            //$this->liste_vide = false;
            $this->test = 1;

            //sélection des enregistrements relatif à l'etablissement
            $this->cp_action_ctcs = Doctrine_Core::getTable('CpActionCtc')
                                    ->createQuery('a')
                                    ->leftJoin('a.CpContact cpc')
                                    ->where('cpc.cp_contact_cp_etablissement_id = ?',$this->etb)
                                    //->andWhere('a.cp_contact_cp_etablissement_id = ?',$this->etb)
                                    ->execute();

            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_vide = $this->cp_action_ctcs->count();
        }

    }

    /*
     * liste les  alertes des actions des contacts pour la page accueil
     */
    public function executeAlerteCtc()
    {

            $this->liste_cmpt = 0;
            $this->test = 1;

            //récupération de la date du jour
            $now = date("Y-m-d");

            //sélection des enregistrements du jour et à venir
            $this->cp_action_ctcs = Doctrine_Core::getTable('CpActionCtc')
                                    ->createQuery('a')
                                   // ->where('a.cp_action_etb_cp_etablissement_id = ?',$this->etb)
                                    ->where('a.cp_action_ctc_date_echeance >= ?',$now)
                                    ->orderBy('a.cp_action_ctc_date_echeance DESC')
                                    ->execute();

            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_cmpt = $this->cp_action_ctcs->count();


    }
}
?>