<?php

/**
 * CovoitureurAmis form base class.
 *
 * @method CovoitureurAmis getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurAmisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_covoitureur'      => new sfWidgetFormInputHidden(),
      'id_covoitureur_amis' => new sfWidgetFormInputHidden(),
      'id_site'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'commentaire'         => new sfWidgetFormTextarea(),
      'note'                => new sfWidgetFormInputText(),
      'date_insert'         => new sfWidgetFormDateTime(),
      'valide_message'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_covoitureur'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_covoitureur')), 'empty_value' => $this->getObject()->get('id_covoitureur'), 'required' => false)),
      'id_covoitureur_amis' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_covoitureur_amis')), 'empty_value' => $this->getObject()->get('id_covoitureur_amis'), 'required' => false)),
      'id_site'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'commentaire'         => new sfValidatorString(),
      'note'                => new sfValidatorNumber(),
      'date_insert'         => new sfValidatorDateTime(array('required' => false)),
      'valide_message'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_amis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurAmis';
  }

}
