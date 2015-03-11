<?php

/**
 * TrajetAlerteTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TrajetAlerteTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TrajetAlerteTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TrajetAlerte');
    }
    
        //filtrage des trajets en fonction du site (id_site)
    public function getTrajetAlerteCovoitureurId($covoitureurId = "") {
            $requete = Doctrine_Query::create()
                    ->from('TrajetAlerte ta')
                    ->Where('ta.id_utilisateur = ?', $covoitureurId);
        return $requete;
    }
    
    /*
     * sélection des alertes pour les trajets deposés ou modifiés du jour
     *   traitement par Batch
     */
    public function getListeAlerteTrajetDuJour(Doctrine_Query $q = null, $param = null) {
        //requete
        if (is_null($q)) {
            $q = Doctrine_Query::create()
                    //->select('t.id_lieu')
                    ->from('TrajetAlerte ta');
        }
        $q->select('ta.id_trajet_alerte as ta_id_trajet_alerte, ta.id_utilisateur as ta_id_utilisateur, cd.id_utilisateur as cd_id_utilisateur, cd.mail as cd_mail,
            ta.id_type_trajet as ta_id_type_trajet, ta.id_depart as ta_id_depart, ta.id_destination as ta_id_destination, ta.mail_utilisateur as ta_mail_utilisateur');
        $q->leftJoin('ta.Covoitureur cd');
        $q->andWhere('ta.etat = 1');
        $q->andWhere('ta.id_site = ?', sfConfig::get('sf_id_site_client'));


        return $q->execute();
    }
}