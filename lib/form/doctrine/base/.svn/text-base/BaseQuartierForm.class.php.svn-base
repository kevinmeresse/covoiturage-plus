<?php

/**
 * Quartier form base class.
 *
 * @method Quartier getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuartierForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_quartier'  => new sfWidgetFormInputHidden(),
      'nom_quartier' => new sfWidgetFormInputText(),
      'x'            => new sfWidgetFormInputText(),
      'y'            => new sfWidgetFormInputText(),
      'id_commune'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_quartier'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_quartier')), 'empty_value' => $this->getObject()->get('id_quartier'), 'required' => false)),
      'nom_quartier' => new sfValidatorString(array('max_length' => 255)),
      'x'            => new sfValidatorInteger(array('required' => false)),
      'y'            => new sfValidatorInteger(array('required' => false)),
      'id_commune'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('quartier[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quartier';
  }

}
