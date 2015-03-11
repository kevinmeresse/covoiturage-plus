<?php

/**
 * TrajetMiseEnRelation form base class.
 *
 * @method TrajetMiseEnRelation getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrajetMiseEnRelationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trajet_mise_en_relation' => new sfWidgetFormInputHidden(),
      'cle'                        => new sfWidgetFormInputText(),
      'id_trajet'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => false)),
      'id_trajet_createur'         => new sfWidgetFormInputText(),
      'id_demandeur'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
      'date_creation'              => new sfWidgetFormDateTime(),
      'date_envoi'                 => new sfWidgetFormInputText(),
      'etat'                       => new sfWidgetFormInputText(),
      'message'                    => new sfWidgetFormTextarea(),
      'id_site'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'nb_places_demandees'        => new sfWidgetFormInputText(),
      'bascule'                    => new sfWidgetFormInputText(),
      'date_modification'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_trajet_mise_en_relation' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trajet_mise_en_relation')), 'empty_value' => $this->getObject()->get('id_trajet_mise_en_relation'), 'required' => false)),
      'cle'                        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'id_trajet'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'required' => false)),
      'id_trajet_createur'         => new sfValidatorInteger(array('required' => false)),
      'id_demandeur'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'required' => false)),
      'date_creation'              => new sfValidatorDateTime(array('required' => false)),
      'date_envoi'                 => new sfValidatorPass(array('required' => false)),
      'etat'                       => new sfValidatorInteger(array('required' => false)),
      'message'                    => new sfValidatorString(),
      'id_site'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'nb_places_demandees'        => new sfValidatorInteger(),
      'bascule'                    => new sfValidatorInteger(array('required' => false)),
      'date_modification'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trajet_mise_en_relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetMiseEnRelation';
  }

}
