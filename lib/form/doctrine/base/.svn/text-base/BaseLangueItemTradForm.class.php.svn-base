<?php

/**
 * LangueItemTrad form base class.
 *
 * @method LangueItemTrad getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLangueItemTradForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_langue' => new sfWidgetFormInputHidden(),
      'id_item'   => new sfWidgetFormInputHidden(),
      'id_page'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'), 'add_empty' => false)),
      'trad'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_langue' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_langue')), 'empty_value' => $this->getObject()->get('id_langue'), 'required' => false)),
      'id_item'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_item')), 'empty_value' => $this->getObject()->get('id_item'), 'required' => false)),
      'id_page'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'))),
      'trad'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('langue_item_trad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LangueItemTrad';
  }

}
