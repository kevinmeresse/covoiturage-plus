<?php

/**
 * HistoriqueBascule filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHistoriqueBasculeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site_client' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'type_donnee'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ancien_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nouvel_id'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_bascule'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_site_client' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'type_donnee'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ancien_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nouvel_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_bascule'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('historique_bascule_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistoriqueBascule';
  }

  public function getFields()
  {
    return array(
      'id_historique'  => 'Number',
      'id_site_client' => 'ForeignKey',
      'type_donnee'    => 'Number',
      'ancien_id'      => 'Number',
      'nouvel_id'      => 'Number',
      'date_bascule'   => 'Date',
    );
  }
}
