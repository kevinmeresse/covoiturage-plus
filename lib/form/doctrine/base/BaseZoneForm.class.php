<?php

/**
 * Zone form base class.
 *
 * @method Zone getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZoneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_zone'            => new sfWidgetFormInputHidden(),
      'id_commune'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => false)),
      'nom'                => new sfWidgetFormInputText(),
      'ouvrage'            => new sfWidgetFormInputText(),
      'superficie'         => new sfWidgetFormInputText(),
      'superficie_occupee' => new sfWidgetFormInputText(),
      'desserte_routiere'  => new sfWidgetFormInputText(),
      'transport_urbain'   => new sfWidgetFormInputText(),
      'nombre_entreprise'  => new sfWidgetFormInputText(),
      'vocation'           => new sfWidgetFormInputText(),
      'id_ville'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_zone'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_zone')), 'empty_value' => $this->getObject()->get('id_zone'), 'required' => false)),
      'id_commune'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'required' => false)),
      'nom'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ouvrage'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'superficie'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'superficie_occupee' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'desserte_routiere'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'transport_urbain'   => new sfValidatorInteger(array('required' => false)),
      'nombre_entreprise'  => new sfValidatorInteger(array('required' => false)),
      'vocation'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'id_ville'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zone[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zone';
  }

}
