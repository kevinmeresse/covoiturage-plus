<?php

/**
 * CentreInteret form base class.
 *
 * @method CentreInteret getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCentreInteretForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_centre_interet' => new sfWidgetFormInputHidden(),
      'cle'               => new sfWidgetFormInputText(),
      'etat'              => new sfWidgetFormInputText(),
      'date_creation'     => new sfWidgetFormDateTime(),
      'libelle'           => new sfWidgetFormInputText(),
      'description'       => new sfWidgetFormInputText(),
      'libelle_all'       => new sfWidgetFormInputText(),
      'libelle_fra'       => new sfWidgetFormInputText(),
      'libelle_ang'       => new sfWidgetFormInputText(),
      'libelle_nee'       => new sfWidgetFormInputText(),
      'libelle_bre'       => new sfWidgetFormInputText(),
      'libelle_eng'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_centre_interet' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_centre_interet')), 'empty_value' => $this->getObject()->get('id_centre_interet'), 'required' => false)),
      'cle'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'              => new sfValidatorInteger(array('required' => false)),
      'date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'libelle'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'libelle_all'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'libelle_fra'       => new sfValidatorString(array('max_length' => 255)),
      'libelle_ang'       => new sfValidatorString(array('max_length' => 255)),
      'libelle_nee'       => new sfValidatorString(array('max_length' => 255)),
      'libelle_bre'       => new sfValidatorString(array('max_length' => 255)),
      'libelle_eng'       => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('centre_interet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CentreInteret';
  }

}
