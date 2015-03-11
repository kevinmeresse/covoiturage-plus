<?php

/**
 * VehiculeMarque form base class.
 *
 * @method VehiculeMarque getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculeMarqueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_marque'     => new sfWidgetFormInputHidden(),
      'cle'           => new sfWidgetFormInputText(),
      'etat'          => new sfWidgetFormInputText(),
      'date_creation' => new sfWidgetFormDateTime(),
      'nom_marque'    => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_marque'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_marque')), 'empty_value' => $this->getObject()->get('id_marque'), 'required' => false)),
      'cle'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'          => new sfValidatorInteger(array('required' => false)),
      'date_creation' => new sfValidatorDateTime(array('required' => false)),
      'nom_marque'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicule_marque[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculeMarque';
  }

}
