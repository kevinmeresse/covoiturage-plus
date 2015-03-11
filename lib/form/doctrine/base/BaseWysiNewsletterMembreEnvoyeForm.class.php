<?php

/**
 * WysiNewsletterMembreEnvoye form base class.
 *
 * @method WysiNewsletterMembreEnvoye getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterMembreEnvoyeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_newsletter' => new sfWidgetFormInputText(),
      'mail'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_newsletter' => new sfValidatorInteger(array('required' => false)),
      'mail'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_membre_envoye[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterMembreEnvoye';
  }

}
