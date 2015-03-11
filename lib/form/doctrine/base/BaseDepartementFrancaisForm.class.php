<?php

/**
 * DepartementFrancais form base class.
 *
 * @method DepartementFrancais getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDepartementFrancaisForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_departement'       => new sfWidgetFormInputHidden(),
      'id_region'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Region'), 'add_empty' => true)),
      'nom_departement'      => new sfWidgetFormInputText(),
      'site_web_departement' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_departement'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_departement')), 'empty_value' => $this->getObject()->get('id_departement'), 'required' => false)),
      'id_region'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Region'), 'required' => false)),
      'nom_departement'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'site_web_departement' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('departement_francais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DepartementFrancais';
  }

}
