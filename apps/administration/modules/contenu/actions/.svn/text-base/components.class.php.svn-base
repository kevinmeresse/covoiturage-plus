<?php
class contenuComponents extends sfComponents
{
    /*
     * liste les contenus non liés à une rubrique
     */
    public function executeListeContenuNonLie()
    {
                
        $this->contenus = Doctrine_Core::getTable('Contenu')->getContenuNonLieRub();
        /*
                                    ->createQuery('cr')
                                    ->where('id_site = ?', sfConfig::get('sf_id_site_client'))
                                    ->andWhere('id_rubrique_parente IS NULL OR id_rubrique_parente=0')
                                    ->execute();
        */
    }
}
?>