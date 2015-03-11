<?php

/**
 * LogSite filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogSiteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_provenance'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TrajetMiseEnRelation'), 'add_empty' => true)),
      'id_log_type_provenance' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LogTypeProvenance'), 'add_empty' => true)),
      'id_site'                => new sfWidgetFormFilterInput(),
      'created'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_user'                => new sfWidgetFormFilterInput(),
      'message'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_provenance'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TrajetMiseEnRelation'), 'column' => 'id_trajet_mise_en_relation')),
      'id_log_type_provenance' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LogTypeProvenance'), 'column' => 'id_log_type_provenance')),
      'id_site'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'message'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_site_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogSite';
  }

  public function getFields()
  {
    return array(
      'id_log_site'            => 'Number',
      'id_provenance'          => 'ForeignKey',
      'id_log_type_provenance' => 'ForeignKey',
      'id_site'                => 'Number',
      'created'                => 'Date',
      'id_user'                => 'Number',
      'message'                => 'Text',
    );
  }
}
