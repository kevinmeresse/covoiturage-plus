<?php

/**
 * Utilisateur form base class.
 *
 * @method Utilisateur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtilisateurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_utilisateur'          => new sfWidgetFormInputHidden(),
      'cle'                     => new sfWidgetFormInputText(),
      'etat'                    => new sfWidgetFormInputText(),
      'date_creation'           => new sfWidgetFormDateTime(),
      'identifiant'             => new sfWidgetFormInputText(),
      'pass'                    => new sfWidgetFormInputText(),
      'nom'                     => new sfWidgetFormInputText(),
      'prenom'                  => new sfWidgetFormInputText(),
      'mail'                    => new sfWidgetFormInputText(),
      'droit'                   => new sfWidgetFormInputText(),
      'fonction'                => new sfWidgetFormInputText(),
      'date_derniere_connexion' => new sfWidgetFormDateTime(),
      'nombre_connexion'        => new sfWidgetFormInputText(),
      'id_groupe_utilisateur'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_utilisateur'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_utilisateur')), 'empty_value' => $this->getObject()->get('id_utilisateur'), 'required' => false)),
      'cle'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                    => new sfValidatorInteger(array('required' => false)),
      'date_creation'           => new sfValidatorDateTime(array('required' => false)),
      'identifiant'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pass'                    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nom'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prenom'                  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'mail'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'droit'                   => new sfValidatorInteger(array('required' => false)),
      'fonction'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'date_derniere_connexion' => new sfValidatorDateTime(array('required' => false)),
      'nombre_connexion'        => new sfValidatorInteger(array('required' => false)),
      'id_groupe_utilisateur'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('utilisateur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Utilisateur';
  }

}
