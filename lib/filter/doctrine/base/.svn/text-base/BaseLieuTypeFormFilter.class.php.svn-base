<?php

/**
 * LieuType filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLieuTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle_lieu_type'      => new sfWidgetFormFilterInput(),
      'libelle_lieu_type_neer' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'version_light'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_site_client'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'evenement'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'libelle_lieu_type'      => new sfValidatorPass(array('required' => false)),
      'libelle_lieu_type_neer' => new sfValidatorPass(array('required' => false)),
      'version_light'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_site_client'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'evenement'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('lieu_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LieuType';
  }

  public function getFields()
  {
    return array(
      'id_lieu_type'           => 'Number',
      'libelle_lieu_type'      => 'Text',
      'libelle_lieu_type_neer' => 'Text',
      'version_light'          => 'Number',
      'id_site_client'         => 'ForeignKey',
      'evenement'              => 'Number',
    );
  }
}
