<?php

/**
 * TrajetAlerte filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrajetAlerteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'cle'                    => new sfWidgetFormFilterInput(),
      'etat'                   => new sfWidgetFormFilterInput(),
      'id_utilisateur'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => true)),
      'mail_utilisateur'       => new sfWidgetFormFilterInput(),
      'tel_utilisateur'        => new sfWidgetFormFilterInput(),
      'id_type_trajet'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_depart'              => new sfWidgetFormFilterInput(),
      'id_depart2'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_depart_pays'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depart_type'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depart_autre_lieu'      => new sfWidgetFormFilterInput(),
      'id_destination'         => new sfWidgetFormFilterInput(),
      'id_destination2'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_destination_pays'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destination_type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destination_autre_lieu' => new sfWidgetFormFilterInput(),
      'date_creation'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'bascule'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_site'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'cle'                    => new sfValidatorPass(array('required' => false)),
      'etat'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_utilisateur'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Covoitureur'), 'column' => 'id_utilisateur')),
      'mail_utilisateur'       => new sfValidatorPass(array('required' => false)),
      'tel_utilisateur'        => new sfValidatorPass(array('required' => false)),
      'id_type_trajet'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_depart'              => new sfValidatorPass(array('required' => false)),
      'id_depart2'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_depart_pays'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'depart_type'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'depart_autre_lieu'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_destination'         => new sfValidatorPass(array('required' => false)),
      'id_destination2'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_destination_pays'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'destination_type'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'destination_autre_lieu' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'bascule'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('trajet_alerte_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrajetAlerte';
  }

  public function getFields()
  {
    return array(
      'id_trajet_alerte'       => 'Number',
      'id_site'                => 'ForeignKey',
      'cle'                    => 'Text',
      'etat'                   => 'Number',
      'id_utilisateur'         => 'ForeignKey',
      'mail_utilisateur'       => 'Text',
      'tel_utilisateur'        => 'Text',
      'id_type_trajet'         => 'Number',
      'id_depart'              => 'Text',
      'id_depart2'             => 'Number',
      'id_depart_pays'         => 'Number',
      'depart_type'            => 'Number',
      'depart_autre_lieu'      => 'Number',
      'id_destination'         => 'Text',
      'id_destination2'        => 'Number',
      'id_destination_pays'    => 'Number',
      'destination_type'       => 'Number',
      'destination_autre_lieu' => 'Number',
      'date_creation'          => 'Date',
      'bascule'                => 'Number',
    );
  }
}
