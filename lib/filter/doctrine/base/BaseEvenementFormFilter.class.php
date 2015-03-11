<?php

/**
 * Evenement filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEvenementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etat'               => new sfWidgetFormFilterInput(),
      'date_creation'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_modification'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_publication'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_depublication' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'libelle'            => new sfWidgetFormFilterInput(),
      'description'        => new sfWidgetFormFilterInput(),
      'id_commune'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'id_site'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'etat'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_publication'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_depublication' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'libelle'            => new sfValidatorPass(array('required' => false)),
      'description'        => new sfValidatorPass(array('required' => false)),
      'id_commune'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VilleFr'), 'column' => 'id_ville')),
      'id_site'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
    ));

    $this->widgetSchema->setNameFormat('evenement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evenement';
  }

  public function getFields()
  {
    return array(
      'id_evenement'       => 'Number',
      'etat'               => 'Number',
      'date_creation'      => 'Date',
      'date_modification'  => 'Date',
      'date_publication'   => 'Date',
      'date_depublication' => 'Date',
      'libelle'            => 'Text',
      'description'        => 'Text',
      'id_commune'         => 'ForeignKey',
      'id_site'            => 'ForeignKey',
    );
  }
}
