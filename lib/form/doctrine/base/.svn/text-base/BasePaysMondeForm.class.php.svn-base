<?php

/**
 * PaysMonde form base class.
 *
 * @method PaysMonde getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaysMondeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pays'   => new sfWidgetFormInputHidden(),
      'code_pays' => new sfWidgetFormInputText(),
      'nom_pays'  => new sfWidgetFormInputText(),
      'nom_pays2' => new sfWidgetFormInputText(),
      'latitude'  => new sfWidgetFormInputText(),
      'longitude' => new sfWidgetFormInputText(),
      'etat'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pays'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pays')), 'empty_value' => $this->getObject()->get('id_pays'), 'required' => false)),
      'code_pays' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'nom_pays'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nom_pays2' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'  => new sfValidatorNumber(array('required' => false)),
      'longitude' => new sfValidatorNumber(array('required' => false)),
      'etat'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pays_monde[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaysMonde';
  }

}
