<?php

/**
 * ContenuRubriqueTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ContenuRubriqueTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ContenuRubriqueTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ContenuRubrique');
    }
    
    /*
     * filtrage des Rubriques en fonction du site (id_site)
     */
    public function getRubriqueSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
            ->from('ContenuRubrique c');
        }

        $q->andWhere('c.id_site = ?', sfConfig::get('sf_id_site_client'));

        return $q;
    }
}