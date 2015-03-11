<?php

/**
 * Equipage form base class.
 *
 * @method Equipage getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEquipageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_equipage'          => new sfWidgetFormInputHidden(),
      'id_trajet'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => true)),
      'id_createur'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
      'id_site'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'cle'                  => new sfWidgetFormInputText(),
      'etat'                 => new sfWidgetFormInputText(),
      'date_creation'        => new sfWidgetFormDateTime(),
      'nom_equipage'         => new sfWidgetFormInputText(),
      'id_ville_origine'     => new sfWidgetFormInputText(),
      'id_ville_destination' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'date_modification'    => new sfWidgetFormDateTime(),
      'id_profil'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'add_empty' => true)),
      'commentaires'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_equipage'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_equipage')), 'empty_value' => $this->getObject()->get('id_equipage'), 'required' => false)),
      'id_trajet'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'required' => false)),
      'id_createur'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'))),
      'id_site'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'cle'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                 => new sfValidatorInteger(array('required' => false)),
      'date_creation'        => new sfValidatorDateTime(array('required' => false)),
      'nom_equipage'         => new sfValidatorString(array('max_length' => 255)),
      'id_ville_origine'     => new sfValidatorInteger(array('required' => false)),
      'id_ville_destination' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'required' => false)),
      'date_modification'    => new sfValidatorDateTime(array('required' => false)),
      'id_profil'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Profile'), 'required' => false)),
      'commentaires'         => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipage';
  }

}
