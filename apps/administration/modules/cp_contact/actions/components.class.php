<?php
class cp_contactComponents extends sfComponents
{
    /*
     * liste les actions liées à l'établissement passé en paramètre
     */
    public function executeListeContactEtb()
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
            $this->cp_contacts = Doctrine_Core::getTable('CpContact')
                                    ->createQuery('a')
                                    ->where('a.cp_contact_cp_etablissement_id = ?',$this->etb)
                                    ->execute();
            //si le nom d'élément retourné est vide affcihe un message de liste vide
            $this->liste_vide = $this->cp_contacts->count();

            //récupération du nom de l'établissement
            $etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($this->etb));
            
            //différenciation en fonction de la provenance
            if(isset($this->prov) && $this->prov == 'rs'){
                $this->etablissement_nom = $etablissement->getCpEtablissementRaisonSocial();
            }else{
                $this->etablissement_nom = $etablissement->getCpEtablissementEtablissementNom();
            }
            

        }

    }
}
?>