<?php

/**
 * CpEtablissement form base class.
 *
 * @method CpEtablissement getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_id'                         => new sfWidgetFormInputHidden(),
      'cp_etablissement_raison_social'              => new sfWidgetFormInputText(),
      'cp_etablissement_etablissement_nom'          => new sfWidgetFormInputText(),
      'cp_etablissement_denomination'               => new sfWidgetFormInputText(),
      'cp_etablissement_enseigne'                   => new sfWidgetFormInputText(),
      'cp_etablissement_adresse1'                   => new sfWidgetFormInputText(),
      'cp_etablissement_adresse2'                   => new sfWidgetFormInputText(),
      'cp_etablissement_code_postal'                => new sfWidgetFormInputText(),
      'cp_etablissement_nb_salarie'                 => new sfWidgetFormInputText(),
      'cp_etablissement_ville_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'cp_etablissement_zone_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lieu'), 'add_empty' => true)),
      'cp_etablissement_commentaire'                => new sfWidgetFormTextarea(),
      'cp_etablissement_infos'                      => new sfWidgetFormTextarea(),
      'cp_etablissement_actions'                    => new sfWidgetFormTextarea(),
      'cp_etablissement_etablissement_pere_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
      'cp_etablissement_date_creation'              => new sfWidgetFormDateTime(),
      'cp_etablissement_date_modification'          => new sfWidgetFormDateTime(),
      'cp_etablissement_cp_etablissement_statut_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementStatut'), 'add_empty' => true)),
      'cp_etablissement_latitude'                   => new sfWidgetFormInputText(),
      'cp_etablissement_longitude'                  => new sfWidgetFormInputText(),
      'cp_etablissement_type_societe'               => new sfWidgetFormInputText(),
      'cp_etablissement_tel'                        => new sfWidgetFormInputText(),
      'cp_etablissement_fax'                        => new sfWidgetFormInputText(),
      'cp_etablissement_mail'                       => new sfWidgetFormInputText(),
      'cp_etablissement_web'                        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_etablissement_id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_etablissement_id')), 'empty_value' => $this->getObject()->get('cp_etablissement_id'), 'required' => false)),
      'cp_etablissement_raison_social'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_etablissement_nom'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_denomination'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_enseigne'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_adresse1'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_adresse2'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_code_postal'                => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'cp_etablissement_nb_salarie'                 => new sfValidatorInteger(array('required' => false)),
      'cp_etablissement_ville_id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'required' => false)),
      'cp_etablissement_zone_id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lieu'), 'required' => false)),
      'cp_etablissement_commentaire'                => new sfValidatorString(array('required' => false)),
      'cp_etablissement_infos'                      => new sfValidatorString(array('required' => false)),
      'cp_etablissement_actions'                    => new sfValidatorString(array('required' => false)),
      'cp_etablissement_etablissement_pere_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'required' => false)),
      'cp_etablissement_date_creation'              => new sfValidatorDateTime(array('required' => false)),
      'cp_etablissement_date_modification'          => new sfValidatorDateTime(array('required' => false)),
      'cp_etablissement_cp_etablissement_statut_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementStatut'), 'required' => false)),
      'cp_etablissement_latitude'                   => new sfValidatorNumber(array('required' => false)),
      'cp_etablissement_longitude'                  => new sfValidatorNumber(array('required' => false)),
      'cp_etablissement_type_societe'               => new sfValidatorInteger(array('required' => false)),
      'cp_etablissement_tel'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cp_etablissement_fax'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cp_etablissement_mail'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_etablissement_web'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissement';
  }

}
