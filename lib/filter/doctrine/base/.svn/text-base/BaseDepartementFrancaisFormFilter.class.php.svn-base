<?php

/**
 * DepartementFrancais filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDepartementFrancaisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_region'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Region'), 'add_empty' => true)),
      'nom_departement'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'site_web_departement' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_region'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Region'), 'column' => 'id_region')),
      'nom_departement'      => new sfValidatorPass(array('required' => false)),
      'site_web_departement' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('departement_francais_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DepartementFrancais';
  }

  public function getFields()
  {
    return array(
      'id_departement'       => 'Number',
      'id_region'            => 'ForeignKey',
      'nom_departement'      => 'Text',
      'site_web_departement' => 'Text',
    );
  }
}
