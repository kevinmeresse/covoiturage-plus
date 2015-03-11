<?php

/**
 * CommunauteCommune filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommunauteCommuneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_ville_ref'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VilleFr'), 'add_empty' => true)),
      'informations'  => new sfWidgetFormFilterInput(),
      'contact'       => new sfWidgetFormFilterInput(),
      'action'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'           => new sfValidatorPass(array('required' => false)),
      'id_ville_ref'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VilleFr'), 'column' => 'id_ville')),
      'informations'  => new sfValidatorPass(array('required' => false)),
      'contact'       => new sfValidatorPass(array('required' => false)),
      'action'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('communaute_commune_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CommunauteCommune';
  }

  public function getFields()
  {
    return array(
      'id_communaute' => 'Number',
      'nom'           => 'Text',
      'id_ville_ref'  => 'ForeignKey',
      'informations'  => 'Text',
      'contact'       => 'Text',
      'action'        => 'Text',
    );
  }
}
