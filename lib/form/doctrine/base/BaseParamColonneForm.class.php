<?php

/**
 * ParamColonne form base class.
 *
 * @method ParamColonne getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParamColonneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'libelle'     => new sfWidgetFormInputText(),
      'libelle_dur' => new sfWidgetFormInputText(),
      'ordre'       => new sfWidgetFormInputText(),
      'taille'      => new sfWidgetFormInputText(),
      'affiche'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'libelle'     => new sfValidatorString(array('max_length' => 255)),
      'libelle_dur' => new sfValidatorString(array('max_length' => 255)),
      'ordre'       => new sfValidatorInteger(array('required' => false)),
      'taille'      => new sfValidatorInteger(array('required' => false)),
      'affiche'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('param_colonne[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParamColonne';
  }

}
