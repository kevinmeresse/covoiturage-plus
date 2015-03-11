<?php

/**
 * OffreCovoiturage form base class.
 *
 * @method OffreCovoiturage getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOffreCovoiturageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'etat'                 => new sfWidgetFormInputText(),
      'date_creation'        => new sfWidgetFormDateTime(),
      'date_modification'    => new sfWidgetFormDateTime(),
      'id_partenaire'        => new sfWidgetFormInputText(),
      'id_trajet_partenaire' => new sfWidgetFormInputText(),
      'id_personne'          => new sfWidgetFormInputText(),
      'depart_id'            => new sfWidgetFormInputText(),
      'depart_insee'         => new sfWidgetFormInputText(),
      'depart_nom'           => new sfWidgetFormInputText(),
      'destination_id'       => new sfWidgetFormInputText(),
      'destination_insee'    => new sfWidgetFormInputText(),
      'destination_nom'      => new sfWidgetFormInputText(),
      'type_covoiturage'     => new sfWidgetFormInputText(),
      'date_unique'          => new sfWidgetFormDateTime(),
      'frequence'            => new sfWidgetFormInputText(),
      'heure_regulier'       => new sfWidgetFormInputText(),
      'nb_place'             => new sfWidgetFormInputText(),
      'information'          => new sfWidgetFormTextarea(),
      'cout'                 => new sfWidgetFormInputText(),
      'url_retour'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'etat'                 => new sfValidatorInteger(array('required' => false)),
      'date_creation'        => new sfValidatorDateTime(),
      'date_modification'    => new sfValidatorDateTime(),
      'id_partenaire'        => new sfValidatorInteger(),
      'id_trajet_partenaire' => new sfValidatorInteger(),
      'id_personne'          => new sfValidatorInteger(),
      'depart_id'            => new sfValidatorInteger(),
      'depart_insee'         => new sfValidatorInteger(),
      'depart_nom'           => new sfValidatorString(array('max_length' => 255)),
      'destination_id'       => new sfValidatorInteger(),
      'destination_insee'    => new sfValidatorInteger(),
      'destination_nom'      => new sfValidatorString(array('max_length' => 255)),
      'type_covoiturage'     => new sfValidatorInteger(),
      'date_unique'          => new sfValidatorDateTime(),
      'frequence'            => new sfValidatorString(array('max_length' => 250)),
      'heure_regulier'       => new sfValidatorString(array('max_length' => 250)),
      'nb_place'             => new sfValidatorInteger(),
      'information'          => new sfValidatorString(),
      'cout'                 => new sfValidatorString(array('max_length' => 250)),
      'url_retour'           => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('offre_covoiturage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OffreCovoiturage';
  }

}
