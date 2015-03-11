<?php

/**
 * CpTrajet filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpTrajetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'lundi_prise_service_min'     => new sfWidgetFormFilterInput(),
      'lundi_prise_service_max'     => new sfWidgetFormFilterInput(),
      'lundi_fin_service_min'       => new sfWidgetFormFilterInput(),
      'lundi_fin_service_max'       => new sfWidgetFormFilterInput(),
      'mardi_prise_service_min'     => new sfWidgetFormFilterInput(),
      'mardi_prise_service_max'     => new sfWidgetFormFilterInput(),
      'mardi_fin_service_min'       => new sfWidgetFormFilterInput(),
      'mardi_fin_service_max'       => new sfWidgetFormFilterInput(),
      'mercredi_prise_service_min'  => new sfWidgetFormFilterInput(),
      'mercredi_prise_service_max'  => new sfWidgetFormFilterInput(),
      'mercredi_fin_service_min'    => new sfWidgetFormFilterInput(),
      'mercredi_fin_service_max'    => new sfWidgetFormFilterInput(),
      'jeudi_prise_service_min'     => new sfWidgetFormFilterInput(),
      'jeudi_prise_service_max'     => new sfWidgetFormFilterInput(),
      'jeudi_fin_service_min'       => new sfWidgetFormFilterInput(),
      'jeudi_fin_service_max'       => new sfWidgetFormFilterInput(),
      'vendredi_prise_service_min'  => new sfWidgetFormFilterInput(),
      'vendredi_prise_service_max'  => new sfWidgetFormFilterInput(),
      'vendredi_fin_service_min'    => new sfWidgetFormFilterInput(),
      'vendredi_fin_service_max'    => new sfWidgetFormFilterInput(),
      'samedi_prise_service_min'    => new sfWidgetFormFilterInput(),
      'samedi_prise_service_max'    => new sfWidgetFormFilterInput(),
      'samedi_fin_service_min'      => new sfWidgetFormFilterInput(),
      'samedi_fin_service_max'      => new sfWidgetFormFilterInput(),
      'dimanche_prise_service_min'  => new sfWidgetFormFilterInput(),
      'dimanche_prise_service_max'  => new sfWidgetFormFilterInput(),
      'dimanche_fin_service_min'    => new sfWidgetFormFilterInput(),
      'dimanche_fin_service_max'    => new sfWidgetFormFilterInput(),
      'id_trajet'                   => new sfWidgetFormFilterInput(),
      'cp_etablissement_horaire_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'add_empty' => true)),
      'cp_etablissement_secteur_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'add_empty' => true)),
      'alternance_vehicule'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'lundi_prise_service_min'     => new sfValidatorPass(array('required' => false)),
      'lundi_prise_service_max'     => new sfValidatorPass(array('required' => false)),
      'lundi_fin_service_min'       => new sfValidatorPass(array('required' => false)),
      'lundi_fin_service_max'       => new sfValidatorPass(array('required' => false)),
      'mardi_prise_service_min'     => new sfValidatorPass(array('required' => false)),
      'mardi_prise_service_max'     => new sfValidatorPass(array('required' => false)),
      'mardi_fin_service_min'       => new sfValidatorPass(array('required' => false)),
      'mardi_fin_service_max'       => new sfValidatorPass(array('required' => false)),
      'mercredi_prise_service_min'  => new sfValidatorPass(array('required' => false)),
      'mercredi_prise_service_max'  => new sfValidatorPass(array('required' => false)),
      'mercredi_fin_service_min'    => new sfValidatorPass(array('required' => false)),
      'mercredi_fin_service_max'    => new sfValidatorPass(array('required' => false)),
      'jeudi_prise_service_min'     => new sfValidatorPass(array('required' => false)),
      'jeudi_prise_service_max'     => new sfValidatorPass(array('required' => false)),
      'jeudi_fin_service_min'       => new sfValidatorPass(array('required' => false)),
      'jeudi_fin_service_max'       => new sfValidatorPass(array('required' => false)),
      'vendredi_prise_service_min'  => new sfValidatorPass(array('required' => false)),
      'vendredi_prise_service_max'  => new sfValidatorPass(array('required' => false)),
      'vendredi_fin_service_min'    => new sfValidatorPass(array('required' => false)),
      'vendredi_fin_service_max'    => new sfValidatorPass(array('required' => false)),
      'samedi_prise_service_min'    => new sfValidatorPass(array('required' => false)),
      'samedi_prise_service_max'    => new sfValidatorPass(array('required' => false)),
      'samedi_fin_service_min'      => new sfValidatorPass(array('required' => false)),
      'samedi_fin_service_max'      => new sfValidatorPass(array('required' => false)),
      'dimanche_prise_service_min'  => new sfValidatorPass(array('required' => false)),
      'dimanche_prise_service_max'  => new sfValidatorPass(array('required' => false)),
      'dimanche_fin_service_min'    => new sfValidatorPass(array('required' => false)),
      'dimanche_fin_service_max'    => new sfValidatorPass(array('required' => false)),
      'id_trajet'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_etablissement_horaire_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'column' => 'cp_etablissement_horaire_id')),
      'cp_etablissement_secteur_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'column' => 'cp_etablissement_secteur_id')),
      'alternance_vehicule'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cp_trajet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTrajet';
  }

  public function getFields()
  {
    return array(
      'cp_trajet_id'                => 'Number',
      'lundi_prise_service_min'     => 'Text',
      'lundi_prise_service_max'     => 'Text',
      'lundi_fin_service_min'       => 'Text',
      'lundi_fin_service_max'       => 'Text',
      'mardi_prise_service_min'     => 'Text',
      'mardi_prise_service_max'     => 'Text',
      'mardi_fin_service_min'       => 'Text',
      'mardi_fin_service_max'       => 'Text',
      'mercredi_prise_service_min'  => 'Text',
      'mercredi_prise_service_max'  => 'Text',
      'mercredi_fin_service_min'    => 'Text',
      'mercredi_fin_service_max'    => 'Text',
      'jeudi_prise_service_min'     => 'Text',
      'jeudi_prise_service_max'     => 'Text',
      'jeudi_fin_service_min'       => 'Text',
      'jeudi_fin_service_max'       => 'Text',
      'vendredi_prise_service_min'  => 'Text',
      'vendredi_prise_service_max'  => 'Text',
      'vendredi_fin_service_min'    => 'Text',
      'vendredi_fin_service_max'    => 'Text',
      'samedi_prise_service_min'    => 'Text',
      'samedi_prise_service_max'    => 'Text',
      'samedi_fin_service_min'      => 'Text',
      'samedi_fin_service_max'      => 'Text',
      'dimanche_prise_service_min'  => 'Text',
      'dimanche_prise_service_max'  => 'Text',
      'dimanche_fin_service_min'    => 'Text',
      'dimanche_fin_service_max'    => 'Text',
      'id_trajet'                   => 'Number',
      'cp_etablissement_horaire_id' => 'ForeignKey',
      'cp_etablissement_secteur_id' => 'ForeignKey',
      'alternance_vehicule'         => 'Number',
    );
  }
}
