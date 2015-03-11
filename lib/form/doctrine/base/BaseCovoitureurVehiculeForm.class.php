<?php

/**
 * CovoitureurVehicule form base class.
 *
 * @method CovoitureurVehicule getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurVehiculeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vehicule'     => new sfWidgetFormInputHidden(),
      'cle'             => new sfWidgetFormInputText(),
      'etat'            => new sfWidgetFormInputText(),
      'date_creation'   => new sfWidgetFormDateTime(),
      'id_utilisateur'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
      'id_marque'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'add_empty' => true)),
      'id_modele'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeModele'), 'add_empty' => true)),
      'id_motorisation' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMotorisation'), 'add_empty' => true)),
      'annee'           => new sfWidgetFormInputText(),
      'couleur'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_vehicule'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_vehicule')), 'empty_value' => $this->getObject()->get('id_vehicule'), 'required' => false)),
      'cle'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'            => new sfValidatorInteger(array('required' => false)),
      'date_creation'   => new sfValidatorDateTime(array('required' => false)),
      'id_utilisateur'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'required' => false)),
      'id_marque'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'required' => false)),
      'id_modele'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeModele'), 'required' => false)),
      'id_motorisation' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMotorisation'), 'required' => false)),
      'annee'           => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'couleur'         => new sfValidatorString(array('max_length' => 15)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_vehicule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurVehicule';
  }

}
