<?php

/**
 * Zone filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZoneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_commune'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => true)),
      'nom'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ouvrage'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'superficie'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'superficie_occupee' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'desserte_routiere'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transport_urbain'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_entreprise'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vocation'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_ville'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_commune'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Commune'), 'column' => 'id_commune')),
      'nom'                => new sfValidatorPass(array('required' => false)),
      'ouvrage'            => new sfValidatorPass(array('required' => false)),
      'superficie'         => new sfValidatorPass(array('required' => false)),
      'superficie_occupee' => new sfValidatorPass(array('required' => false)),
      'desserte_routiere'  => new sfValidatorPass(array('required' => false)),
      'transport_urbain'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_entreprise'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vocation'           => new sfValidatorPass(array('required' => false)),
      'id_ville'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VilleFr'), 'column' => 'id_ville')),
    ));

    $this->widgetSchema->setNameFormat('zone_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zone';
  }

  public function getFields()
  {
    return array(
      'id_zone'            => 'Number',
      'id_commune'         => 'ForeignKey',
      'nom'                => 'Text',
      'ouvrage'            => 'Text',
      'superficie'         => 'Text',
      'superficie_occupee' => 'Text',
      'desserte_routiere'  => 'Text',
      'transport_urbain'   => 'Number',
      'nombre_entreprise'  => 'Number',
      'vocation'           => 'Text',
      'id_ville'           => 'ForeignKey',
    );
  }
}
