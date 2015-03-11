<?php

/**
 * Equipage form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Christophe Vignaud, Emmanuel Bellamy
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EquipageRechercheForm extends BaseEquipageForm {

    public function configure() {
        unset(
                $this['cle'], 
                $this['etat'], 
                $this['id_site'], 
                $this['id_trajet'], 
                $this['id_createur'], 
                $this['date_modification'], 
                $this['commentaires']
        );

        //$this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();

        /*
         * modification des widgets du formulaire
         */
        //récupération des utilisateur lié au site_client uniquement
        $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,
                ));



        //récupération des trajets liés au site_client uniquement
        $this->widgetSchema['id_profil'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Profile'),
                    'query' => Doctrine::getTable('sfGuardUserProfile')->getComboInitProfil(),
                    'add_empty' => 'tous',
                ));
        
        //widget pour le statut du trajet (et donc du covoitureur)
        $this->widgetSchema['action_statut_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpTypeActionStatut',
                    //'query' => Doctrine::getTable('sfGuardUserProfile')->getComboInitProfil(),
                    'add_empty' => true,
                ));

        //initialisation des widget particuliers aux champs ville de départ et covoitureurs      
        $this->widgetSchema['depart_ville'] = new sfWidgetFormInputText();
        $this->widgetSchema['dest_ville'] = new sfWidgetFormInputText();
        $this->widgetSchema['covoitureur'] = new sfWidgetFormInputText();
        
        //widget pour le nom de l'equipage
        $this->widgetSchema['nom_equipage'] = new sfWidgetFormInputText();

        $this->widgetSchema->setNameFormat('equipagerecherche[%s]');


        //initialisation des validateurs
        $this->validatorSchema['depart_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['dest_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['covoitureur'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['nom_equipage'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['action_statut_id'] = new sfValidatorInteger(array('required' => false));
    }

}
