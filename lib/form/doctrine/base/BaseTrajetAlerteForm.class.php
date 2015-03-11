<?php

/**
 * TrajetAlerte form base class.
 *
 * @method TrajetAlerte getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrajetAlerteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trajet_alerte'       => new sfWidgetFormInputHidden(),
      'id_site'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'cle'                    => new sfWidgetFormInputText(),
      'etat'                   => new sfWidgetFormInputText(),
      'id_utilisateur'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'mail_utilisateur'       => new sfWidgetFormInputText(),
      'tel_utilisateur'        => new sfWidgetFormInputText(),
      'id_type_trajet'         => new sfWidgetFormInputText(),
      'id_depart'              => new sfWidgetFormInputText(),
      'id_depart2'             => new sfWidgetFormInputText(),
      'id_depart_pays'         => new sfWidgetFormInputText(),
      'depart_type'            => new sfWidgetFormInputText(),
      'depart_autre_lieu'      => new sfWidgetFormInputText(),
      'id_destination'         => new sfWidgetFormInputText(),
      'id_destination2'        => new sfWidgetFormInputText(),
      'id_destination_pays'    => new sfWidgetFormInputText(),
      'destination_type'       => new sfWidgetFormInputText(),
      'destination_autre_lieu' => new sfWidgetFormInputText(),
      'date_creation'          => new sfWidgetFormDateTime(),
      'bascule'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trajet_alerte'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trajet_alerte')), 'empty_value' => $this->getObject()->get('id_trajet_alerte'), 'required' => false)),
      'id_site'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'cle'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                   => new sfValidatorInteger(array('required' => false)),
      'id_utilisateur'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'required' => false)),
      'mail_utilisateur'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tel_utilisateur'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_type_trajet'         => new sfValidatorInteger(array('required' => false)),
      'id_depart'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_depart2'             => new sfValidatorInteger(array('required' => false)),
      'id_depart_pays'         => new sfValidatorInteger(array('required' => false)),
      'depart_type'            => new sfValidatorInteger(array('required' => false)),
      'depart_autre_lieu'      => new sfValidatorInteger(array('required' => false)),
      'id_destination'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_destination2'        => new sfValidatorInteger(array('required' => false)),
      'id_destination_pays'    => new sfValidatorInteger(array('required' => false)),
      'destination_type'       => new sfValidatorInteger(array('required' => false)),
      'destination_autre_lieu' => new sfValidatorInteger(array('required' => false)),
      'date_creation'          => new sfValidatorDateTime(array('required' => false)),
      'bascule'                => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trajet_alerte[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetAlerte';
  }

}
