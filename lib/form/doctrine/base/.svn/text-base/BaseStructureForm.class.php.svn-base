<?php

/**
 * Structure form base class.
 *
 * @method Structure getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStructureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_structure' => new sfWidgetFormInputHidden(),
      'id_commune'   => new sfWidgetFormInputText(),
      'siret'        => new sfWidgetFormInputText(),
      'forme'        => new sfWidgetFormInputText(),
      'nom'          => new sfWidgetFormInputText(),
      'voie'         => new sfWidgetFormInputText(),
      'code_postal'  => new sfWidgetFormInputText(),
      'ville'        => new sfWidgetFormInputText(),
      'telephone'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_structure' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_structure')), 'empty_value' => $this->getObject()->get('id_structure'), 'required' => false)),
      'id_commune'   => new sfValidatorInteger(array('required' => false)),
      'siret'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'forme'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nom'          => new sfValidatorString(array('max_length' => 255)),
      'voie'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'code_postal'  => new sfValidatorInteger(),
      'ville'        => new sfValidatorString(array('max_length' => 255)),
      'telephone'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('structure[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Structure';
  }

}
