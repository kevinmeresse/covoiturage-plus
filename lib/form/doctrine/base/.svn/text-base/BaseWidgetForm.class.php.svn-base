<?php

/**
 * Widget form base class.
 *
 * @method Widget getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWidgetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_widget'     => new sfWidgetFormInputHidden(),
      'ip'            => new sfWidgetFormInputText(),
      'domaine'       => new sfWidgetFormInputText(),
      'date_creation' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_widget'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_widget')), 'empty_value' => $this->getObject()->get('id_widget'), 'required' => false)),
      'ip'            => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'domaine'       => new sfValidatorString(array('max_length' => 255)),
      'date_creation' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('widget[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Widget';
  }

}
