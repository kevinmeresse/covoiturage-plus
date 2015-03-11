<?php

/**
 * Parking filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParkingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'           => new sfWidgetFormFilterInput(),
      'etat'          => new sfWidgetFormFilterInput(),
      'date_creation' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nom_parking'   => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'x'             => new sfWidgetFormFilterInput(),
      'y'             => new sfWidgetFormFilterInput(),
      'id_commune'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cle'           => new sfValidatorPass(array('required' => false)),
      'etat'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nom_parking'   => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'x'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_commune'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Commune'), 'column' => 'id_commune')),
    ));

    $this->widgetSchema->setNameFormat('parking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parking';
  }

  public function getFields()
  {
    return array(
      'id_parking'    => 'Number',
      'cle'           => 'Text',
      'etat'          => 'Number',
      'date_creation' => 'Date',
      'nom_parking'   => 'Text',
      'description'   => 'Text',
      'x'             => 'Number',
      'y'             => 'Number',
      'id_commune'    => 'ForeignKey',
    );
  }
}
