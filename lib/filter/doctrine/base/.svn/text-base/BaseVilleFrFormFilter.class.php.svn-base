<?php

/**
 * VilleFr filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVilleFrFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pays'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'), 'add_empty' => true)),
      'art_maj'         => new sfWidgetFormFilterInput(),
      'nom_ville'       => new sfWidgetFormFilterInput(),
      'art_min'         => new sfWidgetFormFilterInput(),
      'nom_ville2'      => new sfWidgetFormFilterInput(),
      'x'               => new sfWidgetFormFilterInput(),
      'y'               => new sfWidgetFormFilterInput(),
      'x_nom_decalage'  => new sfWidgetFormFilterInput(),
      'y_nom_decalage'  => new sfWidgetFormFilterInput(),
      'latitude'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_postal'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_insee'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipage'), 'add_empty' => true)),
      'departement'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'departement_num' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region_num'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chef_lieu'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cle'             => new sfWidgetFormFilterInput(),
      'ma_plage'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pavillonbleu'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_communaute'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CommunauteCommune'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_pays'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaysMonde'), 'column' => 'id_pays')),
      'art_maj'         => new sfValidatorPass(array('required' => false)),
      'nom_ville'       => new sfValidatorPass(array('required' => false)),
      'art_min'         => new sfValidatorPass(array('required' => false)),
      'nom_ville2'      => new sfValidatorPass(array('required' => false)),
      'x'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'x_nom_decalage'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y_nom_decalage'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'latitude'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'code_postal'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'code_insee'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Equipage'), 'column' => 'id_equipage')),
      'departement'     => new sfValidatorPass(array('required' => false)),
      'departement_num' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'region_num'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chef_lieu'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cle'             => new sfValidatorPass(array('required' => false)),
      'ma_plage'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pavillonbleu'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_communaute'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CommunauteCommune'), 'column' => 'id_communaute')),
    ));

    $this->widgetSchema->setNameFormat('ville_fr_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleFr';
  }

  public function getFields()
  {
    return array(
      'id_ville'        => 'Number',
      'id_pays'         => 'ForeignKey',
      'art_maj'         => 'Text',
      'nom_ville'       => 'Text',
      'art_min'         => 'Text',
      'nom_ville2'      => 'Text',
      'x'               => 'Number',
      'y'               => 'Number',
      'x_nom_decalage'  => 'Number',
      'y_nom_decalage'  => 'Number',
      'latitude'        => 'Number',
      'longitude'       => 'Number',
      'code_postal'     => 'Number',
      'code_insee'      => 'ForeignKey',
      'departement'     => 'Text',
      'departement_num' => 'Number',
      'region_num'      => 'Number',
      'chef_lieu'       => 'Number',
      'cle'             => 'Text',
      'ma_plage'        => 'Number',
      'pavillonbleu'    => 'Number',
      'id_communaute'   => 'ForeignKey',
    );
  }
}
