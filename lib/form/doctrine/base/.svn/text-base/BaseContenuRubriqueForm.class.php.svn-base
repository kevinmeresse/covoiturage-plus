<?php

/**
 * ContenuRubrique form base class.
 *
 * @method ContenuRubrique getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContenuRubriqueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_rubrique'       => new sfWidgetFormInputHidden(),
      'id_site'           => new sfWidgetFormInputText(),
      'etat'              => new sfWidgetFormInputText(),
      'nombre_affichage'  => new sfWidgetFormInputText(),
      'id_rubrique_mere'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'add_empty' => true)),
      'fr_titre'          => new sfWidgetFormInputText(),
      'nom_repertoire_fr' => new sfWidgetFormInputText(),
      'en_titre'          => new sfWidgetFormInputText(),
      'id_administrateur' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'priorite'          => new sfWidgetFormInputText(),
      'date_creation'     => new sfWidgetFormDateTime(),
      'date_modification' => new sfWidgetFormDateTime(),
      'lien_url'          => new sfWidgetFormInputText(),
      'id_perm'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_rubrique'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_rubrique')), 'empty_value' => $this->getObject()->get('id_rubrique'), 'required' => false)),
      'id_site'           => new sfValidatorInteger(array('required' => false)),
      'etat'              => new sfValidatorInteger(array('required' => false)),
      'nombre_affichage'  => new sfValidatorInteger(array('required' => false)),
      'id_rubrique_mere'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'required' => false)),
      'fr_titre'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'nom_repertoire_fr' => new sfValidatorString(array('max_length' => 255)),
      'en_titre'          => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'id_administrateur' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'priorite'          => new sfValidatorInteger(array('required' => false)),
      'date_creation'     => new sfValidatorDateTime(array('required' => false)),
      'date_modification' => new sfValidatorDateTime(array('required' => false)),
      'lien_url'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_perm'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contenu_rubrique[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuRubrique';
  }

}
