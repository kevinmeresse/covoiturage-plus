<?php

/**
 * Droit filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDroitFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rubrique_ajouter'   => new sfWidgetFormFilterInput(),
      'rubrique_modifier'  => new sfWidgetFormFilterInput(),
      'rubrique_supprimer' => new sfWidgetFormFilterInput(),
      'rubrique_position'  => new sfWidgetFormFilterInput(),
      'page_ajouter'       => new sfWidgetFormFilterInput(),
      'page_modifier'      => new sfWidgetFormFilterInput(),
      'page_supprimer'     => new sfWidgetFormFilterInput(),
      'page_position'      => new sfWidgetFormFilterInput(),
      'actualite'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'rubrique_ajouter'   => new sfValidatorPass(array('required' => false)),
      'rubrique_modifier'  => new sfValidatorPass(array('required' => false)),
      'rubrique_supprimer' => new sfValidatorPass(array('required' => false)),
      'rubrique_position'  => new sfValidatorPass(array('required' => false)),
      'page_ajouter'       => new sfValidatorPass(array('required' => false)),
      'page_modifier'      => new sfValidatorPass(array('required' => false)),
      'page_supprimer'     => new sfValidatorPass(array('required' => false)),
      'page_position'      => new sfValidatorPass(array('required' => false)),
      'actualite'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('droit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Droit';
  }

  public function getFields()
  {
    return array(
      'id_droit'           => 'Number',
      'rubrique_ajouter'   => 'Text',
      'rubrique_modifier'  => 'Text',
      'rubrique_supprimer' => 'Text',
      'rubrique_position'  => 'Text',
      'page_ajouter'       => 'Text',
      'page_modifier'      => 'Text',
      'page_supprimer'     => 'Text',
      'page_position'      => 'Text',
      'actualite'          => 'Number',
    );
  }
}
