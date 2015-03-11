<?php

/**
 * CpContact filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_contact_nom'                 => new sfWidgetFormFilterInput(),
      'cp_contact_prenom'              => new sfWidgetFormFilterInput(),
      'cp_contact_tel'                 => new sfWidgetFormFilterInput(),
      'cp_contact_tel_autre'           => new sfWidgetFormFilterInput(),
      'cp_contact_mail'                => new sfWidgetFormFilterInput(),
      'cp_contact_mail_autre'          => new sfWidgetFormFilterInput(),
      'cp_contact_fonction'            => new sfWidgetFormFilterInput(),
      'cp_contact_commentaire'         => new sfWidgetFormFilterInput(),
      'cp_contact_contact_principal'   => new sfWidgetFormFilterInput(),
      'cp_contact_date_creation'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_contact_date_modification'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cp_contact_cp_etablissement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
      'cp_contact_statut_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpContactStatut'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_contact_nom'                 => new sfValidatorPass(array('required' => false)),
      'cp_contact_prenom'              => new sfValidatorPass(array('required' => false)),
      'cp_contact_tel'                 => new sfValidatorPass(array('required' => false)),
      'cp_contact_tel_autre'           => new sfValidatorPass(array('required' => false)),
      'cp_contact_mail'                => new sfValidatorPass(array('required' => false)),
      'cp_contact_mail_autre'          => new sfValidatorPass(array('required' => false)),
      'cp_contact_fonction'            => new sfValidatorPass(array('required' => false)),
      'cp_contact_commentaire'         => new sfValidatorPass(array('required' => false)),
      'cp_contact_contact_principal'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_contact_date_creation'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_contact_date_modification'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cp_contact_cp_etablissement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissement'), 'column' => 'cp_etablissement_id')),
      'cp_contact_statut_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpContactStatut'), 'column' => 'cp_contact_statut_id')),
    ));

    $this->widgetSchema->setNameFormat('cp_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpContact';
  }

  public function getFields()
  {
    return array(
      'cp_contact_id'                  => 'Number',
      'cp_contact_nom'                 => 'Text',
      'cp_contact_prenom'              => 'Text',
      'cp_contact_tel'                 => 'Text',
      'cp_contact_tel_autre'           => 'Text',
      'cp_contact_mail'                => 'Text',
      'cp_contact_mail_autre'          => 'Text',
      'cp_contact_fonction'            => 'Text',
      'cp_contact_commentaire'         => 'Text',
      'cp_contact_contact_principal'   => 'Number',
      'cp_contact_date_creation'       => 'Date',
      'cp_contact_date_modification'   => 'Date',
      'cp_contact_cp_etablissement_id' => 'ForeignKey',
      'cp_contact_statut_id'           => 'ForeignKey',
    );
  }
}
