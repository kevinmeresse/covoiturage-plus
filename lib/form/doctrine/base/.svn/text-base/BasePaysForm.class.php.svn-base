<?php

/**
 * Pays form base class.
 *
 * @method Pays getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaysForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pays' => new sfWidgetFormInputHidden(),
      'nom'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pays' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pays')), 'empty_value' => $this->getObject()->get('id_pays'), 'required' => false)),
      'nom'     => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('pays[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pays';
  }

}
