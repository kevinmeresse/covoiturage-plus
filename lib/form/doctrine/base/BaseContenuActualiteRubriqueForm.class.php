<?php

/**
 * ContenuActualiteRubrique form base class.
 *
 * @method ContenuActualiteRubrique getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContenuActualiteRubriqueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actualite_rubrique' => new sfWidgetFormInputHidden(),
      'id_site'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                   => new sfWidgetFormInputText(),
      'etat'                  => new sfWidgetFormInputText(),
      'date_creation'         => new sfWidgetFormDateTime(),
      'date_modification'     => new sfWidgetFormDateTime(),
      'nombre_visualisation'  => new sfWidgetFormInputText(),
      'fr_titre'              => new sfWidgetFormInputText(),
      'en_titre'              => new sfWidgetFormInputText(),
      'id_createur'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_actualite_rubrique' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_actualite_rubrique')), 'empty_value' => $this->getObject()->get('id_actualite_rubrique'), 'required' => false)),
      'id_site'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'cle'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                  => new sfValidatorInteger(array('required' => false)),
      'date_creation'         => new sfValidatorDateTime(array('required' => false)),
      'date_modification'     => new sfValidatorDateTime(array('required' => false)),
      'nombre_visualisation'  => new sfValidatorInteger(array('required' => false)),
      'fr_titre'              => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'en_titre'              => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'id_createur'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contenu_actualite_rubrique[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuActualiteRubrique';
  }

}
