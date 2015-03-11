<?php

/**
 * LogSite form base class.
 *
 * @method LogSite getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogSiteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_log_site'            => new sfWidgetFormInputHidden(),
      'id_provenance'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TrajetMiseEnRelation'), 'add_empty' => true)),
      'id_log_type_provenance' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LogTypeProvenance'), 'add_empty' => true)),
      'id_site'                => new sfWidgetFormInputText(),
      'created'                => new sfWidgetFormDateTime(),
      'id_user'                => new sfWidgetFormInputText(),
      'message'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_log_site'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_log_site')), 'empty_value' => $this->getObject()->get('id_log_site'), 'required' => false)),
      'id_provenance'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TrajetMiseEnRelation'), 'required' => false)),
      'id_log_type_provenance' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LogTypeProvenance'), 'required' => false)),
      'id_site'                => new sfValidatorInteger(array('required' => false)),
      'created'                => new sfValidatorDateTime(),
      'id_user'                => new sfValidatorInteger(array('required' => false)),
      'message'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_site[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogSite';
  }

}
