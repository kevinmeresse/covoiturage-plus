<?php

/**
 * WysiNewsletter filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etat'                   => new sfWidgetFormFilterInput(),
      'fr_titre'               => new sfWidgetFormFilterInput(),
      'fr_contenu'             => new sfWidgetFormFilterInput(),
      'date_creation'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_modification'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_expedition'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nombre_personne_attire' => new sfWidgetFormFilterInput(),
      'id_categorie'           => new sfWidgetFormFilterInput(),
      'id_personne'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'etat'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fr_titre'               => new sfValidatorPass(array('required' => false)),
      'fr_contenu'             => new sfValidatorPass(array('required' => false)),
      'date_creation'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_expedition'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_personne_attire' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_categorie'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_personne'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletter';
  }

  public function getFields()
  {
    return array(
      'id_newsletter'          => 'Number',
      'etat'                   => 'Number',
      'fr_titre'               => 'Text',
      'fr_contenu'             => 'Text',
      'date_creation'          => 'Date',
      'date_modification'      => 'Date',
      'date_expedition'        => 'Date',
      'nombre_personne_attire' => 'Number',
      'id_categorie'           => 'Number',
      'id_personne'            => 'Number',
    );
  }
}
