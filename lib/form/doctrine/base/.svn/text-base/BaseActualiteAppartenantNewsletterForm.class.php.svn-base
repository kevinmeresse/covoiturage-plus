<?php

/**
 * ActualiteAppartenantNewsletter form base class.
 *
 * @method ActualiteAppartenantNewsletter getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActualiteAppartenantNewsletterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_newsletter' => new sfWidgetFormInputText(),
      'id_actualite'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualite'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_newsletter' => new sfValidatorInteger(array('required' => false)),
      'id_actualite'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualite'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actualite_appartenant_newsletter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActualiteAppartenantNewsletter';
  }

}
