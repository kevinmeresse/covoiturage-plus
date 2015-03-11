<?php

/**
 * Widget filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWidgetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ip'            => new sfWidgetFormFilterInput(),
      'domaine'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'ip'            => new sfValidatorPass(array('required' => false)),
      'domaine'       => new sfValidatorPass(array('required' => false)),
      'date_creation' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('widget_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Widget';
  }

  public function getFields()
  {
    return array(
      'id_widget'     => 'Number',
      'ip'            => 'Text',
      'domaine'       => 'Text',
      'date_creation' => 'Date',
    );
  }
}
