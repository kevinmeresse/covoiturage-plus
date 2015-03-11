<?php

/**
 * Droit form base class.
 *
 * @method Droit getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDroitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_droit'           => new sfWidgetFormInputHidden(),
      'rubrique_ajouter'   => new sfWidgetFormInputText(),
      'rubrique_modifier'  => new sfWidgetFormInputText(),
      'rubrique_supprimer' => new sfWidgetFormInputText(),
      'rubrique_position'  => new sfWidgetFormInputText(),
      'page_ajouter'       => new sfWidgetFormInputText(),
      'page_modifier'      => new sfWidgetFormInputText(),
      'page_supprimer'     => new sfWidgetFormInputText(),
      'page_position'      => new sfWidgetFormInputText(),
      'actualite'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_droit'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_droit')), 'empty_value' => $this->getObject()->get('id_droit'), 'required' => false)),
      'rubrique_ajouter'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'rubrique_modifier'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'rubrique_supprimer' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'rubrique_position'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'page_ajouter'       => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'page_modifier'      => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'page_supprimer'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'page_position'      => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'actualite'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('droit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Droit';
  }

}
