<?php

/**
 * ContenuActualite filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContenuActualiteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                  => new sfWidgetFormFilterInput(),
      'etat'                 => new sfWidgetFormFilterInput(),
      'date_creation'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_modification'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_visualisation' => new sfWidgetFormFilterInput(),
      'fr_titre'             => new sfWidgetFormFilterInput(),
      'id_createur'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'fr_contenu_html'      => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col1' => new sfWidgetFormFilterInput(),
      'fr_contenu_html_col2' => new sfWidgetFormFilterInput(),
      'fr_resume_html'       => new sfWidgetFormFilterInput(),
      'en_titre'             => new sfWidgetFormFilterInput(),
      'en_contenu_html'      => new sfWidgetFormFilterInput(),
      'en_contenu_html_col1' => new sfWidgetFormFilterInput(),
      'en_contenu_html_col2' => new sfWidgetFormFilterInput(),
      'en_resume_html'       => new sfWidgetFormFilterInput(),
      'date_publication'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_depublication'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_rubrique'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuActualiteRubrique'), 'add_empty' => true)),
      'envoi_via_newsletter' => new sfWidgetFormFilterInput(),
      'deja_envoyee'         => new sfWidgetFormFilterInput(),
      'position'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_debut_evenement' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_fin_evenement'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'photo_resume'         => new sfWidgetFormFilterInput(),
      'en_premiere_page'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_site'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'cle'                  => new sfValidatorPass(array('required' => false)),
      'etat'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_visualisation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fr_titre'             => new sfValidatorPass(array('required' => false)),
      'id_createur'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'fr_contenu_html'      => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col1' => new sfValidatorPass(array('required' => false)),
      'fr_contenu_html_col2' => new sfValidatorPass(array('required' => false)),
      'fr_resume_html'       => new sfValidatorPass(array('required' => false)),
      'en_titre'             => new sfValidatorPass(array('required' => false)),
      'en_contenu_html'      => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col1' => new sfValidatorPass(array('required' => false)),
      'en_contenu_html_col2' => new sfValidatorPass(array('required' => false)),
      'en_resume_html'       => new sfValidatorPass(array('required' => false)),
      'date_publication'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_depublication'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_rubrique'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContenuActualiteRubrique'), 'column' => 'id_actualite_rubrique')),
      'envoi_via_newsletter' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deja_envoyee'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'position'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_debut_evenement' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_fin_evenement'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'photo_resume'         => new sfValidatorPass(array('required' => false)),
      'en_premiere_page'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('contenu_actualite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuActualite';
  }

  public function getFields()
  {
    return array(
      'id_actualite'         => 'Number',
      'id_site'              => 'ForeignKey',
      'cle'                  => 'Text',
      'etat'                 => 'Number',
      'date_creation'        => 'Date',
      'date_modification'    => 'Date',
      'nombre_visualisation' => 'Number',
      'fr_titre'             => 'Text',
      'id_createur'          => 'ForeignKey',
      'fr_contenu_html'      => 'Text',
      'fr_contenu_html_col1' => 'Text',
      'fr_contenu_html_col2' => 'Text',
      'fr_resume_html'       => 'Text',
      'en_titre'             => 'Text',
      'en_contenu_html'      => 'Text',
      'en_contenu_html_col1' => 'Text',
      'en_contenu_html_col2' => 'Text',
      'en_resume_html'       => 'Text',
      'date_publication'     => 'Date',
      'date_depublication'   => 'Date',
      'id_rubrique'          => 'ForeignKey',
      'envoi_via_newsletter' => 'Number',
      'deja_envoyee'         => 'Number',
      'position'             => 'Number',
      'date_debut_evenement' => 'Date',
      'date_fin_evenement'   => 'Date',
      'photo_resume'         => 'Text',
      'en_premiere_page'     => 'Number',
    );
  }
}
