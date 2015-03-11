<?php

/**
 * VilleTemp filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVilleTempFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_postal' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_ville'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code_postal' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nom_ville'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ville_temp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleTemp';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'code_postal' => 'Number',
      'nom_ville'   => 'Text',
    );
  }
}
