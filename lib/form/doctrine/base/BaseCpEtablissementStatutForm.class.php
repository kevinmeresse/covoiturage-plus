<?php

/**
 * CpEtablissementStatut form base class.
 *
 * @method CpEtablissementStatut getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementStatutForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_statut_id'                => new sfWidgetFormInputHidden(),
      'cp_etablissement_statut_nom'               => new sfWidgetFormInputText(),
      'cp_etablissement_statut_ordre'             => new sfWidgetFormInputText(),
      'cp_etablissement_statut_date_creation'     => new sfWidgetFormDateTime(),
      'cp_etablissement_statut_date_modification' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'cp_etablissement_statut_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_etablissement_statut_id')), 'empty_value' => $this->getObject()->get('cp_etablissement_statut_id'), 'required' => false)),
      'cp_etablissement_statut_nom'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'cp_etablissement_statut_ordre'             => new sfValidatorInteger(array('required' => false)),
      'cp_etablissement_statut_date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'cp_etablissement_statut_date_modification' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement_statut[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissementStatut';
  }

}
