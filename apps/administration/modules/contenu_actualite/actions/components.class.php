<?php
class contenu_actualiteComponents extends sfComponents
{
    /*
     * liste les contenus non liés à une rubrique
     */
    public function executeListeContenuActualite()
    {
                
        $this->contenuactualites = Doctrine_Core::getTable('ContenuActualite')
                                    ->createQuery('ca')
                                    ->where('ca.id_site = ?', sfConfig::get('sf_id_site_client'))
                                    //->andWhere('id_rubrique_parente IS NULL OR id_rubrique_parente=0')
                                    ->execute();
        
    }
}
?>