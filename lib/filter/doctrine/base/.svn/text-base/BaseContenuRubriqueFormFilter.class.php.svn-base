<?php

/**
 * ContenuRubrique filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContenuRubriqueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'           => new sfWidgetFormFilterInput(),
      'etat'              => new sfWidgetFormFilterInput(),
      'nombre_affichage'  => new sfWidgetFormFilterInput(),
      'id_rubrique_mere'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ContenuRubrique'), 'add_empty' => true)),
      'fr_titre'          => new sfWidgetFormFilterInput(),
      'nom_repertoire_fr' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'en_titre'          => new sfWidgetFormFilterInput(),
      'id_administrateur' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'priorite'          => new sfWidgetFormFilterInput(),
      'date_creation'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_modification' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'lien_url'          => new sfWidgetFormFilterInput(),
      'id_perm'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardPermission'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_site'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'etat'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_affichage'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_rubrique_mere'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ContenuRubrique'), 'column' => 'id_rubrique')),
      'fr_titre'          => new sfValidatorPass(array('required' => false)),
      'nom_repertoire_fr' => new sfValidatorPass(array('required' => false)),
      'en_titre'          => new sfValidatorPass(array('required' => false)),
      'id_administrateur' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'priorite'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_modification' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lien_url'          => new sfValidatorPass(array('required' => false)),
      'id_perm'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardPermission'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contenu_rubrique_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContenuRubrique';
  }

  public function getFields()
  {
    return array(
      'id_rubrique'       => 'Number',
      'id_site'           => 'Number',
      'etat'              => 'Number',
      'nombre_affichage'  => 'Number',
      'id_rubrique_mere'  => 'ForeignKey',
      'fr_titre'          => 'Text',
      'nom_repertoire_fr' => 'Text',
      'en_titre'          => 'Text',
      'id_administrateur' => 'ForeignKey',
      'priorite'          => 'Number',
      'date_creation'     => 'Date',
      'date_modification' => 'Date',
      'lien_url'          => 'Text',
      'id_perm'           => 'ForeignKey',
    );
  }
}
