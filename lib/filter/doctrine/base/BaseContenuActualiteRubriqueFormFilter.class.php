<?php

/**
 * ContenuActualiteRubrique filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContenuActualiteRubriqueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                   => new sfWidgetFormFilterInput(),
      'etat'                  => new sfWidgetFormFilterInput(),
      'date_creation'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_modification'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_visualisation'  => new sfWidgetFormFilterInput(),
      'fr_titre'              => new sfWidgetFormFilterInput(),
      'en_titre'              => new sfWidgetFormFilterInput(),
      'id_createur'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_site'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'cle'                   => new sfValidatorPass(array('required' => false)),
      'etat'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_visualisation'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fr_titre'              => new sfValidatorPass(array('required' => false)),
      'en_titre'              => new sfValidatorPass(array('required' => false)),
      'id_createur'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contenu_actualite_rubrique_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuActualiteRubrique';
  }

  public function getFields()
  {
    return array(
      'id_actualite_rubrique' => 'Number',
      'id_site'               => 'ForeignKey',
      'cle'                   => 'Text',
      'etat'                  => 'Number',
      'date_creation'         => 'Date',
      'date_modification'     => 'Date',
      'nombre_visualisation'  => 'Number',
      'fr_titre'              => 'Text',
      'en_titre'              => 'Text',
      'id_createur'           => 'ForeignKey',
    );
  }
}
