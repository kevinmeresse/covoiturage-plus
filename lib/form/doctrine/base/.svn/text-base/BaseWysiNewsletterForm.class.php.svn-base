<?php

/**
 * WysiNewsletter form base class.
 *
 * @method WysiNewsletter getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter'          => new sfWidgetFormInputHidden(),
      'etat'                   => new sfWidgetFormInputText(),
      'fr_titre'               => new sfWidgetFormInputText(),
      'fr_contenu'             => new sfWidgetFormTextarea(),
      'date_creation'          => new sfWidgetFormDateTime(),
      'date_modification'      => new sfWidgetFormDateTime(),
      'date_expedition'        => new sfWidgetFormDateTime(),
      'nombre_personne_attire' => new sfWidgetFormInputText(),
      'id_categorie'           => new sfWidgetFormInputText(),
      'id_personne'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_newsletter'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_newsletter')), 'empty_value' => $this->getObject()->get('id_newsletter'), 'required' => false)),
      'etat'                   => new sfValidatorInteger(array('required' => false)),
      'fr_titre'               => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'fr_contenu'             => new sfValidatorString(array('required' => false)),
      'date_creation'          => new sfValidatorDateTime(array('required' => false)),
      'date_modification'      => new sfValidatorDateTime(array('required' => false)),
      'date_expedition'        => new sfValidatorDateTime(array('required' => false)),
      'nombre_personne_attire' => new sfValidatorInteger(array('required' => false)),
      'id_categorie'           => new sfValidatorInteger(array('required' => false)),
      'id_personne'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletter';
  }

}
