<?php

/**
 * LieuTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LieuTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object LieuTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('LieuType');
    }
    
    //filtrage des lieux en fonction du site (id_site)
    //et en fonction du type de lieu qui ne doit pas etre un evenement (evenement=0)
    public function getLieuTypeSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
            ->from('LieuType l');
        }

        $q->andWhere('l.id_site_client = ?', sfConfig::get('sf_id_site_client'));
        $q->andWhere('l.evenement = 0');

        return $q;
    }
    
    //filtrage des lieux en fonction du site (id_site)
    //et en fonction du type de lieu qui  doit  etre un evenement (evenement=1)
    public function getLieuTypeEvenementSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
            ->from('LieuType l');
        }

        $q->andWhere('l.id_site_client = ?', sfConfig::get('sf_id_site_client'));
        $q->andWhere('l.evenement = 1');

        return $q;
    }
}