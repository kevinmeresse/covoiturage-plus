<?php

/**
 * LogTypeProvenance filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogTypeProvenanceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_provenance'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'type_provenance'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_type_provenance_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogTypeProvenance';
  }

  public function getFields()
  {
    return array(
      'id_log_type_provenance' => 'Number',
      'type_provenance'        => 'Text',
    );
  }
}
