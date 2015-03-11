<?php

/**
 * CovoitureurVehicule filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurVehiculeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'             => new sfWidgetFormFilterInput(),
      'etat'            => new sfWidgetFormFilterInput(),
      'date_creation'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_utilisateur'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'id_marque'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'add_empty' => true)),
      'id_modele'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeModele'), 'add_empty' => true)),
      'id_motorisation' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMotorisation'), 'add_empty' => true)),
      'annee'           => new sfWidgetFormFilterInput(),
      'couleur'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cle'             => new sfValidatorPass(array('required' => false)),
      'etat'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_utilisateur'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
      'id_marque'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculeMarque'), 'column' => 'id_marque')),
      'id_modele'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculeModele'), 'column' => 'id_modele')),
      'id_motorisation' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculeMotorisation'), 'column' => 'id_motorisation')),
      'annee'           => new sfValidatorPass(array('required' => false)),
      'couleur'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_vehicule_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurVehicule';
  }

  public function getFields()
  {
    return array(
      'id_vehicule'     => 'Number',
      'cle'             => 'Text',
      'etat'            => 'Number',
      'date_creation'   => 'Date',
      'id_utilisateur'  => 'ForeignKey',
      'id_marque'       => 'ForeignKey',
      'id_modele'       => 'ForeignKey',
      'id_motorisation' => 'ForeignKey',
      'annee'           => 'Text',
      'couleur'         => 'Text',
    );
  }
}
