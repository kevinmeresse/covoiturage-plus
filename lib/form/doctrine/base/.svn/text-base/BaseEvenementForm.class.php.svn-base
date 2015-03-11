<?php

/**
 * Evenement form base class.
 *
 * @method Evenement getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEvenementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_evenement'       => new sfWidgetFormInputHidden(),
      'etat'               => new sfWidgetFormInputText(),
      'date_creation'      => new sfWidgetFormDateTime(),
      'date_modification'  => new sfWidgetFormDateTime(),
      'date_publication'   => new sfWidgetFormDate(),
      'date_depublication' => new sfWidgetFormDate(),
      'libelle'            => new sfWidgetFormInputText(),
      'description'        => new sfWidgetFormInputText(),
      'id_commune'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'id_site'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_evenement'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_evenement')), 'empty_value' => $this->getObject()->get('id_evenement'), 'required' => false)),
      'etat'               => new sfValidatorInteger(array('required' => false)),
      'date_creation'      => new sfValidatorDateTime(array('required' => false)),
      'date_modification'  => new sfValidatorDateTime(array('required' => false)),
      'date_publication'   => new sfValidatorDate(array('required' => false)),
      'date_depublication' => new sfValidatorDate(array('required' => false)),
      'libelle'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_commune'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'required' => false)),
      'id_site'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
    ));

    $this->widgetSchema->setNameFormat('evenement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evenement';
  }

}
