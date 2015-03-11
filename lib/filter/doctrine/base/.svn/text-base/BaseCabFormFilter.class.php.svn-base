<?php

/**
 * Cab filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCabFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cab_driver' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cab_loc'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cab_driver' => new sfValidatorPass(array('required' => false)),
      'cab_loc'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cab_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cab';
  }

  public function getFields()
  {
    return array(
      'cab_id'     => 'Number',
      'cab_driver' => 'Text',
      'cab_loc'    => 'Text',
    );
  }
}
