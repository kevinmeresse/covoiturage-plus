<?php

/**
 * TrajetMiseEnRelation filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrajetMiseEnRelationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'                        => new sfWidgetFormFilterInput(),
      'id_trajet'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => true)),
      'id_trajet_createur'         => new sfWidgetFormFilterInput(),
      'id_demandeur'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'date_creation'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_envoi'                 => new sfWidgetFormFilterInput(),
      'etat'                       => new sfWidgetFormFilterInput(),
      'message'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_site'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'nb_places_demandees'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bascule'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_modification'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cle'                        => new sfValidatorPass(array('required' => false)),
      'id_trajet'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Trajet'), 'column' => 'id_trajet')),
      'id_trajet_createur'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_demandeur'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
      'date_creation'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_envoi'                 => new sfValidatorPass(array('required' => false)),
      'etat'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'message'                    => new sfValidatorPass(array('required' => false)),
      'id_site'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'nb_places_demandees'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bascule'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_modification'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('trajet_mise_en_relation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetMiseEnRelation';
  }

  public function getFields()
  {
    return array(
      'id_trajet_mise_en_relation' => 'Number',
      'cle'                        => 'Text',
      'id_trajet'                  => 'ForeignKey',
      'id_trajet_createur'         => 'Number',
      'id_demandeur'               => 'ForeignKey',
      'date_creation'              => 'Date',
      'date_envoi'                 => 'Text',
      'etat'                       => 'Number',
      'message'                    => 'Text',
      'id_site'                    => 'ForeignKey',
      'nb_places_demandees'        => 'Number',
      'bascule'                    => 'Number',
      'date_modification'          => 'Date',
    );
  }
}
