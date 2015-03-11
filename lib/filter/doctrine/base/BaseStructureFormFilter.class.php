<?php

/**
 * Structure filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStructureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_commune'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'siret'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'forme'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voie'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code_postal'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ville'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telephone'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_commune'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'siret'        => new sfValidatorPass(array('required' => false)),
      'forme'        => new sfValidatorPass(array('required' => false)),
      'nom'          => new sfValidatorPass(array('required' => false)),
      'voie'         => new sfValidatorPass(array('required' => false)),
      'code_postal'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ville'        => new sfValidatorPass(array('required' => false)),
      'telephone'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('structure_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Structure';
  }

  public function getFields()
  {
    return array(
      'id_structure' => 'Number',
      'id_commune'   => 'Number',
      'siret'        => 'Text',
      'forme'        => 'Text',
      'nom'          => 'Text',
      'voie'         => 'Text',
      'code_postal'  => 'Number',
      'ville'        => 'Text',
      'telephone'    => 'Text',
    );
  }
}
