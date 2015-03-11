<?php

/**
 * Partenaire filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePartenaireFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_flux' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'etat'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'      => new sfValidatorPass(array('required' => false)),
      'url'      => new sfValidatorPass(array('required' => false)),
      'url_flux' => new sfValidatorPass(array('required' => false)),
      'etat'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('partenaire_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partenaire';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nom'      => 'Text',
      'url'      => 'Text',
      'url_flux' => 'Text',
      'etat'     => 'Number',
    );
  }
}
