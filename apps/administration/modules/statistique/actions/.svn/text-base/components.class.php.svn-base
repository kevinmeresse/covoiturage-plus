<?php
/**
 * statistique components.
 *
 * @package    roulezmailn_v3
 * @subpackage statistique
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statistiqueComponents extends sfComponents
{
  /*
   * statistiques rapides sur les covoitureurs
   */
  public function executeStatCovoitureurRap()
  {


    // Doctrine
      /*
    $query = Doctrine::getTable('News')
              ->createQuery()
              ->orderBy('published_at DESC')
              ->limit(5);

    $this->news = $query->execute();
    *
       *
       */
      /*
   $query = Doctrine::getTable('Covoitureur')
              ->createQuery('c')
              ->select('COUNT(id_utilisateur) as nb_covoitureur')
              ->where('covoitureur.etat = 1 OR covoitureur.etat=13');

   //$query->getSqlQuery();

    //$this->covoitureurNb = $query->execute();
   $this->covoitureurNb = $query->getSqlQuery();
       * 
       */

/*
  $query = Doctrine_Query::create()
              ->select('COUNT(id_utilisateur) as nb_covoitureur')
              ->where('covoitureur.etat = 1 OR covoitureur.etat=13');
  $this->covoitureurNb = $query->getSqlQuery();
  */
/*
   $query = Doctrine_Core::getTable('Covoitureur')
                ->createQuery('c')
              ->select('COUNT(c.id_utilisateur) as nb_covoitureur')
              ->where('c.etat = 1 OR c.etat=13');
   //$this->covoitureurNb = $query->getSqlQuery();
   $covoitureur = $query->execute();
   $this->covoitureurNb = $covoitureur->nb_covoitureur;
   *
 *
 */

   //sélection de la connexion à la base de données adéquate
    //Doctrine_Manager::getInstance()->setCurrentConnection('dbrmv3');
    
   //nombre de covoitureurs
   $q = Doctrine_Query::create()
        ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureur')
        ->from('Covoitureur c')
        ->where('c.etat = 1 OR c.etat=13');
   
        $covoitureurs = $q->fetchArray();

        $this->covoitureurNb =  $covoitureurs[0]['nb_covoitureur'];


    //nombre de comptes de femmes
    $qf = Doctrine_Query::create()
        ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureurf')
        ->from('Covoitureur c')
        ->where(' c.etat = 1 OR c.etat=13')
        ->andWhere('sexe = 2');

        $covoitureursfemme = $qf->fetchArray();

        $this->covoitureurNbF =  $covoitureursfemme[0]['nb_covoitureurf'];



    //nombre de comptes d'homme
    $qh = Doctrine_Query::create()
        ->select('COUNT(DISTINCT c.id_utilisateur) AS nb_covoitureurh')
        ->from('Covoitureur c')
        ->where(' c.etat = 1 OR c.etat=13')
        ->andWhere('sexe = 1');

        $covoitureurshomme = $qh->fetchArray();

        $this->covoitureurNbH =  $covoitureurshomme[0]['nb_covoitureurh'];



  }
  
  /*
   * statistiques rapides sur les trajets
   */
  public function executeStatTrajetRap()
  {
    //sélection de la connexion à la base de données adéquate
    Doctrine_Manager::getInstance()->setCurrentConnection('dbrmv3');

    //nombre de trajets uniques
   $q = Doctrine_Query::create()
        ->select('COUNT(DISTINCT c.id_trajet) AS nb_trajetUnique')
        ->from('trajet c')
        ->where('jour_unique_date <> \'0000-00-00 00:00:00\'')
        ->andWhere('depart_latitude IS NOT NULL OR depart_longitude IS NOT NULL OR destination_latitude IS NOT NULL OR destination_longitude IS NOT NULL')
        ->andWhere('etat = 1');

        $trajets = $q->fetchArray();

        $this->trajetNb =  $trajets[0]['nb_trajetUnique'];

   //distance totale des trajets uniques
   $qd = Doctrine_Query::create()
        ->select('SUM(km) AS sum_trajetUnique')
        ->from('trajet c')
        ->where('jour_unique_date <> \'0000-00-00 00:00:00\'')
        ->andWhere('depart_latitude IS NOT NULL OR depart_longitude IS NOT NULL OR destination_latitude IS NOT NULL OR destination_longitude IS NOT NULL')
        ->andWhere('etat = 1');

   $trajetSom = $qd->fetchArray();

   $this->trajetSomTotTrajet =  $trajetSom[0]['sum_trajetUnique'];

  }
  
  
  
   /*
   * formulaire de tri pour les statistiques
   */
  public function executeFormTriStat()
  {
      
  }


}
