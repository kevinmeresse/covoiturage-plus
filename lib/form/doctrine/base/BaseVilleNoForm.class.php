<?php

/**
 * VilleNo form base class.
 *
 * @method VilleNo getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVilleNoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ville'   => new sfWidgetFormInputHidden(),
      'id_pays'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'), 'add_empty' => false)),
      'nom_ville'  => new sfWidgetFormInputText(),
      'nom_ville2' => new sfWidgetFormInputText(),
      'latitude'   => new sfWidgetFormInputText(),
      'longitude'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ville'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_ville')), 'empty_value' => $this->getObject()->get('id_ville'), 'required' => false)),
      'id_pays'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'))),
      'nom_ville'  => new sfValidatorString(array('max_length' => 255)),
      'nom_ville2' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'   => new sfValidatorNumber(array('required' => false)),
      'longitude'  => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ville_no[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleNo';
  }

}
