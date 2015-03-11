<?php

/**
 * VilleFrV1 filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVilleFrV1FormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pays'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'), 'add_empty' => true)),
      'nom_ville'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_ville2'      => new sfWidgetFormFilterInput(),
      'latitude'        => new sfWidgetFormFilterInput(),
      'longitude'       => new sfWidgetFormFilterInput(),
      'code_postal'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_insee'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departement'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departement_num' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region_num'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chef_lieu'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_pays'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaysMonde'), 'column' => 'id_pays')),
      'nom_ville'       => new sfValidatorPass(array('required' => false)),
      'nom_ville2'      => new sfValidatorPass(array('required' => false)),
      'latitude'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'code_postal'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code_insee'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'departement'     => new sfValidatorPass(array('required' => false)),
      'departement_num' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'region_num'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chef_lieu'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ville_fr_v1_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleFrV1';
  }

  public function getFields()
  {
    return array(
      'id_ville'        => 'Number',
      'id_pays'         => 'ForeignKey',
      'nom_ville'       => 'Text',
      'nom_ville2'      => 'Text',
      'latitude'        => 'Number',
      'longitude'       => 'Number',
      'code_postal'     => 'Number',
      'code_insee'      => 'Number',
      'departement'     => 'Text',
      'departement_num' => 'Number',
      'region_num'      => 'Number',
      'chef_lieu'       => 'Number',
    );
  }
}
