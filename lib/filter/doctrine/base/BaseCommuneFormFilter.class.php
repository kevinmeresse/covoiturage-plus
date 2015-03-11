<?php

/**
 * Commune filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommuneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'art_maj'         => new sfWidgetFormFilterInput(),
      'nom_commune'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'art_min'         => new sfWidgetFormFilterInput(),
      'nom_commune2'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'x'               => new sfWidgetFormFilterInput(),
      'y'               => new sfWidgetFormFilterInput(),
      'x_nom_decalage'  => new sfWidgetFormFilterInput(),
      'y_nom_decalage'  => new sfWidgetFormFilterInput(),
      'latitude'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_postal'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_insee'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departement'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departement_num' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region_num'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chef_lieu'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'art_maj'         => new sfValidatorPass(array('required' => false)),
      'nom_commune'     => new sfValidatorPass(array('required' => false)),
      'art_min'         => new sfValidatorPass(array('required' => false)),
      'nom_commune2'    => new sfValidatorPass(array('required' => false)),
      'x'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'x_nom_decalage'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y_nom_decalage'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'latitude'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'code_postal'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code_insee'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'departement'     => new sfValidatorPass(array('required' => false)),
      'departement_num' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'region_num'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chef_lieu'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('commune_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Commune';
  }

  public function getFields()
  {
    return array(
      'id_commune'      => 'Number',
      'art_maj'         => 'Text',
      'nom_commune'     => 'Text',
      'art_min'         => 'Text',
      'nom_commune2'    => 'Text',
      'x'               => 'Number',
      'y'               => 'Number',
      'x_nom_decalage'  => 'Number',
      'y_nom_decalage'  => 'Number',
      'latitude'        => 'Number',
      'longitude'       => 'Number',
      'code_postal'     => 'Number',
      'code_insee'      => 'Number',
      'departement'     => 'Text',
      'departement_num' => 'Number',
      'region_num'      => 'Number',
      'chef_lieu'       => 'Number',
    );
  }
}
