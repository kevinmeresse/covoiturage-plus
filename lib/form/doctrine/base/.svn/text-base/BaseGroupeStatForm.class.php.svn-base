<?php

/**
 * GroupeStat form base class.
 *
 * @method GroupeStat getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGroupeStatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_groupe_stat'    => new sfWidgetFormInputHidden(),
      'intitule'          => new sfWidgetFormInputText(),
      'parametres'        => new sfWidgetFormTextarea(),
      'id_site'           => new sfWidgetFormInputText(),
      'etat'              => new sfWidgetFormInputText(),
      'date_creation'     => new sfWidgetFormDateTime(),
      'date_modification' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_groupe_stat'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_groupe_stat')), 'empty_value' => $this->getObject()->get('id_groupe_stat'), 'required' => false)),
      'intitule'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parametres'        => new sfValidatorString(array('required' => false)),
      'id_site'           => new sfValidatorInteger(array('required' => false)),
      'etat'              => new sfValidatorInteger(array('required' => false)),
      'date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'date_modification' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groupe_stat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupeStat';
  }

}
