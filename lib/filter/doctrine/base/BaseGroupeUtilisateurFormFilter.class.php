<?php

/**
 * GroupeUtilisateur filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGroupeUtilisateurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'                   => new sfWidgetFormFilterInput(),
      'etat'                  => new sfWidgetFormFilterInput(),
      'date_creation'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nom'                   => new sfWidgetFormFilterInput(),
      'description'           => new sfWidgetFormFilterInput(),
      'mail'                  => new sfWidgetFormFilterInput(),
      'id_droit'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Droit'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cle'                   => new sfValidatorPass(array('required' => false)),
      'etat'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nom'                   => new sfValidatorPass(array('required' => false)),
      'description'           => new sfValidatorPass(array('required' => false)),
      'mail'                  => new sfValidatorPass(array('required' => false)),
      'id_droit'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Droit'), 'column' => 'id_droit')),
    ));

    $this->widgetSchema->setNameFormat('groupe_utilisateur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GroupeUtilisateur';
  }

  public function getFields()
  {
    return array(
      'id_groupe_utilisateur' => 'Number',
      'cle'                   => 'Text',
      'etat'                  => 'Number',
      'date_creation'         => 'Date',
      'nom'                   => 'Text',
      'description'           => 'Text',
      'mail'                  => 'Text',
      'id_droit'              => 'ForeignKey',
    );
  }
}
