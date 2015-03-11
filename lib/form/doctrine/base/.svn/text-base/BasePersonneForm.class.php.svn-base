<?php

/**
 * Personne form base class.
 *
 * @method Personne getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePersonneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_personne'             => new sfWidgetFormInputHidden(),
      'cle'                     => new sfWidgetFormInputText(),
      'etat'                    => new sfWidgetFormInputText(),
      'date_creation'           => new sfWidgetFormDateTime(),
      'identifiant'             => new sfWidgetFormInputText(),
      'mot_de_passe'            => new sfWidgetFormInputText(),
      'sexe'                    => new sfWidgetFormInputText(),
      'civilite'                => new sfWidgetFormInputText(),
      'nom'                     => new sfWidgetFormInputText(),
      'prenom'                  => new sfWidgetFormInputText(),
      'adresse'                 => new sfWidgetFormInputText(),
      'code_postal'             => new sfWidgetFormInputText(),
      'ville'                   => new sfWidgetFormInputText(),
      'mail'                    => new sfWidgetFormInputText(),
      'telephone_fixe'          => new sfWidgetFormInputText(),
      'telephone_mobile'        => new sfWidgetFormInputText(),
      'societe'                 => new sfWidgetFormInputText(),
      'tranche_age'             => new sfWidgetFormInputText(),
      'date_naissance'          => new sfWidgetFormDate(),
      'question'                => new sfWidgetFormInputText(),
      'reponse'                 => new sfWidgetFormInputText(),
      'date_derniere_connexion' => new sfWidgetFormDateTime(),
      'nombre_connexion'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_personne'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_personne')), 'empty_value' => $this->getObject()->get('id_personne'), 'required' => false)),
      'cle'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                    => new sfValidatorInteger(array('required' => false)),
      'date_creation'           => new sfValidatorDateTime(array('required' => false)),
      'identifiant'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mot_de_passe'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'sexe'                    => new sfValidatorInteger(array('required' => false)),
      'civilite'                => new sfValidatorInteger(array('required' => false)),
      'nom'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prenom'                  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'adresse'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'code_postal'             => new sfValidatorInteger(array('required' => false)),
      'ville'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone_fixe'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telephone_mobile'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'societe'                 => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'tranche_age'             => new sfValidatorInteger(array('required' => false)),
      'date_naissance'          => new sfValidatorDate(array('required' => false)),
      'question'                => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'reponse'                 => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'date_derniere_connexion' => new sfValidatorDateTime(array('required' => false)),
      'nombre_connexion'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personne[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personne';
  }

}
