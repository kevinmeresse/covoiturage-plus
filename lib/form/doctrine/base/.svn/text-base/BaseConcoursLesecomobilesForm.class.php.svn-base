<?php

/**
 * ConcoursLesecomobiles form base class.
 *
 * @method ConcoursLesecomobiles getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConcoursLesecomobilesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'concours_id'          => new sfWidgetFormInputHidden(),
      'concours_nom'         => new sfWidgetFormInputText(),
      'concours_mail'        => new sfWidgetFormInputText(),
      'concours_departement' => new sfWidgetFormTextarea(),
      'concours_rep1'        => new sfWidgetFormTextarea(),
      'concours_rep2'        => new sfWidgetFormTextarea(),
      'concours_rep3'        => new sfWidgetFormTextarea(),
      'concours_rep4'        => new sfWidgetFormTextarea(),
      'concours_rep5'        => new sfWidgetFormTextarea(),
      'concours_rep6'        => new sfWidgetFormTextarea(),
      'concours_rep7'        => new sfWidgetFormTextarea(),
      'concours_rep8'        => new sfWidgetFormTextarea(),
      'concours_rep9'        => new sfWidgetFormTextarea(),
      'concours_rep10'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'concours_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('concours_id')), 'empty_value' => $this->getObject()->get('concours_id'), 'required' => false)),
      'concours_nom'         => new sfValidatorString(array('max_length' => 255)),
      'concours_mail'        => new sfValidatorString(array('max_length' => 255)),
      'concours_departement' => new sfValidatorString(),
      'concours_rep1'        => new sfValidatorString(),
      'concours_rep2'        => new sfValidatorString(),
      'concours_rep3'        => new sfValidatorString(),
      'concours_rep4'        => new sfValidatorString(),
      'concours_rep5'        => new sfValidatorString(),
      'concours_rep6'        => new sfValidatorString(),
      'concours_rep7'        => new sfValidatorString(),
      'concours_rep8'        => new sfValidatorString(),
      'concours_rep9'        => new sfValidatorString(),
      'concours_rep10'       => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('concours_lesecomobiles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConcoursLesecomobiles';
  }

}
