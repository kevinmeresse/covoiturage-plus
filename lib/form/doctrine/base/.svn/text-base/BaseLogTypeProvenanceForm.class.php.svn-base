<?php

/**
 * LogTypeProvenance form base class.
 *
 * @method LogTypeProvenance getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogTypeProvenanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_log_type_provenance' => new sfWidgetFormInputHidden(),
      'type_provenance'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_log_type_provenance' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_log_type_provenance')), 'empty_value' => $this->getObject()->get('id_log_type_provenance'), 'required' => false)),
      'type_provenance'        => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('log_type_provenance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogTypeProvenance';
  }

}
