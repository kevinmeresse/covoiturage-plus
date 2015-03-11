<?php

/**
 * TrajetTypeCovoiturageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TrajetTypeCovoiturageTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TrajetTypeCovoiturageTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TrajetTypeCovoiturage');
    }

    /*
     * filtrage des types trajets en fonction du site (id_site)
     *
     * @return query getTrajetSite Retourne les trajets pour le site et dont l'état est actif
     */

    public function getTypeTrajetSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
                    ->select('t.id_type_covoiturage, t.libelle')
                    ->from('TrajetTypeCovoiturage t');
        }
        //$q->andWhere('t.id_type_trajet = 1'); //sélection des trajets réguliers
        $q->andWhere('t.id_site = ?', sfConfig::get('sf_id_site_client'));
        $q->andWhere('t.etat = 1');


        return $q;
    }
}