<?php

/**
 * ContactLesecomobiles form base class.
 *
 * @method ContactLesecomobiles getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactLesecomobilesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_id'        => new sfWidgetFormInputHidden(),
      'contact_nom'       => new sfWidgetFormInputText(),
      'contact_prenom'    => new sfWidgetFormInputText(),
      'contact_mail'      => new sfWidgetFormInputText(),
      'contact_adresse'   => new sfWidgetFormInputText(),
      'contact_tel'       => new sfWidgetFormInputText(),
      'contact_organisme' => new sfWidgetFormInputText(),
      'contact_fonction'  => new sfWidgetFormInputText(),
      'contact_remarques' => new sfWidgetFormTextarea(),
      'contact_choixdate' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'contact_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('contact_id')), 'empty_value' => $this->getObject()->get('contact_id'), 'required' => false)),
      'contact_nom'       => new sfValidatorString(array('max_length' => 255)),
      'contact_prenom'    => new sfValidatorString(array('max_length' => 255)),
      'contact_mail'      => new sfValidatorString(array('max_length' => 255)),
      'contact_adresse'   => new sfValidatorString(array('max_length' => 255)),
      'contact_tel'       => new sfValidatorString(array('max_length' => 20)),
      'contact_organisme' => new sfValidatorString(array('max_length' => 255)),
      'contact_fonction'  => new sfValidatorString(array('max_length' => 255)),
      'contact_remarques' => new sfValidatorString(),
      'contact_choixdate' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('contact_lesecomobiles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactLesecomobiles';
  }

}
