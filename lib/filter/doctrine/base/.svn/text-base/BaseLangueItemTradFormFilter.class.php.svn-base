<?php

/**
 * LangueItemTrad filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLangueItemTradFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_page'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LanguePage'), 'add_empty' => true)),
      'trad'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_page'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('LanguePage'), 'column' => 'id_page')),
      'trad'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('langue_item_trad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LangueItemTrad';
  }

  public function getFields()
  {
    return array(
      'id_langue' => 'Number',
      'id_item'   => 'Number',
      'id_page'   => 'ForeignKey',
      'trad'      => 'Text',
    );
  }
}
