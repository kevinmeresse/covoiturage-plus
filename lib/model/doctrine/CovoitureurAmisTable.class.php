<?php

/**
 * CovoitureurAmisTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CovoitureurAmisTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object CovoitureurAmisTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('CovoitureurAmis');
    }

    /*
     * filtrage des Covoitureurs en fonction du site (id_site)
     * et récupération des informations covoitureur associées
     */

    public function getCovoitureurAmisSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
                    ->select('ca.id_covoitureur AS idutilc1, ca.id_covoitureur_amis AS idutilc2, ca.id_site, ca.commentaire,
                        ca.note, ca.date_insert, ca.valide_message,
                        c1.nom AS nomc1, c1.prenom AS prenomc1,
                        c2.nom AS nomc2, c2.prenom AS prenomc2')
                    ->from('CovoitureurAmis ca')
                    ->leftJoin('ca.Covoitureur c1 ON c1.id_utilisateur=ca.id_covoitureur')
                    ->leftJoin('ca.Covoitureur c2 ON c2.id_utilisateur=ca.id_covoitureur_amis');
        }

        $q->andWhere('ca.id_site = ?', sfConfig::get('sf_id_site_client'));

        return $q;
    }

    /*
     * récupération des informations covoitureur associées
     */

    public function getCovoitureurAmisInfo($id_covoitureur,$id_covoitureur_amis) {

        $q = Doctrine_Query::create()
                ->select('ca.id_covoitureur AS idutilc1, ca.id_covoitureur_amis AS idutilc2, ca.id_site, ca.commentaire,
                        ca.note, ca.date_insert, ca.valide_message,
                        c1.nom AS nomc1, c1.prenom AS prenomc1,
                        c2.nom AS nomc2, c2.prenom AS prenomc2')
                ->from('CovoitureurAmis ca')
                ->leftJoin('ca.Covoitureur c1 ON c1.id_utilisateur=ca.id_covoitureur')
                ->leftJoin('ca.Covoitureur c2 ON c2.id_utilisateur=ca.id_covoitureur_amis')
                ->where('ca.id_covoitureur = ?', $id_covoitureur)
                ->andWhere('ca.id_covoitureur_amis = ?', $id_covoitureur_amis)
                ->fetchOne();


        return $q;
    }

}