<?php

/**
 * CovoitureurCentreInteret form base class.
 *
 * @method CovoitureurCentreInteret getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurCentreInteretForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_centre_interet' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CentreInteret'), 'add_empty' => false)),
      'id_utilisateur'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_centre_interet' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CentreInteret'), 'required' => false)),
      'id_utilisateur'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_centre_interet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurCentreInteret';
  }

}
