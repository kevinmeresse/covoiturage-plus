<?php

/**
 * OffreCovoiturage filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOffreCovoiturageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etat'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_modification'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_partenaire'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_trajet_partenaire' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_personne'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depart_id'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depart_insee'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depart_nom'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destination_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destination_insee'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destination_nom'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_covoiturage'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_unique'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'frequence'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'heure_regulier'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nb_place'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'information'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cout'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_retour'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'etat'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_partenaire'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_trajet_partenaire' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_personne'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'depart_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'depart_insee'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'depart_nom'           => new sfValidatorPass(array('required' => false)),
      'destination_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'destination_insee'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'destination_nom'      => new sfValidatorPass(array('required' => false)),
      'type_covoiturage'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_unique'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'frequence'            => new sfValidatorPass(array('required' => false)),
      'heure_regulier'       => new sfValidatorPass(array('required' => false)),
      'nb_place'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'information'          => new sfValidatorPass(array('required' => false)),
      'cout'                 => new sfValidatorPass(array('required' => false)),
      'url_retour'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('offre_covoiturage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'OffreCovoiturage';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'etat'                 => 'Number',
      'date_creation'        => 'Date',
      'date_modification'    => 'Date',
      'id_partenaire'        => 'Number',
      'id_trajet_partenaire' => 'Number',
      'id_personne'          => 'Number',
      'depart_id'            => 'Number',
      'depart_insee'         => 'Number',
      'depart_nom'           => 'Text',
      'destination_id'       => 'Number',
      'destination_insee'    => 'Number',
      'destination_nom'      => 'Text',
      'type_covoiturage'     => 'Number',
      'date_unique'          => 'Date',
      'frequence'            => 'Text',
      'heure_regulier'       => 'Text',
      'nb_place'             => 'Number',
      'information'          => 'Text',
      'cout'                 => 'Text',
      'url_retour'           => 'Text',
    );
  }
}
