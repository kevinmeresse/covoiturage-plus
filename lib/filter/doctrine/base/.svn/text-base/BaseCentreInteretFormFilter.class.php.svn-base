<?php

/**
 * CentreInteret filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCentreInteretFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'               => new sfWidgetFormFilterInput(),
      'etat'              => new sfWidgetFormFilterInput(),
      'date_creation'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'libelle'           => new sfWidgetFormFilterInput(),
      'description'       => new sfWidgetFormFilterInput(),
      'libelle_all'       => new sfWidgetFormFilterInput(),
      'libelle_fra'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_ang'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_nee'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_bre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_eng'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cle'               => new sfValidatorPass(array('required' => false)),
      'etat'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'libelle'           => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'libelle_all'       => new sfValidatorPass(array('required' => false)),
      'libelle_fra'       => new sfValidatorPass(array('required' => false)),
      'libelle_ang'       => new sfValidatorPass(array('required' => false)),
      'libelle_nee'       => new sfValidatorPass(array('required' => false)),
      'libelle_bre'       => new sfValidatorPass(array('required' => false)),
      'libelle_eng'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('centre_interet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CentreInteret';
  }

  public function getFields()
  {
    return array(
      'id_centre_interet' => 'Number',
      'cle'               => 'Text',
      'etat'              => 'Number',
      'date_creation'     => 'Date',
      'libelle'           => 'Text',
      'description'       => 'Text',
      'libelle_all'       => 'Text',
      'libelle_fra'       => 'Text',
      'libelle_ang'       => 'Text',
      'libelle_nee'       => 'Text',
      'libelle_bre'       => 'Text',
      'libelle_eng'       => 'Text',
    );
  }
}
