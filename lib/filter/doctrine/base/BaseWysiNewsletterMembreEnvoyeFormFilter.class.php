<?php

/**
 * WysiNewsletterMembreEnvoye filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterMembreEnvoyeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_newsletter' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mail'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_membre_envoye_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterMembreEnvoye';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_newsletter' => 'Number',
      'mail'          => 'Text',
    );
  }
}
