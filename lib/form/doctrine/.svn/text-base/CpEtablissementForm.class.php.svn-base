<?php

/**
 * CpEtablissement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpEtablissementForm extends BaseCpEtablissementForm
{
  public function configure()
  {
      unset(
                $this['cp_etablissement_ville_id'], 
                $this['cp_etablissement_date_creation'], 
                $this['cp_etablissement_date_modification'],
              $this['cp_etablissement_etablissement_pere_id'],
              $this['cp_etablissement_statut']
        );
        
        //initialisation des widget particuliers aux champs nom       
        $this->widgetSchema['cp_etablissement_etablissement_nom'] = new sfWidgetFormInputText();
        $this->validatorSchema['cp_etablissement_etablissement_nom'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
      
        //initialisation des widget particuliers aux champs ville       
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();

        //initialisation des validateurs
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
        $this->widgetSchema['cp_etablissement_latitude'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cp_etablissement_longitude'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['cp_etablissement_commentaire'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        $this->widgetSchema['cp_etablissement_infos'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        $this->widgetSchema['cp_etablissement_actions'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        //sléction des établissement liés au lieu de type ZI-ZA
        $this->widgetSchema['cp_etablissement_zone_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'add_empty' => true,
                ));
        
        //sléction des établissement parent (Rasison sociale)
        /*
        $this->widgetSchema['cp_etablissement_etablissement_pere_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissement'),
                    'query' => Doctrine::getTable('CpEtablissement')->getEtablissementSociete(),
                    'method' => 'getEtablissementLibelleRaisonSociale',
                    'add_empty' => true,
                ));
        */
        
        /*
        $this->widgetSchema['cp_etablissement_statut'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissementStatut'),
                    //'query' => Doctrine::getTable('CpEtablissement')->getEtablissementSociete(),
                    'add_empty' => true,
                ));
        */
        
        //initialisation des widget particuliers aux champs RS       
        $this->widgetSchema['cp_etablissement_etablissement_RS'] = new sfWidgetFormInputText();
        $this->validatorSchema['cp_etablissement_etablissement_RS'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        $this->validatorSchema['cp_etablissement_cp_etablissement_statut_id'] = new sfValidatorInteger(array('required' => true));
  }
}
