<?php

/**
 * CpContactStatut filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpContactStatutFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_contact_statut_libelle' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cp_contact_statut_libelle' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cp_contact_statut_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpContactStatut';
  }

  public function getFields()
  {
    return array(
      'cp_contact_statut_id'      => 'Number',
      'cp_contact_statut_libelle' => 'Text',
    );
  }
}
