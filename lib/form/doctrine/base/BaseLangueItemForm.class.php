<?php

/**
 * LangueItem form base class.
 *
 * @method LangueItem getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLangueItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_item'      => new sfWidgetFormInputHidden(),
      'libelle_item' => new sfWidgetFormInputText(),
      'etat'         => new sfWidgetFormInputText(),
      'id_page'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_item'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_item')), 'empty_value' => $this->getObject()->get('id_item'), 'required' => false)),
      'libelle_item' => new sfValidatorString(array('max_length' => 255)),
      'etat'         => new sfValidatorInteger(array('required' => false)),
      'id_page'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'))),
    ));

    $this->widgetSchema->setNameFormat('langue_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LangueItem';
  }

}
