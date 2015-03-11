<?php

/**
 * VehiculeCategorie form base class.
 *
 * @method VehiculeCategorie getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculeCategorieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_vehicule_categorie'  => new sfWidgetFormInputHidden(),
      'cle'                    => new sfWidgetFormInputText(),
      'etat'                   => new sfWidgetFormInputText(),
      'date_creation'          => new sfWidgetFormDateTime(),
      'nom_vehicule_categorie' => new sfWidgetFormInputText(),
      'description'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_vehicule_categorie'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_vehicule_categorie')), 'empty_value' => $this->getObject()->get('id_vehicule_categorie'), 'required' => false)),
      'cle'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                   => new sfValidatorInteger(array('required' => false)),
      'date_creation'          => new sfValidatorDateTime(array('required' => false)),
      'nom_vehicule_categorie' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicule_categorie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculeCategorie';
  }

}
