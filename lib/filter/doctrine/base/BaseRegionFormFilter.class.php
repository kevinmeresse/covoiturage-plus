<?php

/**
 * Region filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRegionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_pays'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pays'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'       => new sfValidatorPass(array('required' => false)),
      'id_pays'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pays'), 'column' => 'id_pays')),
    ));

    $this->widgetSchema->setNameFormat('region_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

  public function getFields()
  {
    return array(
      'id_region' => 'Number',
      'nom'       => 'Text',
      'id_pays'   => 'ForeignKey',
    );
  }
}
