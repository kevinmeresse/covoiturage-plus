<?php

/**
 * WysiNewsletterMembre filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterMembreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter_categorie' => new sfWidgetFormFilterInput(),
      'mail'                    => new sfWidgetFormFilterInput(),
      'etat'                    => new sfWidgetFormFilterInput(),
      'date_creation'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cle'                     => new sfWidgetFormFilterInput(),
      'langue'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prenom'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'societe'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_inscription'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_newsletter_categorie' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mail'                    => new sfValidatorPass(array('required' => false)),
      'etat'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'cle'                     => new sfValidatorPass(array('required' => false)),
      'langue'                  => new sfValidatorPass(array('required' => false)),
      'nom'                     => new sfValidatorPass(array('required' => false)),
      'prenom'                  => new sfValidatorPass(array('required' => false)),
      'societe'                 => new sfValidatorPass(array('required' => false)),
      'type_inscription'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_membre_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterMembre';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'id_newsletter_categorie' => 'Number',
      'mail'                    => 'Text',
      'etat'                    => 'Number',
      'date_creation'           => 'Date',
      'cle'                     => 'Text',
      'langue'                  => 'Text',
      'nom'                     => 'Text',
      'prenom'                  => 'Text',
      'societe'                 => 'Text',
      'type_inscription'        => 'Number',
    );
  }
}
