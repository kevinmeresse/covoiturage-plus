<?php

/**
 * StatistiqueCovoitureur filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStatistiqueCovoitureurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_covoitureur'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'ip'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'navigateur_os'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'navigateur_full' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resolution'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombres_trajets' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'site_client'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_covoitureur'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
      'ip'              => new sfValidatorPass(array('required' => false)),
      'navigateur_os'   => new sfValidatorPass(array('required' => false)),
      'navigateur_full' => new sfValidatorPass(array('required' => false)),
      'resolution'      => new sfValidatorPass(array('required' => false)),
      'nombres_trajets' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'site_client'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('statistique_covoitureur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StatistiqueCovoitureur';
  }

  public function getFields()
  {
    return array(
      'id_stat'         => 'Number',
      'id_covoitureur'  => 'ForeignKey',
      'ip'              => 'Text',
      'navigateur_os'   => 'Text',
      'navigateur_full' => 'Text',
      'resolution'      => 'Text',
      'nombres_trajets' => 'Number',
      'site_client'     => 'ForeignKey',
      'date'            => 'Date',
    );
  }
}
