<?php

/**
 * CpContactStatut form base class.
 *
 * @method CpContactStatut getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpContactStatutForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_contact_statut_id'      => new sfWidgetFormInputHidden(),
      'cp_contact_statut_libelle' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_contact_statut_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_contact_statut_id')), 'empty_value' => $this->getObject()->get('cp_contact_statut_id'), 'required' => false)),
      'cp_contact_statut_libelle' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_contact_statut[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpContactStatut';
  }

}
