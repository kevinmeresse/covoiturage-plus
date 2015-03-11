<?php

/**
 * CpEtablissementSecteur filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementSecteurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_secteur_nom'         => new sfWidgetFormFilterInput(),
      'cp_etablissement_cp_etablissement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cp_etablissement_secteur_nom'         => new sfValidatorPass(array('required' => false)),
      'cp_etablissement_cp_etablissement_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CpEtablissement'), 'column' => 'cp_etablissement_id')),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement_secteur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissementSecteur';
  }

  public function getFields()
  {
    return array(
      'cp_etablissement_secteur_id'          => 'Number',
      'cp_etablissement_secteur_nom'         => 'Text',
      'cp_etablissement_cp_etablissement_id' => 'ForeignKey',
    );
  }
}
