<?php

/**
 * EquipageCovoitureur form base class.
 *
 * @method EquipageCovoitureur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEquipageCovoitureurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_equipage'    => new sfWidgetFormInputHidden(),
      'id_covoitureur' => new sfWidgetFormInputHidden(),
      'id_site'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'cle'            => new sfWidgetFormInputText(),
      'etat'           => new sfWidgetFormInputText(),
      'date_creation'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_equipage'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_equipage')), 'empty_value' => $this->getObject()->get('id_equipage'), 'required' => false)),
      'id_covoitureur' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_covoitureur')), 'empty_value' => $this->getObject()->get('id_covoitureur'), 'required' => false)),
      'id_site'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'cle'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'           => new sfValidatorInteger(array('required' => false)),
      'date_creation'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipage_covoitureur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EquipageCovoitureur';
  }

}
