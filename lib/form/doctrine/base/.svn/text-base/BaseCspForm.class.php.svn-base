<?php

/**
 * Csp form base class.
 *
 * @method Csp getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCspForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_csp'   => new sfWidgetFormInputHidden(),
      'intitule' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_csp'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_csp')), 'empty_value' => $this->getObject()->get('id_csp'), 'required' => false)),
      'intitule' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('csp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Csp';
  }

}
