<?php

/**
 * Region form base class.
 *
 * @method Region getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_region' => new sfWidgetFormInputHidden(),
      'nom'       => new sfWidgetFormInputText(),
      'id_pays'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pays'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_region' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_region')), 'empty_value' => $this->getObject()->get('id_region'), 'required' => false)),
      'nom'       => new sfValidatorString(array('max_length' => 255)),
      'id_pays'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pays'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('region[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

}
