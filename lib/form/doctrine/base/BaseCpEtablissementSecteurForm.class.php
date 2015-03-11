<?php

/**
 * CpEtablissementSecteur form base class.
 *
 * @method CpEtablissementSecteur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCpEtablissementSecteurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cp_etablissement_secteur_id'          => new sfWidgetFormInputHidden(),
      'cp_etablissement_secteur_nom'         => new sfWidgetFormInputText(),
      'cp_etablissement_cp_etablissement_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'cp_etablissement_secteur_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cp_etablissement_secteur_id')), 'empty_value' => $this->getObject()->get('cp_etablissement_secteur_id'), 'required' => false)),
      'cp_etablissement_secteur_nom'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'cp_etablissement_cp_etablissement_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'))),
    ));

    $this->widgetSchema->setNameFormat('cp_etablissement_secteur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CpEtablissementSecteur';
  }

}
