<?php

/**
 * CpTypeActionStatut filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpTypeActionStatutFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_type_action_statut_nom'     => new sfWidgetFormFilterInput(),
      'cp_type_action_statut_ordre'   => new sfWidgetFormFilterInput(),
      'cp_type_action_statut_couleur' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cp_type_action_statut_nom'     => new sfValidatorPass(array('required' => false)),
      'cp_type_action_statut_ordre'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cp_type_action_statut_couleur' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_type_action_statut_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpTypeActionStatut';
  }

  public function getFields()
  {
    return array(
      'cp_type_action_statut_id'      => 'Number',
      'cp_type_action_statut_nom'     => 'Text',
      'cp_type_action_statut_ordre'   => 'Number',
      'cp_type_action_statut_couleur' => 'Text',
    );
  }
}
