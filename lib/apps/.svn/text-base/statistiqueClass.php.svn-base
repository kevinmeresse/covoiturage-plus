<?php


/**
 * statistiqueClass permet de réaliser les statistiques générales
 * chaque méthode réalise les statistiques pour un module particulier
 * (ex : pour les covoitureurs, pour les trajets, ...)
 * @package    roulezmailn_v3
 * @subpackage statistique
 * @author Christophe Vignaud - Seve Informatique
 */
class statistiqueClass {
    
    /**
     * génération des statistiques pour les trajets
     * @access  public
     * @param   string      $dateDebut                  date de début pour filtrage
     * @param   string      $dateFin                    date de fin pour filtrage
     * @param   string      $etablissement              établissement pour filtrage
     * @param   array       $groupeStat                 tableau des Id des villes
     * @param   array       $communauteCommune          tableau des Id des villes
     * @return  array       $tab_result_stat_trajet     retourne un tableau de résultat
     */
    public function trajetStat($dateDebut = null, $dateFin = null, $etablissement = null, $groupeStat = null, $communauteCommune = null) {
        //tableau de résultat statistique
        $tab_result_stat_trajet = array();

         //nombre de trajets déposés (actifs)
        $tab_result_stat_trajet['trajetNb'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNb($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);


        //nombre de trajets conducteur et indifférents(actifs) => trajets occasionnels
        $tab_result_stat_trajet['trajetNbCondOcc'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbCondOcc($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        //nombre de trajets passager  => trajets occasionnels
        $tab_result_stat_trajet['trajetNbPassOcc'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbPassOcc($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);
        
        //nombre de trajets conducteur et indifférents(actifs) => trajets réguliers
        $tab_result_stat_trajet['trajetNbCondReg'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbCondReg($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        //nombre de trajets passager => trajets réguliers
        $tab_result_stat_trajet['trajetNbPassReg'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbPassReg($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        /*         * ****************************************************** */
        /*          répartition par évènements                   */
        /*         * ****************************************************** */

        //nombre de trajets par évènements  
        $tab_result_stat_trajet['trajetNbEvenmt'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbEvnmt($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        /*         * ****************************************************** */
        /*          répartition par ZI                   */
        /*         * ****************************************************** */

        //nombre de trajets par ZI
        $tab_result_stat_trajet['trajetNbZi'] = Doctrine_Core::getTable('Trajet')->getStatTrajetNbZi($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);
        
        /*         * ****************************************************** */
        /*          répartition par ville de départ et destination                  */
        /*         * ****************************************************** */
        
        //top des villes de départ
        $tab_result_stat_trajet['topDepartVille'] = Doctrine_Core::getTable('Trajet')->getStatTopDepart($dateDebut, $dateFin, $tab_result_stat_trajet['trajetNb'],$etablissement,$groupeStat,$communauteCommune);

        //top des villes de destination
        $tab_result_stat_trajet['topDestVille'] = Doctrine_Core::getTable('Trajet')->getStatTopDestination($dateDebut, $dateFin, $tab_result_stat_trajet['trajetNb'],$etablissement,$groupeStat,$communauteCommune);

        /*         * ****************************************************** */
        /*          répartition par lieu de départ et destination                  */
        /*         * ****************************************************** */
        
        //top des villes de départ
        //$tab_result_stat_trajet['topLieuDepart'] = Doctrine_Core::getTable('Trajet')->getStatTopLieuDepart($dateDebut, $dateFin, $tab_result_stat_trajet['trajetNb'],$etablissement,$groupeStat,$communauteCommune);

        //top des villes de destination
        //$tab_result_stat_trajet['topLieuDest'] = Doctrine_Core::getTable('Trajet')->getStatTopLieuDest($dateDebut, $dateFin, $tab_result_stat_trajet['trajetNb'],$etablissement,$groupeStat,$communauteCommune);

        
        /* ******************************************************* */
        /*          statistiques environnementales                 */
        /* ******************************************************* */

        //distance totale des trajets uniques proposés  aller  
        $tab_result_stat_trajet['trajetSomKmRegulA'] = Doctrine_Core::getTable('Trajet')->getStatTrajetRegulDistA($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);


        //distance totale des trajets uniques proposés  aller et retour
        $tab_result_stat_trajet['trajetSomKmRegulAR'] = Doctrine_Core::getTable('Trajet')->getStatTrajetRegulDistAR($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);


        //distance totale des trajets evités par covoiturage
        //$tab_result_stat_trajet['Co2Evite'] = Doctrine_Core::getTable('Trajet')->getStatCo2Evite($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        //distance parcourue par coviturage et  emission cO2 évitée
        //$tab_result_stat_trajet['CoParcourCo2Evite'] = Doctrine_Core::getTable('Trajet')->getStatCo2Evite($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        $tab_result_stat_trajet['CoParcourCo2Evite'] = Doctrine_Core::getTable('Equipage')->getStatCo2Evite($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);
        //$tab_result_stat_trajet['CoParcourCo2Evite'] = $this->getStatCo2Evite($dateDebut,$dateFin,$etablissement,$groupeStat,$communauteCommune);

        return $tab_result_stat_trajet;
   
    }
    
    
    
    
    /**
     * génération des statistiques pour les covoitureurs
     * @access  public
     * @param   string      $dateDebut                  date de début pour filtrage
     * @param   string      $dateFin                    date de fin pour filtrage
     * @param   string      $etablissement              établissement pour filtrage
     * @param   array       $groupeStat                 tableau des noms des villes
     * @param   array       $communauteCommune          tableau des noms des villes
     * @return  array       $tab_result_stat_trajet     retourne un tableau de résultat
     */
    public function covoitureurStat($dateDebut = null, $dateFin = null, $etablissement = null, $groupeStat = null, $communauteCommune = null) {
        
        //tableau de résultat statistique
        $tab_result_stat = array();
        //nombre de covoitureurs        
        $nb_covoitureur = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureur($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);

        $tab_result_stat['nbCovoitureur'] = $nb_covoitureur;

        //nombre de comptes de femmes
        $tab_result_stat['covoitureurNbF'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurFemme($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);

        //nombre de comptes d'homme
        $tab_result_stat['covoitureurNbH'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurHomme($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);



        //nombre de RSA (en pourcentage)
        // rsa = 1 => beneficie du rsa
        //rsa = 0 => ne beneficie pas du rsa
        $tab_result_stat['covoitureurNbRsa'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurRsa($dateDebut, $dateFin, $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);



        /*         * ************************************************************ */
        //nombre de membre de Peugeot
        $tab_result_stat['covoitureurNbPgt'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurPsa($dateDebut, $dateFin, $groupeStat, $communauteCommune);

        //nb de covoitureur PSA pour calcul %
        $nbCovoitPsa = $tab_result_stat['covoitureurNbPgt'];

        //répartition par equipe PSA                        
        $tab_result_stat['tabEqPsa'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurEquipePsa($dateDebut, $dateFin, $nbCovoitPsa, $groupeStat, $communauteCommune);

        //répartition par horaire PSA                             
        $tab_result_stat['tabHrPsa'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurHorairePsa($dateDebut, $dateFin, $nbCovoitPsa, $groupeStat, $communauteCommune);



        /*         * ************************************************************ */
        //répartition par CSP          
        //$this->tabCsp = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurCsp($dateDebut, $dateFin, $nb_covoitureur,$etablissement);
        
        /*         * ************************************************************ */
        //répartition par Fonctions          
        $tab_result_stat['tabFct'] = Doctrine_Core::getTable('Covoitureur')->getStatNbCovoitureurFct($dateDebut, $dateFin, $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);


        /*         * ************************************************************ */
        //répartition par connaissance de l'association   
        $tab_result_stat['tabLienSite'] = Doctrine_Core::getTable('Covoitureur')->getStatNbLienSite($dateDebut, $dateFin, $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);


        /*         * ************************************************************ */
        //répartition par tranche d'age
        //tranche 1                      
        $tab_result_stat['trancheAge1'] = sfConfig::get('app_tranche_age_1') . " à " . sfConfig::get('app_tranche_age_2') . " ans";
        $tab_result_stat['nbPourCentTrAg1'] = Doctrine_Core::getTable('Covoitureur')->getStatCovoitureurTrancheAge($dateDebut, $dateFin, sfConfig::get('app_tranche_age_1'), sfConfig::get('app_tranche_age_2'), $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);

        //tranche 2                      
        $tab_result_stat['trancheAge2'] = sfConfig::get('app_tranche_age_2') . " à " . sfConfig::get('app_tranche_age_3') . " ans";
        $tab_result_stat['nbPourCentTrAg2'] = Doctrine_Core::getTable('Covoitureur')->getStatCovoitureurTrancheAge($dateDebut, $dateFin, sfConfig::get('app_tranche_age_2'), sfConfig::get('app_tranche_age_3'), $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);


        //tranche 3                       
        $tab_result_stat['trancheAge3'] = sfConfig::get('app_tranche_age_3') . " à " . sfConfig::get('app_tranche_age_4') . " ans";
        $tab_result_stat['nbPourCentTrAg3'] = Doctrine_Core::getTable('Covoitureur')->getStatCovoitureurTrancheAge($dateDebut, $dateFin, sfConfig::get('app_tranche_age_3'), sfConfig::get('app_tranche_age_4'), $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);

        //tranche 4               
        $tab_result_stat['trancheAge4'] = sfConfig::get('app_tranche_age_4') . " à " . sfConfig::get('app_tranche_age_5') . " ans";
        $tab_result_stat['nbPourCentTrAg4'] = Doctrine_Core::getTable('Covoitureur')->getStatCovoitureurTrancheAge($dateDebut, $dateFin, sfConfig::get('app_tranche_age_4'), sfConfig::get('app_tranche_age_5'), $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);
        
        //tranche 5               
        $tab_result_stat['trancheAge5'] = "supérieur à " . sfConfig::get('app_tranche_age_5') . " ans";
        $tab_result_stat['nbPourCentTrAg5'] = Doctrine_Core::getTable('Covoitureur')->getStatCovoitureurTrancheAge($dateDebut, $dateFin, sfConfig::get('app_tranche_age_5'), null, $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);
        
        
        
        /*         * ************************************************************ */
        //principales domiciliation   
        $tab_result_stat['tabDomicile'] = Doctrine_Core::getTable('Covoitureur')->getStatDomiciliation($dateDebut, $dateFin, $nb_covoitureur,$etablissement, $groupeStat, $communauteCommune);

        return $tab_result_stat;
    }
    
    /**
     * génération des statistiques pour les mises en relation
     * @access  public
     * @param   string      $dateDebut                  date de début pour filtrage
     * @param   string      $dateFin                    date de fin pour filtrage
     * @param   string      $etablissement              établissement pour filtrage
     * @param   array       $groupeStat                 tableau des noms des villes
     * @param   array       $communauteCommune          tableau des noms des villes
     * @return  array       $tab_result_stat_trajet     retourne un tableau de résultat
     */
    public function merStat($dateDebut = null, $dateFin = null, $etablissement = null, $groupeStat = null, $communauteCommune = null) {
        $tab_result_stat_mer = array();

        //nombre de Mer déposés (actifs)
        $tab_result_stat_mer['trajetMerNb'] = Doctrine_Core::getTable('TrajetMiseEnRelation')->getStatMerNb($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);


        //nombre de Mer validées
        $tab_result_stat_mer['trajetMerVldNb'] = Doctrine_Core::getTable('TrajetMiseEnRelation')->getStatMerVldNb($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);

        //nombre de Mer refusées
        $tab_result_stat_mer['trajetMerRefNb'] = Doctrine_Core::getTable('TrajetMiseEnRelation')->getStatMerRefNb($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);

        //nombre de Mer annulée  
        $tab_result_stat_mer['trajetMerAnnNb'] = Doctrine_Core::getTable('TrajetMiseEnRelation')->getStatMerAnnNb($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);

        //nombre de Mer sans réponse
        $tab_result_stat_mer['trajetMerSsRepNb'] = Doctrine_Core::getTable('TrajetMiseEnRelation')->getStatMerSsRepNb($dateDebut, $dateFin,$etablissement, $groupeStat, $communauteCommune);
        
        return $tab_result_stat_mer;
    }


}

?>
