<?php

/**
 * CpTypeActionStatut form base class.
 *
 * @method CpTypeActionStatut getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpTypeActionStatutForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_type_action_statut_id'      => new sfWidgetFormInputHidden(),
      'cp_type_action_statut_nom'     => new sfWidgetFormInputText(),
      'cp_type_action_statut_ordre'   => new sfWidgetFormInputText(),
      'cp_type_action_statut_couleur' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_type_action_statut_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_type_action_statut_id')), 'empty_value' => $this->getObject()->get('cp_type_action_statut_id'), 'required' => false)),
      'cp_type_action_statut_nom'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_type_action_statut_ordre'   => new sfValidatorInteger(array('required' => false)),
      'cp_type_action_statut_couleur' => new sfValidatorString(array('max_length' => 6)),
    ));

    $this->widgetSchema->setNameFormat('cp_type_action_statut[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTypeActionStatut';
  }

}
