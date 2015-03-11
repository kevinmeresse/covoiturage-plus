<?php

/**
 * VehiculeModele filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVehiculeModeleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'           => new sfWidgetFormFilterInput(),
      'etat'          => new sfWidgetFormFilterInput(),
      'date_creation' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nom_modele'    => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'id_marque'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cle'           => new sfValidatorPass(array('required' => false)),
      'etat'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nom_modele'    => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'id_marque'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculeMarque'), 'column' => 'id_marque')),
    ));

    $this->widgetSchema->setNameFormat('vehicule_modele_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculeModele';
  }

  public function getFields()
  {
    return array(
      'id_modele'     => 'Number',
      'cle'           => 'Text',
      'etat'          => 'Number',
      'date_creation' => 'Date',
      'nom_modele'    => 'Text',
      'description'   => 'Text',
      'id_marque'     => 'ForeignKey',
    );
  }
}
