<?php

/**
 * CpEtablissement filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_raison_social'              => new sfWidgetFormFilterInput(),
      'cp_etablissement_etablissement_nom'          => new sfWidgetFormFilterInput(),
      'cp_etablissement_denomination'               => new sfWidgetFormFilterInput(),
      'cp_etablissement_enseigne'                   => new sfWidgetFormFilterInput(),
      'cp_etablissement_adresse1'                   => new sfWidgetFormFilterInput(),
      'cp_etablissement_adresse2'                   => new sfWidgetFormFilterInput(),
      'cp_etablissement_code_postal'                => new sfWidgetFormFilterInput(),
      'cp_etablissement_nb_salarie'                 => new sfWidgetFormFilterInput(),
      'cp_etablissement_ville_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'cp_etablissement_zone_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lieu'), 'add_empty' => true)),
      'cp_etablissement_commentaire'                => new sfWidgetFormFilterInput(),
      'cp_etablissement_infos'                      => new sfWidgetFormFilterInput(),
      'cp_etablissement_actions'                    => new sfWidgetFormFilterInput(),
      'cp_etablissement_etablissement_pere_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
      'cp_etablissement_date_creation'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_etablissement_date_modification'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_etablissement_cp_etablissement_statut_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementStatut'), 'add_empty' => true)),
      'cp_etablissement_latitude'                   => new sfWidgetFormFilterInput(),
      'cp_etablissement_longitude'                  => new sfWidgetFormFilterInput(),
      'cp_etablissement_type_societe'               => new sfWidgetFormFilterInput(),
      'cp_etablissement_tel'                        => new sfWidgetFormFilterInput(),
      'cp_etablissement_fax'                        => new sfWidgetFormFilterInput(),
      'cp_etablissement_mail'                       => new sfWidgetFormFilterInput(),
      'cp_etablissement_web'                        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cp_etablissement_raison_social'              => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_etablissement_nom'          => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_denomination'               => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_enseigne'                   => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_adresse1'                   => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_adresse2'                   => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_code_postal'                => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_nb_salarie'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_etablissement_ville_id'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VilleFr'), 'column' => 'id_ville')),
      'cp_etablissement_zone_id'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Lieu'), 'column' => 'id_lieu')),
      'cp_etablissement_commentaire'                => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_infos'                      => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_actions'                    => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_etablissement_pere_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissement'), 'column' => 'cp_etablissement_id')),
      'cp_etablissement_date_creation'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_etablissement_date_modification'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_etablissement_cp_etablissement_statut_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissementStatut'), 'column' => 'cp_etablissement_statut_id')),
      'cp_etablissement_latitude'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cp_etablissement_longitude'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cp_etablissement_type_societe'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_etablissement_tel'                        => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_fax'                        => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_mail'                       => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_web'                        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissement';
  }

  public function getFields()
  {
    return array(
      'cp_etablissement_id'                         => 'Number',
      'cp_etablissement_raison_social'              => 'Text',
      'cp_etablissement_etablissement_nom'          => 'Text',
      'cp_etablissement_denomination'               => 'Text',
      'cp_etablissement_enseigne'                   => 'Text',
      'cp_etablissement_adresse1'                   => 'Text',
      'cp_etablissement_adresse2'                   => 'Text',
      'cp_etablissement_code_postal'                => 'Text',
      'cp_etablissement_nb_salarie'                 => 'Number',
      'cp_etablissement_ville_id'                   => 'ForeignKey',
      'cp_etablissement_zone_id'                    => 'ForeignKey',
      'cp_etablissement_commentaire'                => 'Text',
      'cp_etablissement_infos'                      => 'Text',
      'cp_etablissement_actions'                    => 'Text',
      'cp_etablissement_etablissement_pere_id'      => 'ForeignKey',
      'cp_etablissement_date_creation'              => 'Date',
      'cp_etablissement_date_modification'          => 'Date',
      'cp_etablissement_cp_etablissement_statut_id' => 'ForeignKey',
      'cp_etablissement_latitude'                   => 'Number',
      'cp_etablissement_longitude'                  => 'Number',
      'cp_etablissement_type_societe'               => 'Number',
      'cp_etablissement_tel'                        => 'Text',
      'cp_etablissement_fax'                        => 'Text',
      'cp_etablissement_mail'                       => 'Text',
      'cp_etablissement_web'                        => 'Text',
    );
  }
}
