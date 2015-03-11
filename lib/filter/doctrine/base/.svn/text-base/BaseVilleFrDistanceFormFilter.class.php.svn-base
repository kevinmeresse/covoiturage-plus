<?php

/**
 * VilleFrDistance filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVilleFrDistanceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'distance'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'distance'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ville_fr_distance_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleFrDistance';
  }

  public function getFields()
  {
    return array(
      'id_ville_centre' => 'Number',
      'id_ville_elarg'  => 'Number',
      'distance'        => 'Number',
    );
  }
}
