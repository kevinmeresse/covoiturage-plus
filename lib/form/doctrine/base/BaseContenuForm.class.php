<?php

/**
 * Contenu form base class.
 *
 * @method Contenu getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContenuForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_contenu'                         => new sfWidgetFormInputHidden(),
      'id_site'                            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                                => new sfWidgetFormInputText(),
      'etat'                               => new sfWidgetFormInputText(),
      'visible'                            => new sfWidgetFormInputText(),
      'date_creation'                      => new sfWidgetFormDateTime(),
      'date_modification'                  => new sfWidgetFormDateTime(),
      'fr_titre'                           => new sfWidgetFormInputText(),
      'nombre_visualisation'               => new sfWidgetFormInputText(),
      'id_createur'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'fr_meta_description'                => new sfWidgetFormInputText(),
      'fr_meta_keywords'                   => new sfWidgetFormTextarea(),
      'fr_contenu_html'                    => new sfWidgetFormTextarea(),
      'fr_contenu_html_col1'               => new sfWidgetFormTextarea(),
      'fr_contenu_html_col2'               => new sfWidgetFormTextarea(),
      'fr_contenu_html_intermediaire'      => new sfWidgetFormTextarea(),
      'fr_contenu_html_col1_intermediaire' => new sfWidgetFormTextarea(),
      'fr_contenu_html_col2_intermediaire' => new sfWidgetFormTextarea(),
      'id_rubrique_parente'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'add_empty' => true)),
      'priorite'                           => new sfWidgetFormInputText(),
      'date_publication'                   => new sfWidgetFormDate(),
      'date_depublication'                 => new sfWidgetFormDate(),
      'fr_citation'                        => new sfWidgetFormTextarea(),
      'en_citation'                        => new sfWidgetFormTextarea(),
      'bandeau_haut'                       => new sfWidgetFormInputText(),
      'colonne_droite'                     => new sfWidgetFormTextarea(),
      'en_titre'                           => new sfWidgetFormInputText(),
      'en_meta_description'                => new sfWidgetFormInputText(),
      'en_meta_keywords'                   => new sfWidgetFormTextarea(),
      'en_contenu_html'                    => new sfWidgetFormTextarea(),
      'en_contenu_html_col1'               => new sfWidgetFormTextarea(),
      'en_contenu_html_col2'               => new sfWidgetFormTextarea(),
      'en_contenu_html_intermediaire'      => new sfWidgetFormTextarea(),
      'en_contenu_html_col1_intermediaire' => new sfWidgetFormTextarea(),
      'en_contenu_html_col2_intermediaire' => new sfWidgetFormTextarea(),
      'fr_nom_fichier'                     => new sfWidgetFormInputText(),
      'en_nom_fichier'                     => new sfWidgetFormInputText(),
      'is_txt_rubrique'                    => new sfWidgetFormInputText(),
      'lien_url'                           => new sfWidgetFormInputText(),
      'id_perm'                            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_contenu'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_contenu')), 'empty_value' => $this->getObject()->get('id_contenu'), 'required' => false)),
      'id_site'                            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'cle'                                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                               => new sfValidatorInteger(array('required' => false)),
      'visible'                            => new sfValidatorInteger(array('required' => false)),
      'date_creation'                      => new sfValidatorDateTime(array('required' => false)),
      'date_modification'                  => new sfValidatorDateTime(array('required' => false)),
      'fr_titre'                           => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'nombre_visualisation'               => new sfValidatorInteger(array('required' => false)),
      'id_createur'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'fr_meta_description'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fr_meta_keywords'                   => new sfValidatorString(array('required' => false)),
      'fr_contenu_html'                    => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col1'               => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col2'               => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_intermediaire'      => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col1_intermediaire' => new sfValidatorString(array('required' => false)),
      'fr_contenu_html_col2_intermediaire' => new sfValidatorString(array('required' => false)),
      'id_rubrique_parente'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'required' => false)),
      'priorite'                           => new sfValidatorInteger(array('required' => false)),
      'date_publication'                   => new sfValidatorDate(array('required' => false)),
      'date_depublication'                 => new sfValidatorDate(array('required' => false)),
      'fr_citation'                        => new sfValidatorString(array('required' => false)),
      'en_citation'                        => new sfValidatorString(array('required' => false)),
      'bandeau_haut'                       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'colonne_droite'                     => new sfValidatorString(array('required' => false)),
      'en_titre'                           => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'en_meta_description'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'en_meta_keywords'                   => new sfValidatorString(array('required' => false)),
      'en_contenu_html'                    => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col1'               => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col2'               => new sfValidatorString(array('required' => false)),
      'en_contenu_html_intermediaire'      => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col1_intermediaire' => new sfValidatorString(array('required' => false)),
      'en_contenu_html_col2_intermediaire' => new sfValidatorString(array('required' => false)),
      'fr_nom_fichier'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'en_nom_fichier'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_txt_rubrique'                    => new sfValidatorInteger(array('required' => false)),
      'lien_url'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_perm'                            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contenu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contenu';
  }

}
