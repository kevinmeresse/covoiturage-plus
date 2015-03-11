<?php

/**
 * CovoitureurEquipages filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurEquipagesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trajet'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => true)),
      'id_site'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'             => new sfWidgetFormFilterInput(),
      'etat'            => new sfWidgetFormFilterInput(),
      'date_creation'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nom_equipage'    => new sfWidgetFormFilterInput(),
      'id_utilisateurb' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_trajet'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Trajet'), 'column' => 'id_trajet')),
      'id_site'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'cle'             => new sfValidatorPass(array('required' => false)),
      'etat'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nom_equipage'    => new sfValidatorPass(array('required' => false)),
      'id_utilisateurb' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_equipages_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurEquipages';
  }

  public function getFields()
  {
    return array(
      'id_equipage'     => 'Number',
      'id_utilisateura' => 'Number',
      'id_trajet'       => 'ForeignKey',
      'id_site'         => 'ForeignKey',
      'cle'             => 'Text',
      'etat'            => 'Number',
      'date_creation'   => 'Date',
      'nom_equipage'    => 'Text',
      'id_utilisateurb' => 'ForeignKey',
    );
  }
}
