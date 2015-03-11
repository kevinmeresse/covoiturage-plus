<?php

/**
 * CpActionCtc form base class.
 *
 * @method CpActionCtc getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpActionCtcForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_action_ctc_id'                => new sfWidgetFormInputHidden(),
      'cp_action_ctc_detail'            => new sfWidgetFormTextarea(),
      'cp_action_ctc_date_creation'     => new sfWidgetFormDateTime(),
      'cp_action_ctc_date_modification' => new sfWidgetFormDateTime(),
      'cp_action_ctc_date_echeance'     => new sfWidgetFormDate(),
      'cp_action_ctc_cp_type_action_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeAction'), 'add_empty' => false)),
      'cp_action_ctc_cp_contact_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpContact'), 'add_empty' => false)),
      'cp_action_ctc_user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_action_ctc_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_action_ctc_id')), 'empty_value' => $this->getObject()->get('cp_action_ctc_id'), 'required' => false)),
      'cp_action_ctc_detail'            => new sfValidatorString(array('required' => false)),
      'cp_action_ctc_date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'cp_action_ctc_date_modification' => new sfValidatorDateTime(array('required' => false)),
      'cp_action_ctc_date_echeance'     => new sfValidatorDate(array('required' => false)),
      'cp_action_ctc_cp_type_action_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeAction'), 'required' => false)),
      'cp_action_ctc_cp_contact_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpContact'), 'required' => false)),
      'cp_action_ctc_user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_action_ctc[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpActionCtc';
  }

}
