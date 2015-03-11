<?php

/**
 * DemandeRenseignement filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDemandeRenseignementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'demande_renseignement_civilite'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_nom'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_prenom'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_societe'     => new sfWidgetFormFilterInput(),
      'demande_renseignement_fonction'    => new sfWidgetFormFilterInput(),
      'demande_renseignement_adresse'     => new sfWidgetFormFilterInput(),
      'demande_renseignement_cp'          => new sfWidgetFormFilterInput(),
      'demande_renseignement_ville'       => new sfWidgetFormFilterInput(),
      'demande_renseignement_pays'        => new sfWidgetFormFilterInput(),
      'demande_renseignement_telephone'   => new sfWidgetFormFilterInput(),
      'demande_renseignement_email'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_fax'         => new sfWidgetFormFilterInput(),
      'demande_renseignement_texte'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_type'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'demande_renseignement_date_insert' => new sfWidgetFormFilterInput(),
      'id_site_client'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'demande_renseignement_civilite'    => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_nom'         => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_prenom'      => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_societe'     => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_fonction'    => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_adresse'     => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_cp'          => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_ville'       => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_pays'        => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_telephone'   => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_email'       => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_fax'         => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_texte'       => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_type'        => new sfValidatorPass(array('required' => false)),
      'demande_renseignement_date_insert' => new sfValidatorPass(array('required' => false)),
      'id_site_client'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
    ));

    $this->widgetSchema->setNameFormat('demande_renseignement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DemandeRenseignement';
  }

  public function getFields()
  {
    return array(
      'demande_renseignement_id'          => 'Number',
      'demande_renseignement_civilite'    => 'Text',
      'demande_renseignement_nom'         => 'Text',
      'demande_renseignement_prenom'      => 'Text',
      'demande_renseignement_societe'     => 'Text',
      'demande_renseignement_fonction'    => 'Text',
      'demande_renseignement_adresse'     => 'Text',
      'demande_renseignement_cp'          => 'Text',
      'demande_renseignement_ville'       => 'Text',
      'demande_renseignement_pays'        => 'Text',
      'demande_renseignement_telephone'   => 'Text',
      'demande_renseignement_email'       => 'Text',
      'demande_renseignement_fax'         => 'Text',
      'demande_renseignement_texte'       => 'Text',
      'demande_renseignement_type'        => 'Text',
      'demande_renseignement_date_insert' => 'Text',
      'id_site_client'                    => 'ForeignKey',
    );
  }
}
