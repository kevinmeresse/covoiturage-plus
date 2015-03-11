<?php

/**
 * LivreOr filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLivreOrFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prenom'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_site_client' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'etat'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cle'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'            => new sfValidatorPass(array('required' => false)),
      'prenom'         => new sfValidatorPass(array('required' => false)),
      'message'        => new sfValidatorPass(array('required' => false)),
      'mail'           => new sfValidatorPass(array('required' => false)),
      'date_creation'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_site_client' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'etat'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cle'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('livre_or_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LivreOr';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nom'            => 'Text',
      'prenom'         => 'Text',
      'message'        => 'Text',
      'mail'           => 'Text',
      'date_creation'  => 'Date',
      'id_site_client' => 'ForeignKey',
      'etat'           => 'Number',
      'cle'            => 'Text',
    );
  }
}
