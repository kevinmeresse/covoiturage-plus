<?php

/**
 * VehiculeModele form base class.
 *
 * @method VehiculeModele getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculeModeleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_modele'     => new sfWidgetFormInputHidden(),
      'cle'           => new sfWidgetFormInputText(),
      'etat'          => new sfWidgetFormInputText(),
      'date_creation' => new sfWidgetFormDateTime(),
      'nom_modele'    => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
      'id_marque'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_modele'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_modele')), 'empty_value' => $this->getObject()->get('id_modele'), 'required' => false)),
      'cle'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'          => new sfValidatorInteger(array('required' => false)),
      'date_creation' => new sfValidatorDateTime(array('required' => false)),
      'nom_modele'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_marque'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculeMarque'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicule_modele[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculeModele';
  }

}
