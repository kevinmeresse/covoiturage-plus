<?php

/**
 * Langue filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLangueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle_langue' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'etat'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'libelle_langue' => new sfValidatorPass(array('required' => false)),
      'etat'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('langue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Langue';
  }

  public function getFields()
  {
    return array(
      'id_langue'      => 'Number',
      'libelle_langue' => 'Text',
      'etat'           => 'Number',
    );
  }
}
