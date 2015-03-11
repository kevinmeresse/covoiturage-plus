<?php

/**
 * CpContact form base class.
 *
 * @method CpContact getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_contact_id'                  => new sfWidgetFormInputHidden(),
      'cp_contact_nom'                 => new sfWidgetFormInputText(),
      'cp_contact_prenom'              => new sfWidgetFormInputText(),
      'cp_contact_tel'                 => new sfWidgetFormInputText(),
      'cp_contact_tel_autre'           => new sfWidgetFormInputText(),
      'cp_contact_mail'                => new sfWidgetFormInputText(),
      'cp_contact_mail_autre'          => new sfWidgetFormInputText(),
      'cp_contact_fonction'            => new sfWidgetFormInputText(),
      'cp_contact_commentaire'         => new sfWidgetFormTextarea(),
      'cp_contact_contact_principal'   => new sfWidgetFormInputText(),
      'cp_contact_date_creation'       => new sfWidgetFormDateTime(),
      'cp_contact_date_modification'   => new sfWidgetFormDateTime(),
      'cp_contact_cp_etablissement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => false)),
      'cp_contact_statut_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpContactStatut'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_contact_id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_contact_id')), 'empty_value' => $this->getObject()->get('cp_contact_id'), 'required' => false)),
      'cp_contact_nom'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_contact_prenom'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_contact_tel'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cp_contact_tel_autre'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'cp_contact_mail'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_contact_mail_autre'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cp_contact_fonction'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'cp_contact_commentaire'         => new sfValidatorString(array('required' => false)),
      'cp_contact_contact_principal'   => new sfValidatorInteger(array('required' => false)),
      'cp_contact_date_creation'       => new sfValidatorDateTime(array('required' => false)),
      'cp_contact_date_modification'   => new sfValidatorDateTime(array('required' => false)),
      'cp_contact_cp_etablissement_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'required' => false)),
      'cp_contact_statut_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpContactStatut'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpContact';
  }

}
