<?php

/**
 * WysiNewsletterRetour filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterRetourFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_membre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_membre'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'info'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_newsletter' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_membre'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mail_membre'   => new sfValidatorPass(array('required' => false)),
      'date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'info'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_retour_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterRetour';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_newsletter' => 'Number',
      'id_membre'     => 'Number',
      'mail_membre'   => 'Text',
      'date'          => 'Date',
      'info'          => 'Text',
    );
  }
}
