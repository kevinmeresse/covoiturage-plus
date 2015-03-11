<?php

/**
 * VilleFrDistance form base class.
 *
 * @method VilleFrDistance getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVilleFrDistanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ville_centre' => new sfWidgetFormInputHidden(),
      'id_ville_elarg'  => new sfWidgetFormInputHidden(),
      'distance'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ville_centre' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_ville_centre')), 'empty_value' => $this->getObject()->get('id_ville_centre'), 'required' => false)),
      'id_ville_elarg'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_ville_elarg')), 'empty_value' => $this->getObject()->get('id_ville_elarg'), 'required' => false)),
      'distance'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ville_fr_distance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleFrDistance';
  }

}
