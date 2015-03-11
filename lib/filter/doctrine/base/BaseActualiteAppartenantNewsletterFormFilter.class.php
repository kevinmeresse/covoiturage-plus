<?php

/**
 * ActualiteAppartenantNewsletter filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseActualiteAppartenantNewsletterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter' => new sfWidgetFormFilterInput(),
      'id_actualite'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualite'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_newsletter' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_actualite'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContenuActualite'), 'column' => 'id_actualite')),
    ));

    $this->widgetSchema->setNameFormat('actualite_appartenant_newsletter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActualiteAppartenantNewsletter';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_newsletter' => 'Number',
      'id_actualite'  => 'ForeignKey',
    );
  }
}
