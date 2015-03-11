<?php

/**
 * Contenu filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContenuFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'                            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                                => new sfWidgetFormFilterInput(),
      'etat'                               => new sfWidgetFormFilterInput(),
      'visible'                            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_modification'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fr_titre'                           => new sfWidgetFormFilterInput(),
      'nombre_visualisation'               => new sfWidgetFormFilterInput(),
      'id_createur'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'fr_meta_description'                => new sfWidgetFormFilterInput(),
      'fr_meta_keywords'                   => new sfWidgetFormFilterInput(),
      'fr_contenu_html'                    => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col1'               => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col2'               => new sfWidgetFormFilterInput(),
      'fr_contenu_html_intermediaire'      => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col1_intermediaire' => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col2_intermediaire' => new sfWidgetFormFilterInput(),
      'id_rubrique_parente'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'add_empty' => true)),
      'priorite'                           => new sfWidgetFormFilterInput(),
      'date_publication'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_depublication'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fr_citation'                        => new sfWidgetFormFilterInput(),
      'en_citation'                        => new sfWidgetFormFilterInput(),
      'bandeau_haut'                       => new sfWidgetFormFilterInput(),
      'colonne_droite'                     => new sfWidgetFormFilterInput(),
      'en_titre'                           => new sfWidgetFormFilterInput(),
      'en_meta_description'                => new sfWidgetFormFilterInput(),
      'en_meta_keywords'                   => new sfWidgetFormFilterInput(),
      'en_contenu_html'                    => new sfWidgetFormFilterInput(),
      'en_contenu_html_col1'               => new sfWidgetFormFilterInput(),
      'en_contenu_html_col2'               => new sfWidgetFormFilterInput(),
      'en_contenu_html_intermediaire'      => new sfWidgetFormFilterInput(),
      'en_contenu_html_col1_intermediaire' => new sfWidgetFormFilterInput(),
      'en_contenu_html_col2_intermediaire' => new sfWidgetFormFilterInput(),
      'fr_nom_fichier'                     => new sfWidgetFormFilterInput(),
      'en_nom_fichier'                     => new sfWidgetFormFilterInput(),
      'is_txt_rubrique'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lien_url'                           => new sfWidgetFormFilterInput(),
      'id_perm'                            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_site'                            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'cle'                                => new sfValidatorPass(array('required' => false)),
      'etat'                               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visible'                            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fr_titre'                           => new sfValidatorPass(array('required' => false)),
      'nombre_visualisation'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_createur'                        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'fr_meta_description'                => new sfValidatorPass(array('required' => false)),
      'fr_meta_keywords'                   => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html'                    => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col1'               => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col2'               => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_intermediaire'      => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col1_intermediaire' => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col2_intermediaire' => new sfValidatorPass(array('required' => false)),
      'id_rubrique_parente'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContenuRubrique'), 'column' => 'id_rubrique')),
      'priorite'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_publication'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_depublication'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fr_citation'                        => new sfValidatorPass(array('required' => false)),
      'en_citation'                        => new sfValidatorPass(array('required' => false)),
      'bandeau_haut'                       => new sfValidatorPass(array('required' => false)),
      'colonne_droite'                     => new sfValidatorPass(array('required' => false)),
      'en_titre'                           => new sfValidatorPass(array('required' => false)),
      'en_meta_description'                => new sfValidatorPass(array('required' => false)),
      'en_meta_keywords'                   => new sfValidatorPass(array('required' => false)),
      'en_contenu_html'                    => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col1'               => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col2'               => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_intermediaire'      => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col1_intermediaire' => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col2_intermediaire' => new sfValidatorPass(array('required' => false)),
      'fr_nom_fichier'                     => new sfValidatorPass(array('required' => false)),
      'en_nom_fichier'                     => new sfValidatorPass(array('required' => false)),
      'is_txt_rubrique'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lien_url'                           => new sfValidatorPass(array('required' => false)),
      'id_perm'                            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardPermission'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contenu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contenu';
  }

  public function getFields()
  {
    return array(
      'id_contenu'                         => 'Number',
      'id_site'                            => 'ForeignKey',
      'cle'                                => 'Text',
      'etat'                               => 'Number',
      'visible'                            => 'Number',
      'date_creation'                      => 'Date',
      'date_modification'                  => 'Date',
      'fr_titre'                           => 'Text',
      'nombre_visualisation'               => 'Number',
      'id_createur'                        => 'ForeignKey',
      'fr_meta_description'                => 'Text',
      'fr_meta_keywords'                   => 'Text',
      'fr_contenu_html'                    => 'Text',
      'fr_contenu_html_col1'               => 'Text',
      'fr_contenu_html_col2'               => 'Text',
      'fr_contenu_html_intermediaire'      => 'Text',
      'fr_contenu_html_col1_intermediaire' => 'Text',
      'fr_contenu_html_col2_intermediaire' => 'Text',
      'id_rubrique_parente'                => 'ForeignKey',
      'priorite'                           => 'Number',
      'date_publication'                   => 'Date',
      'date_depublication'                 => 'Date',
      'fr_citation'                        => 'Text',
      'en_citation'                        => 'Text',
      'bandeau_haut'                       => 'Text',
      'colonne_droite'                     => 'Text',
      'en_titre'                           => 'Text',
      'en_meta_description'                => 'Text',
      'en_meta_keywords'                   => 'Text',
      'en_contenu_html'                    => 'Text',
      'en_contenu_html_col1'               => 'Text',
      'en_contenu_html_col2'               => 'Text',
      'en_contenu_html_intermediaire'      => 'Text',
      'en_contenu_html_col1_intermediaire' => 'Text',
      'en_contenu_html_col2_intermediaire' => 'Text',
      'fr_nom_fichier'                     => 'Text',
      'en_nom_fichier'                     => 'Text',
      'is_txt_rubrique'                    => 'Number',
      'lien_url'                           => 'Text',
      'id_perm'                            => 'ForeignKey',
    );
  }
}
