<?php

/**
 * ZoneIndustrielle form base class.
 *
 * @method ZoneIndustrielle getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZoneIndustrielleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_zone_industrielle'  => new sfWidgetFormInputHidden(),
      'cle'                   => new sfWidgetFormInputText(),
      'etat'                  => new sfWidgetFormInputText(),
      'date_creation'         => new sfWidgetFormDateTime(),
      'nom_zone_industrielle' => new sfWidgetFormInputText(),
      'description'           => new sfWidgetFormInputText(),
      'x'                     => new sfWidgetFormInputText(),
      'y'                     => new sfWidgetFormInputText(),
      'id_commune'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_zone_industrielle'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_zone_industrielle')), 'empty_value' => $this->getObject()->get('id_zone_industrielle'), 'required' => false)),
      'cle'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                  => new sfValidatorInteger(array('required' => false)),
      'date_creation'         => new sfValidatorDateTime(array('required' => false)),
      'nom_zone_industrielle' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'x'                     => new sfValidatorInteger(array('required' => false)),
      'y'                     => new sfValidatorInteger(array('required' => false)),
      'id_commune'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Commune'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('zone_industrielle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ZoneIndustrielle';
  }

}
