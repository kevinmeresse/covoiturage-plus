<?php

/**
 * TrajetEtape filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrajetEtapeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trajet'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_lieu'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_lieu_2'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_lieu_pays'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'autre'           => new sfWidgetFormFilterInput(),
      'position'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_trajet'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_lieu'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_lieu_2'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_lieu_pays'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'autre'           => new sfValidatorPass(array('required' => false)),
      'position'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('trajet_etape_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetEtape';
  }

  public function getFields()
  {
    return array(
      'id_trajet_etape' => 'Number',
      'id_trajet'       => 'Number',
      'id_lieu'         => 'Number',
      'id_lieu_2'       => 'Number',
      'id_lieu_pays'    => 'Number',
      'type'            => 'Number',
      'autre'           => 'Text',
      'position'        => 'Number',
    );
  }
}
