<?php

/**
 * PavillonsB filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePavillonsBFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_insee'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_plage'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code_insee'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nom_plage'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pavillons_b_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PavillonsB';
  }

  public function getFields()
  {
    return array(
      'pavillons_b_id' => 'Number',
      'code_insee'     => 'Number',
      'nom_plage'      => 'Text',
    );
  }
}
