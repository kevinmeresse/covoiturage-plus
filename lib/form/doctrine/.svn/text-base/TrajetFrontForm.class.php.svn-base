<?php

/**
 * Trajet form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetFrontForm extends BaseTrajetForm {

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
                $this['etat'], 
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
                $this['id_utilisateur']

        );



        $this->widgetSchema['actif'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'supprimé', 1 => 'en cours'),
                ));

        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'régulier', 2 => 'ponctuel'),
                    'default' => 1,
                ));

        $this->widgetSchema['jour_unique_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        $this->widgetSchema['jour_unique_type_cov_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        $this->widgetSchema['jour_unique_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'aller simple', 1 => 'aller/retour'),
                ));

        $this->widgetSchema['lundi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['lundi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['mardi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['mardi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['mercredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['mercredi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['jeudi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['jeudi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['vendredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['vendredi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['samedi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['samedi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['dimanche_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->widgetSchema['dimanche_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['mobilite_r'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
        $this->widgetSchema['trajet_etudiant'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['visible_uniquement_partenaire'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['id_type_vehicule'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'perso', 1 => 'pro'),
                ));
        $this->widgetSchema['volume_bagage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non renseigné', 1 => 'petit', 2 => 'moyen', 3 => 'gros'),
                ));
        $this->widgetSchema['covoiturage_solidaire'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['cout'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('oui' => 'oui'),
                ));
        $this->widgetSchema['autoroute'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('oui' => 'oui'),
                ));


         $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,

                ));

        $this->widgetSchema['id_evenement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => true,

                ));
        
        $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => true,

                ));
        $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => true,

                ));
        
        //gestion du champ id_site_site en fonction
        $this->widgetSchema['id_site_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('SiteClient'),
                    'query' => Doctrine::getTable('SiteClient')->getSiteSite(),
                    'add_empty' => true,

                ));


        //récupération des véhicule liés à l'utilisateur
        $liste_vehicule = array();
        //$liste_vehicules_temp = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getIdUtilisateur());
        
        if($this->getObject()->getIdUtilisateur()){
            
        }
        $liste_vehicules_temp = Doctrine_Core::getTable('CovoitureurVehicule')
                ->createQuery('a')
                ->where('id_utilisateur = ?', $this->getObject()->getIdUtilisateur())
                ->execute();


        foreach ($liste_vehicules_temp as $i => $vehicules_temp) {
            $vehiculeMarqueModele = $vehicules_temp->getVehiculeMarque() . " / " . $vehicules_temp->getVehiculeModele();
            //array_push($liste_vehicule, $vehicules_temp->getIdVehicule() => $vehiculeMarqueModele);
            $liste_vehicule[] = array($vehicules_temp->getIdVehicule() => $vehiculeMarqueModele);
        }

        $this->widgetSchema['vehicule'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $liste_vehicule,
                ));

        


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
        
        $this->widgetSchema['jour_unique_date_retour'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
         $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
         
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
        $choices = array(0 => 'non acceptés', 1 => 'acceptés', 2 => 'peu importe');


        //initialisation des valeurs par defaut si l'objet est initialisé
        $val_defaut_0 = 0;
        $val_defaut_1 = 0;
        $val_defaut_2 = 0;

        if ($this->getObject()->get('id_trajet') != '') {
            $val_defaut = $this->getObject()->getCheckboxTolerance();
            $val_defaut_0 = $val_defaut[0];
            $val_defaut_1 = $val_defaut[1];
            $val_defaut_2 = $val_defaut[2];
        }


        //initialisation de l'objet virtuel "tolerance_0" correspondan,t à animaux
        $this->widgetSchema['tolerance_0'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_0,
                ));

        $this->widgetSchema['tolerance_0']->setLabel('Animaux');

        //initialisation de l'objet virtuel "tolerance_1" correspondant à fumeurs
        $this->widgetSchema['tolerance_1'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_1,
                ));
        $this->widgetSchema['tolerance_1']->setLabel('Fumeurs');


        //initialisation de l'objet virtuel "tolerance_1" correspondant à bagages
        $this->widgetSchema['tolerance_2'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_2,
                ));
        $this->widgetSchema['tolerance_2']->setLabel('Bagages');


        //initialisation des validateurs
        $this->validatorSchema['tolerance_0'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));
        $this->validatorSchema['tolerance_1'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));
        $this->validatorSchema['tolerance_2'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));
        $this->validatorSchema['tolerance_1'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));
        $this->validatorSchema['tolerance_2'] = new sfValidatorChoice(array('choices' => array(0, 1, 2)));


        /*
         * gestion du type trajet
         *      1 => regulier	=> si jour_unique_date est vide
         *      2 => ponctuel	=> si jour_unique_date n'est pas vide
         *      3 => option 3 utilisée dans V1
         */
        
        
        //nouvel widget pour l'autocompletion du covoitureur
        $this->widgetSchema['covoitureur'] = new sfWidgetFormInputText();
        $this->validatorSchema['covoitureur'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    }

}
