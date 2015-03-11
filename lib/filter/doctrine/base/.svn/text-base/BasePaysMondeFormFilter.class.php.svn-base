<?php

/**
 * PaysMonde filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePaysMondeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_pays' => new sfWidgetFormFilterInput(),
      'nom_pays'  => new sfWidgetFormFilterInput(),
      'nom_pays2' => new sfWidgetFormFilterInput(),
      'latitude'  => new sfWidgetFormFilterInput(),
      'longitude' => new sfWidgetFormFilterInput(),
      'etat'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code_pays' => new sfValidatorPass(array('required' => false)),
      'nom_pays'  => new sfValidatorPass(array('required' => false)),
      'nom_pays2' => new sfValidatorPass(array('required' => false)),
      'latitude'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'etat'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pays_monde_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaysMonde';
  }

  public function getFields()
  {
    return array(
      'id_pays'   => 'Number',
      'code_pays' => 'Text',
      'nom_pays'  => 'Text',
      'nom_pays2' => 'Text',
      'latitude'  => 'Number',
      'longitude' => 'Number',
      'etat'      => 'Number',
    );
  }
}
