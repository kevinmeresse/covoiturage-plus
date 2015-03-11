<?php

/**
 * CovoitureurAmis filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurAmisFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'commentaire'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'note'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_insert'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'valide_message'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_site'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'commentaire'         => new sfValidatorPass(array('required' => false)),
      'note'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date_insert'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'valide_message'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_amis_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurAmis';
  }

  public function getFields()
  {
    return array(
      'id_covoitureur'      => 'Number',
      'id_covoitureur_amis' => 'Number',
      'id_site'             => 'ForeignKey',
      'commentaire'         => 'Text',
      'note'                => 'Number',
      'date_insert'         => 'Date',
      'valide_message'      => 'Number',
    );
  }
}
