<?php

/**
 * VehiculeCategorie filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVehiculeCategorieFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'                    => new sfWidgetFormFilterInput(),
      'etat'                   => new sfWidgetFormFilterInput(),
      'date_creation'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nom_vehicule_categorie' => new sfWidgetFormFilterInput(),
      'description'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cle'                    => new sfValidatorPass(array('required' => false)),
      'etat'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nom_vehicule_categorie' => new sfValidatorPass(array('required' => false)),
      'description'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicule_categorie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculeCategorie';
  }

  public function getFields()
  {
    return array(
      'id_vehicule_categorie'  => 'Number',
      'cle'                    => 'Text',
      'etat'                   => 'Number',
      'date_creation'          => 'Date',
      'nom_vehicule_categorie' => 'Text',
      'description'            => 'Text',
    );
  }
}
