<?php

/**
 * CpEtablissementStatut filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementStatutFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_statut_nom'               => new sfWidgetFormFilterInput(),
      'cp_etablissement_statut_ordre'             => new sfWidgetFormFilterInput(),
      'cp_etablissement_statut_date_creation'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_etablissement_statut_date_modification' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'cp_etablissement_statut_nom'               => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_statut_ordre'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_etablissement_statut_date_creation'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_etablissement_statut_date_modification' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement_statut_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissementStatut';
  }

  public function getFields()
  {
    return array(
      'cp_etablissement_statut_id'                => 'Number',
      'cp_etablissement_statut_nom'               => 'Text',
      'cp_etablissement_statut_ordre'             => 'Number',
      'cp_etablissement_statut_date_creation'     => 'Date',
      'cp_etablissement_statut_date_modification' => 'Date',
    );
  }
}
