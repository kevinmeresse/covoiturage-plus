<?php

/**
 * WysiNewsletterMembre form base class.
 *
 * @method WysiNewsletterMembre getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterMembreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'id_newsletter_categorie' => new sfWidgetFormInputText(),
      'mail'                    => new sfWidgetFormInputText(),
      'etat'                    => new sfWidgetFormInputText(),
      'date_creation'           => new sfWidgetFormDateTime(),
      'cle'                     => new sfWidgetFormInputText(),
      'langue'                  => new sfWidgetFormInputText(),
      'nom'                     => new sfWidgetFormInputText(),
      'prenom'                  => new sfWidgetFormInputText(),
      'societe'                 => new sfWidgetFormInputText(),
      'type_inscription'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_newsletter_categorie' => new sfValidatorInteger(array('required' => false)),
      'mail'                    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'etat'                    => new sfValidatorInteger(array('required' => false)),
      'date_creation'           => new sfValidatorDateTime(array('required' => false)),
      'cle'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'langue'                  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'prenom'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'societe'                 => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'type_inscription'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_membre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterMembre';
  }

}
