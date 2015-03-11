<?php

/**
 * ContenuActualite form base class.
 *
 * @method ContenuActualite getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContenuActualiteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actualite'         => new sfWidgetFormInputHidden(),
      'id_site'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                  => new sfWidgetFormInputText(),
      'etat'                 => new sfWidgetFormInputText(),
      'date_creation'        => new sfWidgetFormDateTime(),
      'date_modification'    => new sfWidgetFormDateTime(),
      'nombre_visualisation' => new sfWidgetFormInputText(),
      'fr_titre'             => new sfWidgetFormInputText(),
      'id_createur'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'fr_contenu_html'      => new sfWidgetFormTextarea(),
      'fr_contenu_html_col1' => new sfWidgetFormTextarea(),
      'fr_contenu_html_col2' => new sfWidgetFormTextarea(),
      'fr_resume_html'       => new sfWidgetFormTextarea(),
      'en_titre'             => new sfWidgetFormInputText(),
      'en_contenu_html'      => new sfWidgetFormTextarea(),
      'en_contenu_html_col1' => new sfWidgetFormTextarea(),
      'en_contenu_html_col2' => new sfWidgetFormTextarea(),
      'en_resume_html'       => new sfWidgetFormTextarea(),
      'date_publication'     => new sfWidgetFormDate(),
      'date_depublication'   => new sfWidgetFormDate(),
      'id_rubrique'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualiteRubrique'), 'add_empty' => true)),
      'envoi_via_newsletter' => new sfWidgetFormInputText(),
      'deja_envoyee'         => new sfWidgetFormInputText(),
      'position'             => new sfWidgetFormInputText(),
      'date_debut_evenement' => new sfWidgetFormDateTime(),
      'date_fin_evenement'   => new sfWidgetFormDateTime(),
      'photo_resume'         => new sfWidgetFormInputText(),
      'en_premiere_page'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_actualite'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_actualite')), 'empty_value' => $this->getObject()->get('id_actualite'), 'required' => false)),
      'id_site'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'cle'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                 => new sfValidatorInteger(array('required' => false)),
      'date_creation'        => new sfValidatorDateTime(array('required' => false)),
      'date_modification'    => new sfValidatorDateTime(array('required' => false)),
      'nombre_visualisation' => new sfValidatorInteger(array('required' => false)),
      'fr_titre'             => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'id_createur'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'fr_contenu_html'      => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col1' => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col2' => new sfValidatorString(array('required' => false)),
      'fr_resume_html'       => new sfValidatorString(array('required' => false)),
      'en_titre'             => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'en_contenu_html'      => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col1' => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col2' => new sfValidatorString(array('required' => false)),
      'en_resume_html'       => new sfValidatorString(array('required' => false)),
      'date_publication'     => new sfValidatorDate(array('required' => false)),
      'date_depublication'   => new sfValidatorDate(array('required' => false)),
      'id_rubrique'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualiteRubrique'), 'required' => false)),
      'envoi_via_newsletter' => new sfValidatorInteger(array('required' => false)),
      'deja_envoyee'         => new sfValidatorInteger(array('required' => false)),
      'position'             => new sfValidatorInteger(array('required' => false)),
      'date_debut_evenement' => new sfValidatorDateTime(array('required' => false)),
      'date_fin_evenement'   => new sfValidatorDateTime(array('required' => false)),
      'photo_resume'         => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'en_premiere_page'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contenu_actualite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuActualite';
  }

}
