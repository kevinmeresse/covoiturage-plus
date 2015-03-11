<?php

/**
 * CovoitureurEquipages form base class.
 *
 * @method CovoitureurEquipages getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurEquipagesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_equipage'     => new sfWidgetFormInputHidden(),
      'id_utilisateura' => new sfWidgetFormInputHidden(),
      'id_trajet'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => false)),
      'id_site'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'cle'             => new sfWidgetFormInputText(),
      'etat'            => new sfWidgetFormInputText(),
      'date_creation'   => new sfWidgetFormDateTime(),
      'nom_equipage'    => new sfWidgetFormInputText(),
      'id_utilisateurb' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_equipage'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_equipage')), 'empty_value' => $this->getObject()->get('id_equipage'), 'required' => false)),
      'id_utilisateura' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_utilisateura')), 'empty_value' => $this->getObject()->get('id_utilisateura'), 'required' => false)),
      'id_trajet'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'))),
      'id_site'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'cle'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'            => new sfValidatorInteger(array('required' => false)),
      'date_creation'   => new sfValidatorDateTime(array('required' => false)),
      'nom_equipage'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_utilisateurb' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'))),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_equipages[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurEquipages';
  }

}
