<?php

/**
 * Geom form base class.
 *
 * @method Geom getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGeomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
      'g'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'g'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('geom[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Geom';
  }

}
