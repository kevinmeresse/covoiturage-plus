<?php
class communaute_communeComponents extends sfComponents
{
    /*
     * liste les villes liées à la communauté de commune
     */
    public function executeListeVilleLiee()
    {
                
        $this->villeLiees = Doctrine_Core::getTable('VilleFr')
                                    ->createQuery('vfr')
                                    ->where('vfr.id_communaute = ?',$this->id_cc)
                                    ->execute();
        
    }
}
?>