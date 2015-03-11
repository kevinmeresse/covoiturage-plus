<?php

/**
 * WysiNewsletterRetour form base class.
 *
 * @method WysiNewsletterRetour getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterRetourForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_newsletter' => new sfWidgetFormInputText(),
      'id_membre'     => new sfWidgetFormInputText(),
      'mail_membre'   => new sfWidgetFormInputText(),
      'date'          => new sfWidgetFormDateTime(),
      'info'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_newsletter' => new sfValidatorInteger(array('required' => false)),
      'id_membre'     => new sfValidatorInteger(array('required' => false)),
      'mail_membre'   => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'date'          => new sfValidatorDateTime(array('required' => false)),
      'info'          => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_retour[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterRetour';
  }

}
