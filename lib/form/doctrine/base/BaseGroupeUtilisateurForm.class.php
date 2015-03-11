<?php

/**
 * GroupeUtilisateur form base class.
 *
 * @method GroupeUtilisateur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGroupeUtilisateurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_groupe_utilisateur' => new sfWidgetFormInputHidden(),
      'cle'                   => new sfWidgetFormInputText(),
      'etat'                  => new sfWidgetFormInputText(),
      'date_creation'         => new sfWidgetFormDateTime(),
      'nom'                   => new sfWidgetFormInputText(),
      'description'           => new sfWidgetFormInputText(),
      'mail'                  => new sfWidgetFormInputText(),
      'id_droit'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Droit'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_groupe_utilisateur' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_groupe_utilisateur')), 'empty_value' => $this->getObject()->get('id_groupe_utilisateur'), 'required' => false)),
      'cle'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                  => new sfValidatorInteger(array('required' => false)),
      'date_creation'         => new sfValidatorDateTime(array('required' => false)),
      'nom'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_droit'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Droit'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groupe_utilisateur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupeUtilisateur';
  }

}
