<?php

/**
 * LanguePage form base class.
 *
 * @method LanguePage getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_page'      => new sfWidgetFormInputHidden(),
      'libelle_page' => new sfWidgetFormInputText(),
      'etat'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_page'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_page')), 'empty_value' => $this->getObject()->get('id_page'), 'required' => false)),
      'libelle_page' => new sfValidatorString(array('max_length' => 255)),
      'etat'         => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('langue_page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LanguePage';
  }

}
