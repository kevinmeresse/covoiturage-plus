<?php

/**
 * FormulaireSatisfaction form base class.
 *
 * @method FormulaireSatisfaction getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFormulaireSatisfactionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'  => new sfWidgetFormInputHidden(),
      'q1'  => new sfWidgetFormTextarea(),
      'q2'  => new sfWidgetFormTextarea(),
      'q3'  => new sfWidgetFormTextarea(),
      'q4'  => new sfWidgetFormTextarea(),
      'q5'  => new sfWidgetFormTextarea(),
      'q6'  => new sfWidgetFormTextarea(),
      'q7'  => new sfWidgetFormTextarea(),
      'q8'  => new sfWidgetFormTextarea(),
      'q9'  => new sfWidgetFormTextarea(),
      'q10' => new sfWidgetFormTextarea(),
      'q11' => new sfWidgetFormTextarea(),
      'q12' => new sfWidgetFormTextarea(),
      'q13' => new sfWidgetFormTextarea(),
      'q14' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'q1'  => new sfValidatorString(),
      'q2'  => new sfValidatorString(),
      'q3'  => new sfValidatorString(),
      'q4'  => new sfValidatorString(),
      'q5'  => new sfValidatorString(),
      'q6'  => new sfValidatorString(),
      'q7'  => new sfValidatorString(),
      'q8'  => new sfValidatorString(),
      'q9'  => new sfValidatorString(),
      'q10' => new sfValidatorString(),
      'q11' => new sfValidatorString(),
      'q12' => new sfValidatorString(),
      'q13' => new sfValidatorString(),
      'q14' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('formulaire_satisfaction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FormulaireSatisfaction';
  }

}
