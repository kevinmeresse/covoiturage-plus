<?php

/**
 * CovoitureurFonction filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurFonctionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_site_client'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'                     => new sfValidatorPass(array('required' => false)),
      'date_creation'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_site_client'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_fonction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurFonction';
  }

  public function getFields()
  {
    return array(
      'id_covoitureur_fonction' => 'Number',
      'nom'                     => 'Text',
      'date_creation'           => 'Date',
      'id_site_client'          => 'ForeignKey',
    );
  }
}
