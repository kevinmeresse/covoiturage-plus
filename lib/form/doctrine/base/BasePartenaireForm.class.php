<?php

/**
 * Partenaire form base class.
 *
 * @method Partenaire getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePartenaireForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nom'      => new sfWidgetFormInputText(),
      'url'      => new sfWidgetFormInputText(),
      'url_flux' => new sfWidgetFormInputText(),
      'etat'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'      => new sfValidatorString(array('max_length' => 255)),
      'url'      => new sfValidatorString(array('max_length' => 250)),
      'url_flux' => new sfValidatorString(array('max_length' => 250)),
      'etat'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('partenaire[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partenaire';
  }

}
