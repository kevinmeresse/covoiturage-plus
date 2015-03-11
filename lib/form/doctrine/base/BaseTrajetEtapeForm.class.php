<?php

/**
 * TrajetEtape form base class.
 *
 * @method TrajetEtape getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrajetEtapeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trajet_etape' => new sfWidgetFormInputHidden(),
      'id_trajet'       => new sfWidgetFormInputText(),
      'id_lieu'         => new sfWidgetFormInputText(),
      'id_lieu_2'       => new sfWidgetFormInputText(),
      'id_lieu_pays'    => new sfWidgetFormInputText(),
      'type'            => new sfWidgetFormInputText(),
      'autre'           => new sfWidgetFormInputText(),
      'position'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trajet_etape' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trajet_etape')), 'empty_value' => $this->getObject()->get('id_trajet_etape'), 'required' => false)),
      'id_trajet'       => new sfValidatorInteger(array('required' => false)),
      'id_lieu'         => new sfValidatorInteger(array('required' => false)),
      'id_lieu_2'       => new sfValidatorInteger(array('required' => false)),
      'id_lieu_pays'    => new sfValidatorInteger(array('required' => false)),
      'type'            => new sfValidatorInteger(array('required' => false)),
      'autre'           => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'position'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trajet_etape[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetEtape';
  }

}
