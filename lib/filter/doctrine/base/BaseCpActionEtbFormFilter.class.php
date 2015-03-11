<?php

/**
 * CpActionEtb filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpActionEtbFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_action_etb_detail'              => new sfWidgetFormFilterInput(),
      'cp_action_etb_date_creation'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_action_etb_date_modification'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_action_etb_date_echeance'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_action_etb_cp_type_action_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpTypeAction'), 'add_empty' => true)),
      'cp_action_etb_cp_etablissement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
      'cp_action_etb_user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'cp_action_etb_cp_contact_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpContact'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_action_etb_detail'              => new sfValidatorPass(array('required' => false)),
      'cp_action_etb_date_creation'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_action_etb_date_modification'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_action_etb_date_echeance'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cp_action_etb_cp_type_action_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpTypeAction'), 'column' => 'cp_type_action_id')),
      'cp_action_etb_cp_etablissement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissement'), 'column' => 'cp_etablissement_id')),
      'cp_action_etb_user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'cp_action_etb_cp_contact_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpContact'), 'column' => 'cp_contact_id')),
    ));

    $this->widgetSchema->setNameFormat('cp_action_etb_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpActionEtb';
  }

  public function getFields()
  {
    return array(
      'cp_action_etb_id'                  => 'Number',
      'cp_action_etb_detail'              => 'Text',
      'cp_action_etb_date_creation'       => 'Date',
      'cp_action_etb_date_modification'   => 'Date',
      'cp_action_etb_date_echeance'       => 'Date',
      'cp_action_etb_cp_type_action_id'   => 'ForeignKey',
      'cp_action_etb_cp_etablissement_id' => 'ForeignKey',
      'cp_action_etb_user_id'             => 'ForeignKey',
      'cp_action_etb_cp_contact_id'       => 'ForeignKey',
    );
  }
}
