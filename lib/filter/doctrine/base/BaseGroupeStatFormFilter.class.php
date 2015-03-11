<?php

/**
 * GroupeStat filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGroupeStatFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'intitule'          => new sfWidgetFormFilterInput(),
      'parametres'        => new sfWidgetFormFilterInput(),
      'id_site'           => new sfWidgetFormFilterInput(),
      'etat'              => new sfWidgetFormFilterInput(),
      'date_creation'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_modification' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'intitule'          => new sfValidatorPass(array('required' => false)),
      'parametres'        => new sfValidatorPass(array('required' => false)),
      'id_site'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'etat'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('groupe_stat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupeStat';
  }

  public function getFields()
  {
    return array(
      'id_groupe_stat'    => 'Number',
      'intitule'          => 'Text',
      'parametres'        => 'Text',
      'id_site'           => 'Number',
      'etat'              => 'Number',
      'date_creation'     => 'Date',
      'date_modification' => 'Date',
    );
  }
}
