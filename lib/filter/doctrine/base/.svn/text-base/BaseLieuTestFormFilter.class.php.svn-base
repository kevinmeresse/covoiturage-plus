<?php

/**
 * LieuTest filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLieuTestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'bascule_insee'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_site'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_site_site'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'id_pour_partenaire' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_lieu'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_lieu_type'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LieuType'), 'add_empty' => true)),
      'code_insee'         => new sfWidgetFormFilterInput(),
      'date_creation'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_modification'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_publication'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_depublication' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'visible_dans_liste' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'bascule_insee'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_site'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_site_site'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'id_pour_partenaire' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'libelle_lieu'       => new sfValidatorPass(array('required' => false)),
      'id_lieu_type'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LieuType'), 'column' => 'id_lieu_type')),
      'code_insee'         => new sfValidatorPass(array('required' => false)),
      'date_creation'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_publication'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_depublication' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'visible_dans_liste' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'latitude'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('lieu_test_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LieuTest';
  }

  public function getFields()
  {
    return array(
      'id_lieu'            => 'Number',
      'bascule_insee'      => 'Number',
      'id_site'            => 'Number',
      'id_site_site'       => 'ForeignKey',
      'id_pour_partenaire' => 'Number',
      'libelle_lieu'       => 'Text',
      'id_lieu_type'       => 'ForeignKey',
      'code_insee'         => 'Text',
      'date_creation'      => 'Date',
      'date_modification'  => 'Date',
      'date_publication'   => 'Date',
      'date_depublication' => 'Date',
      'visible_dans_liste' => 'Number',
      'latitude'           => 'Number',
      'longitude'          => 'Number',
    );
  }
}
