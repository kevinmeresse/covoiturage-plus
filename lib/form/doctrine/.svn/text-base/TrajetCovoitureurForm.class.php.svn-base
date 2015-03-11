<?php

/**
 * Trajet form.
 *
 * @package    roulezmailn_v3  1
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetCovoitureurForm extends BaseTrajetForm {

    public function configure() {
        /*
         * gestion des champs hidden
         */
        // $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
        /*
          $valIdUtil = $this->getObject()->getIdUtilisateur();
          if (!empty($valIdUtil) ){
          $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
          }
         *
         */
        //$this->widgetSchema['id_site'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['cle'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['date_creation'] = new sfWidgetFormInputHidden();
        //suppression des champs inutilisés pour le formulaire 
        unset(
                $this['etat_avant_bascule'], 
                $this['site_confidentiel'], 
                $this['tolerance'], 
                $this['id_site'], 
                $this['id_depart'], 
                $this['id_depart2'], 
                $this['id_destination'], 
                $this['id_destination2'], 
                $this['id_nature_trajet'], 
                $this['cle'], 
                $this['id_frequence'], 
                $this['date_modification'], 
                $this['date_creation'], 
                $this['date_depublication'], 
                $this['nombre_visualisation'], 
                $this['nombre_demande'], 
                $this['url_retour'], 
                $this['technique'], 
                $this['km'], 
                $this['depart_adresse_numero'], 
                $this['depart_code_postal'], 
                $this['destination_adresse_numero'], 
                $this['destination_code_postal'], 
                $this['id_utilisateur'], 
                $this['trajet_organisme'], 
                $this['jour_unique_description'], 
                $this['autoroute_text'], 
                $this['trajet_etudiant'], 
                $this['visible_uniquement_partenaire'], 
                $this['id_type_vehicule'], 
                $this['covoiturage_solidaire']
        );

        //récupération des informations par défaut de l'utilisateur
        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getObject()->getIdUtilisateur());

        //nouveau widget du formulaire spécifique
        $this->widgetSchema['precise_etape'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
        $this->widgetSchema['precise_etape']->setLabel('Voulez-vous préciser des étapes ?');
        $this->validatorSchema['precise_etape'] = new sfValidatorChoice(array('required' => false, 'choices' => array(0, 1)));

        //modification des widget du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'off', 1 => 'on'),
                ));

        $this->widgetSchema['actif'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'supprimé', 1 => 'en cours'),
                ));

        
        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'régulier', 2 => 'ponctuel'),
                ));
        $this->setDefault('id_type_trajet', 2);
         
/*
        //gestion du champ id_site_site en fonction
        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormDoctrineChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'model' => $this->getRelatedModelName('TrajetTypeCovoiturage'),
                    'query' => Doctrine::getTable('TrajetTypeCovoiturage')->getTypeTrajetSite(),
                    //'add_empty' => true,
                ));
         *
         */

        $this->widgetSchema['jour_unique_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        $this->widgetSchema['jour_unique_type_cov_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        $this->widgetSchema['jour_unique_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'aller simple', 1 => 'aller/retour'),
                ));



        //gestion des heures de départ et d'arrivée
        $horaire = array(); //On crée par exemple un tableau de valeur
        for ($heure = 0; $heure <= 23; $heure++) {
            for ($quart = 0; $quart <= 45; $quart = $quart + 15) {
                if (strlen($heure) == 1) {
                    $heure = "0" . $heure;
                }
                if (strlen($quart) == 1) {
                    $quart = "0" . $quart;
                }
                //$temps = $heure.":".$quart.":00";
                $temps = $heure . ":" . $quart;
                $horaire[$temps] = $temps;
            }
        }
        $horaire_list = array_combine($horaire, $horaire);

        //choix à appliquer sur l'ensemble des jours
        

        //gestion des jours de semaine
        $this->widgetSchema['lundi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        
        $this->widgetSchema['lundi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));

        
        $this->widgetSchema['mardi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['mardi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
       

        $this->widgetSchema['mercredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['mercredi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));

        $this->widgetSchema['jeudi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['jeudi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        

        $this->widgetSchema['vendredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['vendredi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        

        $this->widgetSchema['samedi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['samedi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        

        $this->widgetSchema['dimanche_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['dimanche_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        
        //mise en hidden des champs horaire depart et arrivee pour retro-compatibilité
        $this->widgetSchema['lundi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['lundi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mardi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mardi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mercredi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mercredi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['jeudi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['jeudi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['vendredi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['vendredi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['samedi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['samedi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['dimanche_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['dimanche_heure_retour'] = new sfWidgetFormInputHidden();
        

        $this->widgetSchema['mobilite_r'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
        $this->widgetSchema['nombre_de_place'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7),
                ));
        $this->validatorSchema['nombre_de_place'] = new sfValidatorInteger();


        /*
          $this->widgetSchema['trajet_etudiant'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'non', 1 => 'oui'),
          ));
         */
        /*
          $this->widgetSchema['visible_uniquement_partenaire'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'non', 1 => 'oui'),
          ));
         */
        /*
          $this->widgetSchema['id_type_vehicule'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'perso', 1 => 'pro'),
          'default' => 0,
          ));
         */
        //$this->widgetSchema['volume_bagage'] = new sfWidgetFormChoice(array(
        //          'expanded' => true,
        //        'multiple' => false,
        //      'choices' => array(0 => 'non renseigné', 1 => 'petit', 2 => 'moyen', 3 => 'gros'),
        //));

        $this->widgetSchema['volume_bagage'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['volume_bagage']->setAttribute('id', 'valueVolumeBagage');   


        /* $this->widgetSchema['covoiturage_solidaire'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'non', 1 => 'oui'),
          ));
         * 
         */

        $this->widgetSchema['cout'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('oui' => 'oui', 'non' => 'non'),
                ));
        $this->widgetSchema['autoroute'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('oui' => 'oui', 'non' => 'non'),
                ));


        $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,
                ));

        $this->widgetSchema['id_evenement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    'query' => Doctrine::getTable('Lieu')->getLieuEvenementSite(),
                    'add_empty' => true,
                ));

        $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getQueryLocationsFromCityInsee($this->getObject()->getDepartInsee()),
                    'add_empty' => true,
                ));
        $this->displayDepartAutreLieu = true;
        if (count($this->widgetSchema['depart_autre_lieu']->getChoices()) <= 1) {
            $this->displayDepartAutreLieu = false;
        }
        $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'query' => Doctrine::getTable('Lieu')->getQueryLocationsFromCityInsee($this->getObject()->getDestinationInsee()),
                    'add_empty' => true,
                ));
        $this->displayDestinationAutreLieu = true;
        if (count($this->widgetSchema['destination_autre_lieu']->getChoices()) <= 1) {
            $this->displayDestinationAutreLieu = false;
        }

        //gestion du champ id_site_site en fonction
        $this->widgetSchema['id_site_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('SiteClient'),
                    'query' => Doctrine::getTable('SiteClient')->getSiteSite(),
                    'add_empty' => true,
                ));
        
        
        //gestion du champ liste des véhicules du covoitureur
        $this->widgetSchema['id_site_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('SiteClient'),
                    'query' => Doctrine::getTable('SiteClient')->getSiteSite(),
                    'add_empty' => true,
                ));


        //récupération des véhicule liés à l'utilisateur
        $cars = Doctrine::getTable('CovoitureurVehicule')->getCarsOfUser($this->getObject()->getIdUtilisateur());
        foreach ($cars as $car) {
            $liste_vehicule[$car->getIdVehicule()] = $car->getVehiculeMarque()->getNomMarque().", ".$car->getVehiculeModele()->getNomModele();
        }
        $liste_vehicule[''] = 'Autre...';
        
        $this->widgetSchema['vehicule'] = new sfWidgetFormChoice(array('choices' => $liste_vehicule));
        $keys = array_keys($liste_vehicule);
        $this->widgetSchema['vehicule']->setDefault($keys[0]);
        
        //definition des variables permettant d'avoir les informations de base sur le svehicules
        $vehicule_marque_id = 0;
        $vehicule_modele_id = 0;
        $vehicule_id = 0;

        if ($this->getObject()->getVehicule() != null && $this->getObject()->getVehicule() != 0) { // recuperation du vehicule du trajet
            if ($vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getVehicule())) {
                $vehicule_marque_id = $vehicule->getIdMarque();
                $vehicule_modele_id = $vehicule->getIdModele();
                $vehicule_id = $vehicule->getIdVehicule();
            }
        }
        
        //dernier vehicule de l'utilisateur ou du trajet deja enregistre
        /*if ($this->getObject()->getVehicule() != null && $this->getObject()->getVehicule() != 0) { // recuperation du vehicule du trajet
            //$vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getVehicule());
            if ($vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getVehicule())) {
                $vehicule_marque_id = $vehicule->getIdMarque();
                $vehicule_modele_id = $vehicule->getIdModele();
                $vehicule_id = $vehicule->getIdVehicule();
            }
        } else {//recuperation du choix de vehicule du profil utilisateur
            $vehicule = Doctrine_Core::getTable('CovoitureurVehicule')
                    ->createQuery('a')
                    ->where('id_utilisateur = ?', $this->getObject()->getIdUtilisateur())
                    ->orderBy('date_creation DESC')
                    ->fetchOne()
            ;
            if ($vehicule) {
                $vehicule_marque_id = $vehicule->getIdMarque();
                $vehicule_modele_id = $vehicule->getIdModele();
                $vehicule_id = $vehicule->getIdVehicule();
            }
        }*/


        //génération des combos

        $this->widgetSchema['vehicule_marque'] = new sfWidgetFormDoctrineChoice(array(
                    //'model' => $this->getRelatedModelName('VehiculeMarque'),
                    'model' => 'VehiculeMarque',
                    // 'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,
                ));
        $this->validatorSchema['vehicule_marque'] = new sfValidatorDoctrineChoice(array('model' => 'VehiculeMarque', 'required' => false));
        
        
        //if ($vehicule_marque_id != 0) {
            $query = Doctrine::getTable('VehiculeModele')->getVehiculeModeleListByMarqueQuery($vehicule_marque_id);

            $this->widgetSchema['vehicule_modele'] = new sfWidgetFormDoctrineChoice(array(
                        //'model' => $this->getRelatedModelName('VehiculeMarque'),
                        'model' => 'VehiculeModele',
                        'query' => $query,
                        'add_empty' => true,
                    ));
        /*} else {
            $this->widgetSchema['vehicule_modele'] = new sfWidgetFormDoctrineChoice(array(
                        //'model' => $this->getRelatedModelName('VehiculeMarque'),
                        'model' => 'VehiculeModele',
                        // 'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                        'add_empty' => true,
                    ));
        }*/
        $this->validatorSchema['vehicule_modele'] = new sfValidatorDoctrineChoice(array('model' => 'VehiculeModele', 'required' => false));
        
        $this->widgetSchema['vehicule_modele_id'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['vehicule_modele_id'] = new sfValidatorInteger(array('required' => false));
        
        /*
        $this->widgetSchema['vehicule_modele'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('oui' => 'oui', 'non' => 'non'),
                ));
       

        $this->validatorSchema['vehicule_modele'] = new sfValidatorDoctrineChoice(array('model' => 'VehiculeModele', 'required' => false));
*/

        //pre-positionnement des valeurs par défaut sur le modele et la marque du véhicule
        if ($vehicule_marque_id != null && $vehicule_marque_id != 0) {
            $this->widgetSchema['vehicule_marque']->setDefault($vehicule_marque_id);
        }

        if ($vehicule_modele_id != null && $vehicule_modele_id != 0) {
            $this->widgetSchema['vehicule_modele']->setDefault($vehicule_modele_id);
            $this->widgetSchema['vehicule_modele_id']->setDefault($vehicule_modele_id);
        }

        //champ permettant de garder en mémoire l'id de vehicule du trajet pour eviter de le re-engistrer si
        // il n'y a pas de changement (de véhicule)
        $this->widgetSchema['id_vehicule_mem'] = new sfWidgetFormInputHidden();
        if ($vehicule_id != 0) {
            $this->widgetSchema['id_vehicule_mem']->setDefault($vehicule_id);
        } else {
            $this->widgetSchema['id_vehicule_mem']->setDefault(0);
        }
        $this->validatorSchema['id_vehicule_mem'] = new sfValidatorInteger(array('required' => false));

        $this->widgetSchema['marque_vehicule_mem'] = new sfWidgetFormInputHidden();
        if ($vehicule_id != 0) {
            $this->widgetSchema['marque_vehicule_mem']->setDefault($vehicule_marque_id);
        } else {
            $this->widgetSchema['marque_vehicule_mem']->setDefault(0);
        }
        $this->validatorSchema['marque_vehicule_mem'] = new sfValidatorInteger(array('required' => false));

        $this->widgetSchema['marque_vehicule_modif'] = new sfWidgetFormInput();
        $this->widgetSchema['marque_vehicule_modif']->setDefault(0);
        $this->validatorSchema['marque_vehicule_modif'] = new sfValidatorInteger(array('required' => false));


        $this->widgetSchema['modele_vehicule_mem'] = new sfWidgetFormInputHidden();
        if ($vehicule_id != 0) {
            $this->widgetSchema['modele_vehicule_mem']->setDefault($vehicule_modele_id);
        } else {
            $this->widgetSchema['modele_vehicule_mem']->setDefault(0);
        }

        $this->validatorSchema['modele_vehicule_mem'] = new sfValidatorInteger(array('required' => false));



        //$this->widgetSchema['jour_unique_date'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['jour_unique_date_retour'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_creation'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_depublication'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_modification'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_verification'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //gestion du format des dates
        $this->widgetSchema['jour_unique_date'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        //
        //jour_unique_date => variable permettant de générer la balise required si la date n'est pas remplie
        /*
          if($this->getValue('id_type_trajet') == 1){ //trajet régulier
          $valid_unique = FALSE;
          }else{                                          //trajet ponctuel
          $valid_unique = TRUE;
          }
         * 
         */
        $this->validatorSchema['jour_unique_date'] = new sfValidatorDate(array('required' => false), array('required' => 'Vous devez saisir une date pour un trajet de type ponctuel'));


        //gestion dela postvalidation avec plusieurs postvalidator

        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(
                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkDateTrajetPonctuel'),
                            )
                    )
                ))
        );


        $this->widgetSchema['jour_unique_heure'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                ));
        $this->widgetSchema['jour_unique_heure']->setLabel('Départ');

        //$this->validatorSchema['jour_unique_heure'] = new sfValidatorTime(array('required' => true));



        $this->widgetSchema['jour_unique_date_retour'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        $this->widgetSchema['jour_unique_heure_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                ));
        $this->widgetSchema['jour_unique_heure_retour']->setLabel('Départ');
        //$this->validatorSchema['jour_unique_heure_retour'] = new sfValidatorTime(array('required' => true));



        $this->widgetSchema['date_verification'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));


        /*
         * gestion des états "tolérance" => fait appel à une méthode spécifique pour sérialiser le tableau
         */



        //initialisation des choix possibles
        $choices = array(0 => 'non', 1 => 'oui');


        //initialisation des valeurs par defaut si l'objet est initialisé
        $val_defaut_0 = $covoitureur->getTolereAnimaux();
        $val_defaut_1 = $covoitureur->getTolereFumeur();
        $val_defaut_2 = $covoitureur->getTolereBagage();
        $val_defaut_3 = $covoitureur->getTolereMusique();
        $val_defaut_4 = $covoitureur->getTolereDiscussion();
        
        if(is_null($val_defaut_0)){
            $val_defaut_0 = 0;
        }
        if(is_null($val_defaut_1)){
            $val_defaut_1 = 0;
        }
        if(is_null($val_defaut_2)){
            $val_defaut_2 = 0;
        }
        if(is_null($val_defaut_3)){
            $val_defaut_3 = 0;
        }
        if(is_null($val_defaut_4)){
            $val_defaut_4 = 0;
        }



        if ($this->getObject()->get('id_trajet') != '') {
            $val_defaut = $this->getObject()->getCheckboxTolerance();
            $val_defaut_0 = $val_defaut[0];
            $val_defaut_1 = $val_defaut[1];
            $val_defaut_2 = $val_defaut[2];
            $val_defaut_3 = $val_defaut[3];
            $val_defaut_4 = $val_defaut[4];
        }

        /* $this->widgetSchema['tolerance_0']= new sfWidgetFormInputText();
          $this->widgetSchema['tolerance_0']->setDefault($this->getObject()->getTolerance());
          initialisation de l'objet virtuel "tolerance_0" correspondant à animaux
          $this->widgetSchema['tolerance_0'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => $choices,
          'default' => $val_defaut_0,
          ));
          $this->widgetSchema['tolerance_0']->setLabel('Animaux'); */

        $this->widgetSchema['tolerance_0'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['tolerance_0']->setDefault($val_defaut_0);
        $this->widgetSchema['tolerance_0']->setAttribute('id', 'valueAnimaux');




        /*initialisation de l'objet virtuel "tolerance_1" correspondant à fumeurs
        $this->widgetSchema['tolerance_1'] = new sfWidgetFormChoice(array(
                  'expanded' => true,
                'multiple' => false,
              'choices' => $choices,
            'default' => $val_defaut_1,
        ));
        $this->widgetSchema['tolerance_1']->setDefault($covoitureur->getTolereFumeur());
        $this->widgetSchema['tolerance_1']->setLabel('Fumeurs');
         
         */
        $this->widgetSchema['tolerance_1'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['tolerance_1']->setDefault($val_defaut_1);
        $this->widgetSchema['tolerance_1']->setAttribute('id', 'valueFumeur'); 

        //initialisation de l'objet virtuel "tolerance_2" correspondant à bagages
        $this->widgetSchema['tolerance_2'] = new sfWidgetFormChoice(array(
                  'expanded' => true,
                'multiple' => false,
              'choices' => $choices,
            'default' => $val_defaut_2,
        ));
        $this->widgetSchema['tolerance_2']->setDefault($val_defaut_2);
        $this->widgetSchema['tolerance_2']->setLabel('Bagages');
        //$this->widgetSchema['tolerance_2']->setAttribute('id', 'valueBagage'); 
        


        /*initialisation de l'objet virtuel "tolerance_3" correspondant à musique*/

        $this->widgetSchema['tolerance_3'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['tolerance_3']->setDefault($val_defaut_3);
        $this->widgetSchema['tolerance_3']->setAttribute('id', 'valueMusique');         


        /*initialisation de l'objet virtuel "tolerance_4" correspondant à discussion*/

        $this->widgetSchema['tolerance_4'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['tolerance_4']->setDefault($val_defaut_4);
        $this->widgetSchema['tolerance_4']->setAttribute('id', 'valueDiscu');

        //initialisation des validateurs
        $this->validatorSchema['tolerance_0'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_1'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_2'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_3'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_4'] = new sfValidatorChoice(array('choices' => array(0, 1)));


        /*
         * gestion du type trajet
         *      1 => regulier	=> si jour_unique_date est vide
         *      2 => ponctuel	=> si jour_unique_date n'est pas vide
         *      3 => option 3 utilisée dans V1
         */


        //nouvel widget pour l'autocompletion du covoitureur
        //$this->widgetSchema['covoitureur'] = new sfWidgetFormInputText();
        //$this->validatorSchema['covoitureur'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
        //$this->widgetSchema->setNameFormat('trajetcovoitureur[%s]');
        
        
        /********************************************************************/
        /*           Imbrication du formulaire de trajetspecifique C+       */
        /********************************************************************/
        
        /*
        if($this->getObject()->isNew()){
            $trajet_cp = new CpTrajet();
        $trajet_cp->setCpTrajetId($this->getObject()->getCpTrajetId());
        }else{
            $trajet_cp = Doctrine_Core::getTable('CpTrajet')->find(array($this->getObject()->getCpTrajetId()));
        }
        
        
        
        $newCpTrajetForm = new CpTrajetForm($trajet_cp);
        
        
        $this->embedForm('CpTrajet', $newCpTrajetForm);
         * 
         */
    
        
        $this->embedRelation('CpTrajet','CpTrajetForm');
    }

    //test de la présence de la date de trajet en cas de trajet ponctuel

    public function checkDateTrajetPonctuel($validator, $values) {
        $errors = array();

        if ($values['id_type_trajet'] == 2 && ($values['jour_unique_date'] == '0000-00-00' ||
                $values['jour_unique_date'] == '' ||
                $values['jour_unique_date'] == null )) {
            $error = new sfValidatorError($validator, 'Vous devez saisir une date pour un trajet de type ponctuel.');
            $errors['jour_unique_date'] = $error;
        }


        /**
         * if there is errors
         */
        if (count($errors)) {
            throw new sfValidatorErrorSchema($validator, $errors);
        }
        //throw new sfValidatorError($validator, array('mail',$error));
        /**
         * dont forget to return values !
         */
        return $values;
    }

}

