<?php

/**
 * CovoitureurCentreInteret filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurCentreInteretFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_centre_interet' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CentreInteret'), 'add_empty' => true)),
      'id_utilisateur'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_centre_interet' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CentreInteret'), 'column' => 'id_centre_interet')),
      'id_utilisateur'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_centre_interet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurCentreInteret';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_centre_interet' => 'ForeignKey',
      'id_utilisateur'    => 'ForeignKey',
    );
  }
}
