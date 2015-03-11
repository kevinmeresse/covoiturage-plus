<?php

/**
 * Address form base class.
 *
 * @method Address getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'address'     => new sfWidgetFormInputHidden(),
      'address_loc' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'address'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('address')), 'empty_value' => $this->getObject()->get('address'), 'required' => false)),
      'address_loc' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Address';
  }

}
