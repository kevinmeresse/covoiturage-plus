<?php

/**
 * CpEtablissement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpEtablissementSocieteForm extends BaseCpEtablissementForm
{
  public function configure()
  {
      unset(
                $this['cp_etablissement_ville_id'], 
                $this['cp_etablissement_date_creation'],
                $this['cp_etablissement_latitude'],
                $this['cp_etablissement_longitude'],
                $this['cp_etablissement_zone_id'],
                $this['cp_etablissement_adresse1'],
                $this['cp_etablissement_adresse2'],
                $this['cp_etablissement_code_postal'],
                $this['cp_etablissement_date_modification']
                //$this['cp_etablissement_statut']
        );
      
      //$this->usefields(array('cp_etablissement_raison_social','cp_etablissement_statut','cp_etablissement_commentaire'));
      
        //initialisation du champ caché  
      //initialisation des widget particuliers aux champs ville       
        $this->widgetSchema['cp_etablissement_type_societe'] = new sfWidgetFormInputHidden();

        //initialisation des widget particuliers aux champs ville       
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();

        //initialisation des validateurs
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        /*
        $this->widgetSchema['cp_etablissement_latitude'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cp_etablissement_longitude'] = new sfWidgetFormInputHidden();
         *
         */
        
        $this->widgetSchema['cp_etablissement_commentaire'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        //sléction des établissement liés au lieu de type ZI-ZA
        /*
        $this->widgetSchema['cp_etablissement_zone_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'add_empty' => true,
                ));
         *
         */
        
        $this->widgetSchema['cp_etablissement_cp_etablissement_statut_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissementStatut'),
                    //'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'add_empty' => false,
                ));

        $this->validatorSchema['cp_etablissement_cp_etablissement_statut_id'] = new sfValidatorInteger(array('required' => true));
  }
}
