<?php

/**
 * Geom filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGeomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'g'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'g'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('geom_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Geom';
  }

  public function getFields()
  {
    return array(
      'id' => 'Number',
      'g'  => 'Text',
    );
  }
}
