<?php

/**
 * PavillonsB form base class.
 *
 * @method PavillonsB getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePavillonsBForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pavillons_b_id' => new sfWidgetFormInputHidden(),
      'code_insee'     => new sfWidgetFormInputText(),
      'nom_plage'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'pavillons_b_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pavillons_b_id')), 'empty_value' => $this->getObject()->get('pavillons_b_id'), 'required' => false)),
      'code_insee'     => new sfValidatorInteger(),
      'nom_plage'      => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('pavillons_b[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PavillonsB';
  }

}
