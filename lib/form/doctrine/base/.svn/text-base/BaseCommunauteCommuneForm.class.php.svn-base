<?php

/**
 * CommunauteCommune form base class.
 *
 * @method CommunauteCommune getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommunauteCommuneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_communaute' => new sfWidgetFormInputHidden(),
      'nom'           => new sfWidgetFormInputText(),
      'id_ville_ref'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => false)),
      'informations'  => new sfWidgetFormTextarea(),
      'contact'       => new sfWidgetFormTextarea(),
      'action'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_communaute' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_communaute')), 'empty_value' => $this->getObject()->get('id_communaute'), 'required' => false)),
      'nom'           => new sfValidatorString(array('max_length' => 255)),
      'id_ville_ref'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'))),
      'informations'  => new sfValidatorString(array('required' => false)),
      'contact'       => new sfValidatorString(array('required' => false)),
      'action'        => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('communaute_commune[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CommunauteCommune';
  }

}
