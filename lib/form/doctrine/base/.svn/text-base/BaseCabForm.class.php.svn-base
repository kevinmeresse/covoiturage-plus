<?php

/**
 * Cab form base class.
 *
 * @method Cab getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCabForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cab_id'     => new sfWidgetFormInputHidden(),
      'cab_driver' => new sfWidgetFormInputText(),
      'cab_loc'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'cab_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cab_id')), 'empty_value' => $this->getObject()->get('cab_id'), 'required' => false)),
      'cab_driver' => new sfValidatorString(array('max_length' => 80)),
      'cab_loc'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('cab[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cab';
  }

}
