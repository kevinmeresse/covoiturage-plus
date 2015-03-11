<?php

/**
 * ParamColonne filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParamColonneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'libelle_dur' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'taille'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'affiche'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'libelle'     => new sfValidatorPass(array('required' => false)),
      'libelle_dur' => new sfValidatorPass(array('required' => false)),
      'ordre'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'taille'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'affiche'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('param_colonne_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParamColonne';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'libelle'     => 'Text',
      'libelle_dur' => 'Text',
      'ordre'       => 'Number',
      'taille'      => 'Number',
      'affiche'     => 'Number',
    );
  }
}
