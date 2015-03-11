<?php

/**
 * TrajetTypeCovoiturage form base class.
 *
 * @method TrajetTypeCovoiturage getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrajetTypeCovoiturageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_type_covoiturage' => new sfWidgetFormInputHidden(),
      'etat'                => new sfWidgetFormInputText(),
      'libelle'             => new sfWidgetFormInputText(),
      'valeur'              => new sfWidgetFormInputText(),
      'id_site'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_type_covoiturage' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_type_covoiturage')), 'empty_value' => $this->getObject()->get('id_type_covoiturage'), 'required' => false)),
      'etat'                => new sfValidatorInteger(array('required' => false)),
      'libelle'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'valeur'              => new sfValidatorInteger(array('required' => false)),
      'id_site'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trajet_type_covoiturage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetTypeCovoiturage';
  }

}
