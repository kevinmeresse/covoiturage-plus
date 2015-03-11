<?php

/**
 * CpTrajet form base class.
 *
 * @method CpTrajet getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpTrajetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_trajet_id'                => new sfWidgetFormInputHidden(),
      'lundi_prise_service_min'     => new sfWidgetFormTime(),
      'lundi_prise_service_max'     => new sfWidgetFormTime(),
      'lundi_fin_service_min'       => new sfWidgetFormTime(),
      'lundi_fin_service_max'       => new sfWidgetFormTime(),
      'mardi_prise_service_min'     => new sfWidgetFormTime(),
      'mardi_prise_service_max'     => new sfWidgetFormTime(),
      'mardi_fin_service_min'       => new sfWidgetFormTime(),
      'mardi_fin_service_max'       => new sfWidgetFormTime(),
      'mercredi_prise_service_min'  => new sfWidgetFormTime(),
      'mercredi_prise_service_max'  => new sfWidgetFormTime(),
      'mercredi_fin_service_min'    => new sfWidgetFormTime(),
      'mercredi_fin_service_max'    => new sfWidgetFormTime(),
      'jeudi_prise_service_min'     => new sfWidgetFormTime(),
      'jeudi_prise_service_max'     => new sfWidgetFormTime(),
      'jeudi_fin_service_min'       => new sfWidgetFormTime(),
      'jeudi_fin_service_max'       => new sfWidgetFormTime(),
      'vendredi_prise_service_min'  => new sfWidgetFormTime(),
      'vendredi_prise_service_max'  => new sfWidgetFormTime(),
      'vendredi_fin_service_min'    => new sfWidgetFormTime(),
      'vendredi_fin_service_max'    => new sfWidgetFormTime(),
      'samedi_prise_service_min'    => new sfWidgetFormTime(),
      'samedi_prise_service_max'    => new sfWidgetFormTime(),
      'samedi_fin_service_min'      => new sfWidgetFormTime(),
      'samedi_fin_service_max'      => new sfWidgetFormTime(),
      'dimanche_prise_service_min'  => new sfWidgetFormTime(),
      'dimanche_prise_service_max'  => new sfWidgetFormTime(),
      'dimanche_fin_service_min'    => new sfWidgetFormTime(),
      'dimanche_fin_service_max'    => new sfWidgetFormTime(),
      'id_trajet'                   => new sfWidgetFormInputText(),
      'cp_etablissement_horaire_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'add_empty' => true)),
      'cp_etablissement_secteur_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'add_empty' => true)),
      'alternance_vehicule'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'cp_trajet_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_trajet_id')), 'empty_value' => $this->getObject()->get('cp_trajet_id'), 'required' => false)),
      'lundi_prise_service_min'     => new sfValidatorTime(array('required' => false)),
      'lundi_prise_service_max'     => new sfValidatorTime(array('required' => false)),
      'lundi_fin_service_min'       => new sfValidatorTime(array('required' => false)),
      'lundi_fin_service_max'       => new sfValidatorTime(array('required' => false)),
      'mardi_prise_service_min'     => new sfValidatorTime(array('required' => false)),
      'mardi_prise_service_max'     => new sfValidatorTime(array('required' => false)),
      'mardi_fin_service_min'       => new sfValidatorTime(array('required' => false)),
      'mardi_fin_service_max'       => new sfValidatorTime(array('required' => false)),
      'mercredi_prise_service_min'  => new sfValidatorTime(array('required' => false)),
      'mercredi_prise_service_max'  => new sfValidatorTime(array('required' => false)),
      'mercredi_fin_service_min'    => new sfValidatorTime(array('required' => false)),
      'mercredi_fin_service_max'    => new sfValidatorTime(array('required' => false)),
      'jeudi_prise_service_min'     => new sfValidatorTime(array('required' => false)),
      'jeudi_prise_service_max'     => new sfValidatorTime(array('required' => false)),
      'jeudi_fin_service_min'       => new sfValidatorTime(array('required' => false)),
      'jeudi_fin_service_max'       => new sfValidatorTime(array('required' => false)),
      'vendredi_prise_service_min'  => new sfValidatorTime(array('required' => false)),
      'vendredi_prise_service_max'  => new sfValidatorTime(array('required' => false)),
      'vendredi_fin_service_min'    => new sfValidatorTime(array('required' => false)),
      'vendredi_fin_service_max'    => new sfValidatorTime(array('required' => false)),
      'samedi_prise_service_min'    => new sfValidatorTime(array('required' => false)),
      'samedi_prise_service_max'    => new sfValidatorTime(array('required' => false)),
      'samedi_fin_service_min'      => new sfValidatorTime(array('required' => false)),
      'samedi_fin_service_max'      => new sfValidatorTime(array('required' => false)),
      'dimanche_prise_service_min'  => new sfValidatorTime(array('required' => false)),
      'dimanche_prise_service_max'  => new sfValidatorTime(array('required' => false)),
      'dimanche_fin_service_min'    => new sfValidatorTime(array('required' => false)),
      'dimanche_fin_service_max'    => new sfValidatorTime(array('required' => false)),
      'id_trajet'                   => new sfValidatorInteger(array('required' => false)),
      'cp_etablissement_horaire_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'required' => false)),
      'cp_etablissement_secteur_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'required' => false)),
      'alternance_vehicule'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_trajet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTrajet';
  }

}
