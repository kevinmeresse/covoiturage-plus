<?php

/**
 * LivreOr form base class.
 *
 * @method LivreOr getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLivreOrForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nom'            => new sfWidgetFormInputText(),
      'prenom'         => new sfWidgetFormInputText(),
      'message'        => new sfWidgetFormTextarea(),
      'mail'           => new sfWidgetFormInputText(),
      'date_creation'  => new sfWidgetFormDateTime(),
      'id_site_client' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'etat'           => new sfWidgetFormInputText(),
      'cle'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'            => new sfValidatorString(array('max_length' => 255)),
      'prenom'         => new sfValidatorString(array('max_length' => 255)),
      'message'        => new sfValidatorString(),
      'mail'           => new sfValidatorString(array('max_length' => 255)),
      'date_creation'  => new sfValidatorDateTime(),
      'id_site_client' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'etat'           => new sfValidatorInteger(array('required' => false)),
      'cle'            => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('livre_or[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LivreOr';
  }

}
