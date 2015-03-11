<?php

/**
 * Trajet form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetRecherchePourEquipageForm extends BaseTrajetForm
{
  public function configure()
  {
    /*
      //selection des champs à utiliser pour le formulaire de recherche du front office
      $this->useFields(array('depart_ville','destination_ville','id_equipage'));
      
      //placement du champ id_equipage en caché
      $this->widgetSchema['id_equipage'] = new sfWidgetFormInputHidden();
      
      //gestion du statut (conducteur, passager, indifférent)
      $this->widgetSchema['statut_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->setDefault('statut_cov', 0);
        $this->validatorSchema['statut_cov'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));
      
      //gestion du mail du covoitureur
      $this->widgetSchema['mail_cov'] = new sfWidgetFormInputText(array(),array('size' => 50));
      $this->validatorSchema['mail_cov'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

  */
      
      //recuperation des parametres passés au form
        $filtre = $this->getOption('filtre');
        
        //placement du champ id_equipage en caché
        $this->widgetSchema['id_equipage'] = new sfWidgetFormInputHidden();


        $this->validatorSchema['depart_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['destination_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

        $this->widgetSchema['depart_ville1'] = new sfWidgetFormInputText();
        $this->widgetSchema['destination_ville1'] = new sfWidgetFormInputText();
        
        $this->widgetSchema['ville_etape'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville_etape'] = new sfValidatorString(array('max_length' => 255, 'required' => false));


        //Créeation du tableau des rayons de départ
        $distanceTab = array();
        $distanceTab[''] = '';
        for ($distance = 1; $distance <= 10; $distance++) {
            $distanceMetre = $distance * 1000;
            $distanceTab[$distanceMetre] = $distance.' km';
        }

        $this->widgetSchema['depart_ville_rayon'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $distanceTab
                ));
        
        if (!empty($filtre["depart_ville_rayon"]) ) {
            $this->widgetSchema['depart_ville_rayon']->setDefault($filtre["depart_ville_rayon"]);
        }

        $this->widgetSchema['destination_ville_rayon'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $distanceTab
                ));
        
        if (!empty($filtre["destination_ville_rayon"]) ) {
            $this->widgetSchema['destination_ville_rayon']->setDefault($filtre["destination_ville_rayon"]);
        }


        //détermination du type evenement
        $this->widgetSchema['id_evenement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    'query' => Doctrine::getTable('Lieu')->getLieuEvenementSite(),
                    'add_empty' => true
            //'default' => 15203
                ));
        
        

        if (!empty($filtre["id_evenement"]) ) {
           $this->setDefault('id_evenement',$filtre["id_evenement"] );
        }

        
        $this->validatorSchema['id_evenement'] = new sfValidatorInteger(array('required' => false));


        //détermination des établissements
        /*
        $this->widgetSchema['id_etablissement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpEtablissement',
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    //'query' => Doctrine::getTable('CpEtablissement'),
                    'add_empty' => true,
                ));
        //Test si personne de PSA
        if (sfContext::getInstance()->getUser()->getAttribute('Psa') == '1') {
            $this->widgetSchema['id_etablissement']->addOption('default', sfConfig::get('sf_id_etablissement_psa'));
        }
        $this->validatorSchema['id_etablissement'] = new sfValidatorInteger(array('required' => false));
        */
        
        //initialisation des widget particuliers aux champs etablissement (en autocompletion)-
        $this->widgetSchema['etablissement'] = new sfWidgetFormInputText();
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('max_length' => 200, 'required' => false));


        //détermination des horaire
        $this->widgetSchema['horaire_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpEtablissementHoraire',
                    'add_empty' => true
                ));
        $this->validatorSchema['horaire_id'] = new sfValidatorInteger(array('required' => false));
        


        //détermination des secteurs
        $this->widgetSchema['secteur_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpEtablissementSecteur',
                    'add_empty' => true
                ));
        $this->validatorSchema['secteur_id'] = new sfValidatorInteger(array('required' => false));
        
        //gestion des lieux en fonction de la ville d'origine
        $tabVide = array();
        
        //gestion du lieu de départ
        if (!empty($filtre["depart_ville"][0]["id_ville"]) ) {
               
            $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine_Core::getTable('Lieu')->getLocationsFromCityIdForRecherche($filtre["depart_ville"][0]["id_ville"]),
                        'add_empty' => true,
                    ));

        
        }else{
            $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
        }
        
        if (!empty($filtre["depart_autre_lieu"]) ) {
            $this->widgetSchema['depart_autre_lieu']->setDefault($filtre["depart_autre_lieu"]);
        }
        
        //gestion du lieu de destination
        if (!empty($filtre["destination_ville"][0]["id_ville"]) ) {
               
            $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine_Core::getTable('Lieu')->getLocationsFromCityIdForRecherche($filtre["destination_ville"][0]["id_ville"]),
                        'add_empty' => true,
                    ));

        
        }else{
            $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
        }
            
        
        if (!empty($filtre["destination_autre_lieu"]) ) {
            $this->widgetSchema['destination_autre_lieu']->setDefault($filtre["destination_autre_lieu"]);
        }

        
        //choix du type de covoiturage (conducteur, indifférent, passager)
        $this->widgetSchema['type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager')
                ));
        
        if (!empty($filtre["type_cov"]) and $filtre["type_cov"] != "0") {
            $this->widgetSchema['type_cov']->setDefault($filtre["type_cov"]);
        }
        
        $this->validatorSchema['type_cov'] = new sfValidatorInteger(array('required' => false));

        
        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'régulier', 2 => 'ponctuel', 3 => 'PSA')
                ));
        
         if (!empty($filtre["id_type_trajet"]) ) {
            $this->setDefault('id_type_trajet',$filtre["id_type_trajet"] );
        }
        
        //gestion du champ id_type_trajet en fonction du type trajet choisi
       /*
        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormDoctrineChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'model' => $this->getRelatedModelName('TrajetTypeCovoiturage'),
                    //'query' => Doctrine::getTable('TrajetTypeCovoiturage')->getTypeTrajetSite(),
                    //'add_empty' => true,
                ));*/
        //$this->setDefault('id_type_trajet', 0);

        //gestion des heures de prise et de fin de service
        $horaire_prise = array(); //On crée par exemple un tableau de valeur
        $horaire_prise[''] = '';
        for ($heure = 0; $heure < 24; $heure++) {
            for ($quart = 0; $quart <= 45; $quart = $quart + 15) {
                if (strlen($heure) == 1) {
                    $heure = "0" . $heure;
                }
                if (strlen($quart) == 1) {
                    $quart = "0" . $quart;
                }
                //$temps = $heure.":".$quart.":00";
                $temps = $heure . ":" . $quart;
                $horaire_prise[$temps] = $temps;
            }
        }
        $horaire_prise_list = array_combine($horaire_prise, $horaire_prise);

        $horaire_fin = array(); //On crée par exemple un tableau de valeur
        $horaire_fin[''] = '';
        for ($heure = 0; $heure < 24; $heure++) {
            for ($quart = 0; $quart <= 45; $quart = $quart + 15) {
                if (strlen($heure) == 1) {
                    $heure = "0" . $heure;
                }
                if (strlen($quart) == 1) {
                    $quart = "0" . $quart;
                }
                //$temps = $heure.":".$quart.":00";
                $temps = $heure . ":" . $quart;
                $horaire_fin[$temps] = $temps;
            }
        }
        $horaire_fin_list = array_combine($horaire_fin, $horaire_fin);


        $this->widgetSchema['heure_prise_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_prise_list
                        //'default' => '07:30',
                ));
        if (!empty($filtre["heure_prise_min"]) ) {
            $this->widgetSchema['heure_prise_min']->setDefault($filtre["heure_prise_min"]);
        }
        
        $this->widgetSchema['heure_prise_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_prise_list
                        //'default' => '09:30',
                ));
        if (!empty($filtre["heure_prise_max"]) ) {
            $this->widgetSchema['heure_prise_max']->setDefault($filtre["heure_prise_max"]);
        }

        $this->widgetSchema['heure_fin_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_fin_list
                        //'default' => '17:30',
                ));
        
        if (!empty($filtre["heure_fin_min"]) ) {
            $this->widgetSchema['heure_fin_min']->setDefault($filtre["heure_fin_min"]);
        }
        
        $this->widgetSchema['heure_fin_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_fin_list
                        // 'default' => '19:30',
                ));
        
        if (!empty($filtre["heure_fin_max"]) ) {
            $this->widgetSchema['heure_fin_max']->setDefault($filtre["heure_fin_max"]);
        }


        $this->widgetSchema['jour_unique_date'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        //initialisation des widget particuliers aux inscrits
        $this->widgetSchema['inscrit'] = new sfWidgetFormInputText();
        $this->validatorSchema['inscrit'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        //gestion du composant statut avec gestion de l'ordre

        $this->widgetSchema['cp_type_action_statut_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpTypeActionStatut',
                    'query' => Doctrine::getTable('CpTypeActionStatut')->getStatutParOrdre(),
                    'add_empty' => true,
                    'default' => NULL
                ));

        if (!empty($filtre["cp_type_action_statut_id"]) ) {
            $this->setDefault('cp_type_action_statut_id',$filtre["cp_type_action_statut_id"] );
        }else{
            $this->setDefault('cp_type_action_statut_id',NULL );
        }
        //$this->widgetSchema['cp_type_action_statut_id']->setDefault(null);
        
        //gestion de la date de creation
        $this->widgetSchema['date_creation'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
        
        if (!empty($filtre["date_creation"]) ) {
            if ($filtre["date_creation"]["day"] != '' && $filtre["date_creation"]["month"] != '' && $filtre["date_creation"]["year"] != '' ) {
                $dateAffiche = $filtre["date_creation"]["year"].'-'.$filtre["date_creation"]["month"].'-'.$filtre["date_creation"]["day"];
                $this->setDefault('date_creation',$dateAffiche );
            }
        }
        
        $this->validatorSchema['date_creation'] = new sfValidatorDate(array('required' => false));
      
      //gestion de la date de creation
        $this->widgetSchema['date_creation_deb'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
        
        if (!empty($filtre["date_creation_deb"]) ) {
            
            $this->widgetSchema['date_creation_deb']->setDefault($filtre["date_creation_deb"]);
        }
        $this->validatorSchema['date_creation_deb'] = new sfValidatorDate(array('required' => false));

        
        //gestion de la date de creation
        $this->widgetSchema['date_creation_fin'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
        
        if (!empty($filtre["date_creation_fin"]) ) {
             $this->widgetSchema['date_creation_fin']->setDefault($filtre["date_creation_fin"]);
        }
        
        $this->validatorSchema['date_creation_fin'] = new sfValidatorDate(array('required' => false));
      
  }
}
