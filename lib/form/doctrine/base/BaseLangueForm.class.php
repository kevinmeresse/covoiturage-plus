<?php

/**
 * Langue form base class.
 *
 * @method Langue getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLangueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_langue'      => new sfWidgetFormInputHidden(),
      'libelle_langue' => new sfWidgetFormInputText(),
      'etat'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_langue'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_langue')), 'empty_value' => $this->getObject()->get('id_langue'), 'required' => false)),
      'libelle_langue' => new sfValidatorString(array('max_length' => 255)),
      'etat'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('langue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Langue';
  }

}
