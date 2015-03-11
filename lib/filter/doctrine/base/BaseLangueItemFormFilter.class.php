<?php

/**
 * LangueItem filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLangueItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle_item' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'etat'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_page'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'libelle_item' => new sfValidatorPass(array('required' => false)),
      'etat'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_page'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LanguePage'), 'column' => 'id_page')),
    ));

    $this->widgetSchema->setNameFormat('langue_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LangueItem';
  }

  public function getFields()
  {
    return array(
      'id_item'      => 'Number',
      'libelle_item' => 'Text',
      'etat'         => 'Number',
      'id_page'      => 'ForeignKey',
    );
  }
}
