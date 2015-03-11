<?php

/**
 * CpActionCv form base class.
 *
 * @method CpActionCv getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpActionCvForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_action_cv_id'                => new sfWidgetFormInputHidden(),
      'cp_action_cv_detail'            => new sfWidgetFormTextarea(),
      'cp_action_cv_date_creation'     => new sfWidgetFormDateTime(),
      'cp_action_cv_date_modification' => new sfWidgetFormDateTime(),
      'cp_action_cv_date_echeance'     => new sfWidgetFormDate(),
      'cp_action_cv_cp_type_action_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeAction'), 'add_empty' => false)),
      'cp_action_cv_covoitureur_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'cp_action_cv_user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'cp_action_cv_trajet_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_action_cv_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_action_cv_id')), 'empty_value' => $this->getObject()->get('cp_action_cv_id'), 'required' => false)),
      'cp_action_cv_detail'            => new sfValidatorString(array('required' => false)),
      'cp_action_cv_date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'cp_action_cv_date_modification' => new sfValidatorDateTime(array('required' => false)),
      'cp_action_cv_date_echeance'     => new sfValidatorDate(array('required' => false)),
      'cp_action_cv_cp_type_action_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeAction'), 'required' => false)),
      'cp_action_cv_covoitureur_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'required' => false)),
      'cp_action_cv_user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'cp_action_cv_trajet_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_action_cv[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpActionCv';
  }

}
