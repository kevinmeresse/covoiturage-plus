<?php

/**
 * CpTypeAction form base class.
 *
 * @method CpTypeAction getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpTypeActionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_type_action_id'                => new sfWidgetFormInputHidden(),
      'cp_type_action_nom'               => new sfWidgetFormInputText(),
      'cp_type_action_ordre'             => new sfWidgetFormInputText(),
      'cp_type_action_date_creation'     => new sfWidgetFormDateTime(),
      'cp_type_action_date_modification' => new sfWidgetFormDateTime(),
      'cp_type_action_cible'             => new sfWidgetFormInputText(),
      'cp_type_action_statut_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeActionStatut'), 'add_empty' => true)),
      'cp_type_action_type_mail'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_type_action_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_type_action_id')), 'empty_value' => $this->getObject()->get('cp_type_action_id'), 'required' => false)),
      'cp_type_action_nom'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_type_action_ordre'             => new sfValidatorInteger(array('required' => false)),
      'cp_type_action_date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'cp_type_action_date_modification' => new sfValidatorDateTime(array('required' => false)),
      'cp_type_action_cible'             => new sfValidatorInteger(array('required' => false)),
      'cp_type_action_statut_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeActionStatut'), 'required' => false)),
      'cp_type_action_type_mail'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_type_action[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTypeAction';
  }

}
