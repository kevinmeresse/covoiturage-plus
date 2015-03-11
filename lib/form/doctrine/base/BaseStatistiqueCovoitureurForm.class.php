<?php

/**
 * StatistiqueCovoitureur form base class.
 *
 * @method StatistiqueCovoitureur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStatistiqueCovoitureurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_stat'         => new sfWidgetFormInputHidden(),
      'id_covoitureur'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
      'ip'              => new sfWidgetFormInputText(),
      'navigateur_os'   => new sfWidgetFormInputText(),
      'navigateur_full' => new sfWidgetFormInputText(),
      'resolution'      => new sfWidgetFormInputText(),
      'nombres_trajets' => new sfWidgetFormInputText(),
      'site_client'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'date'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_stat'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_stat')), 'empty_value' => $this->getObject()->get('id_stat'), 'required' => false)),
      'id_covoitureur'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'))),
      'ip'              => new sfValidatorString(array('max_length' => 20)),
      'navigateur_os'   => new sfValidatorString(array('max_length' => 50)),
      'navigateur_full' => new sfValidatorString(array('max_length' => 150)),
      'resolution'      => new sfValidatorString(array('max_length' => 20)),
      'nombres_trajets' => new sfValidatorInteger(),
      'site_client'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'date'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('statistique_covoitureur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StatistiqueCovoitureur';
  }

}
