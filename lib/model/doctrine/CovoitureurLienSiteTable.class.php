<?php

/**
 * CovoitureurLienSiteTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CovoitureurLienSiteTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CovoitureurLienSiteTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CovoitureurLienSite');
    }
    
    /*
     * filtrage des Contenu en fonction du site (id_site)
     */
    public function getCovoitureurLienSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
            ->from('CovoitureurLienSite c');
        }

        $q->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'));

        return $q;
    }
}