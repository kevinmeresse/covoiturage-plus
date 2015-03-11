<?php

/**
 * Quartier filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuartierFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom_quartier' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'x'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'y'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_commune'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom_quartier' => new sfValidatorPass(array('required' => false)),
      'x'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_commune'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Commune'), 'column' => 'id_commune')),
    ));

    $this->widgetSchema->setNameFormat('quartier_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quartier';
  }

  public function getFields()
  {
    return array(
      'id_quartier'  => 'Number',
      'nom_quartier' => 'Text',
      'x'            => 'Number',
      'y'            => 'Number',
      'id_commune'   => 'ForeignKey',
    );
  }
}
