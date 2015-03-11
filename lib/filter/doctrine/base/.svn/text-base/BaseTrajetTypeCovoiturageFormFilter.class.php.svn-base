<?php

/**
 * TrajetTypeCovoiturage filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrajetTypeCovoiturageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etat'                => new sfWidgetFormFilterInput(),
      'libelle'             => new sfWidgetFormFilterInput(),
      'valeur'              => new sfWidgetFormFilterInput(),
      'id_site'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'etat'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'libelle'             => new sfValidatorPass(array('required' => false)),
      'valeur'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_site'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('trajet_type_covoiturage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetTypeCovoiturage';
  }

  public function getFields()
  {
    return array(
      'id_type_covoiturage' => 'Number',
      'etat'                => 'Number',
      'libelle'             => 'Text',
      'valeur'              => 'Number',
      'id_site'             => 'Number',
    );
  }
}
