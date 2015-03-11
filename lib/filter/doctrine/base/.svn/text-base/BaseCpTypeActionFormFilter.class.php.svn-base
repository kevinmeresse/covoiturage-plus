<?php

/**
 * CpTypeAction filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpTypeActionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_type_action_nom'               => new sfWidgetFormFilterInput(),
      'cp_type_action_ordre'             => new sfWidgetFormFilterInput(),
      'cp_type_action_date_creation'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_type_action_date_modification' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_type_action_cible'             => new sfWidgetFormFilterInput(),
      'cp_type_action_statut_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeActionStatut'), 'add_empty' => true)),
      'cp_type_action_type_mail'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cp_type_action_nom'               => new sfValidatorPass(array('required' => false)),
      'cp_type_action_ordre'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_type_action_date_creation'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_type_action_date_modification' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_type_action_cible'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_type_action_statut_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpTypeActionStatut'), 'column' => 'cp_type_action_statut_id')),
      'cp_type_action_type_mail'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cp_type_action_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTypeAction';
  }

  public function getFields()
  {
    return array(
      'cp_type_action_id'                => 'Number',
      'cp_type_action_nom'               => 'Text',
      'cp_type_action_ordre'             => 'Number',
      'cp_type_action_date_creation'     => 'Date',
      'cp_type_action_date_modification' => 'Date',
      'cp_type_action_cible'             => 'Number',
      'cp_type_action_statut_id'         => 'ForeignKey',
      'cp_type_action_type_mail'         => 'Number',
    );
  }
}
