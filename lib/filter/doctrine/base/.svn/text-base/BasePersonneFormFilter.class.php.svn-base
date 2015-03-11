<?php

/**
 * Personne filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePersonneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'                     => new sfWidgetFormFilterInput(),
      'etat'                    => new sfWidgetFormFilterInput(),
      'date_creation'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'identifiant'             => new sfWidgetFormFilterInput(),
      'mot_de_passe'            => new sfWidgetFormFilterInput(),
      'sexe'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'civilite'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'                     => new sfWidgetFormFilterInput(),
      'prenom'                  => new sfWidgetFormFilterInput(),
      'adresse'                 => new sfWidgetFormFilterInput(),
      'code_postal'             => new sfWidgetFormFilterInput(),
      'ville'                   => new sfWidgetFormFilterInput(),
      'mail'                    => new sfWidgetFormFilterInput(),
      'telephone_fixe'          => new sfWidgetFormFilterInput(),
      'telephone_mobile'        => new sfWidgetFormFilterInput(),
      'societe'                 => new sfWidgetFormFilterInput(),
      'tranche_age'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_naissance'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'question'                => new sfWidgetFormFilterInput(),
      'reponse'                 => new sfWidgetFormFilterInput(),
      'date_derniere_connexion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_connexion'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cle'                     => new sfValidatorPass(array('required' => false)),
      'etat'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'identifiant'             => new sfValidatorPass(array('required' => false)),
      'mot_de_passe'            => new sfValidatorPass(array('required' => false)),
      'sexe'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'civilite'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nom'                     => new sfValidatorPass(array('required' => false)),
      'prenom'                  => new sfValidatorPass(array('required' => false)),
      'adresse'                 => new sfValidatorPass(array('required' => false)),
      'code_postal'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ville'                   => new sfValidatorPass(array('required' => false)),
      'mail'                    => new sfValidatorPass(array('required' => false)),
      'telephone_fixe'          => new sfValidatorPass(array('required' => false)),
      'telephone_mobile'        => new sfValidatorPass(array('required' => false)),
      'societe'                 => new sfValidatorPass(array('required' => false)),
      'tranche_age'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_naissance'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'question'                => new sfValidatorPass(array('required' => false)),
      'reponse'                 => new sfValidatorPass(array('required' => false)),
      'date_derniere_connexion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_connexion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('personne_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personne';
  }

  public function getFields()
  {
    return array(
      'id_personne'             => 'Number',
      'cle'                     => 'Text',
      'etat'                    => 'Number',
      'date_creation'           => 'Date',
      'identifiant'             => 'Text',
      'mot_de_passe'            => 'Text',
      'sexe'                    => 'Number',
      'civilite'                => 'Number',
      'nom'                     => 'Text',
      'prenom'                  => 'Text',
      'adresse'                 => 'Text',
      'code_postal'             => 'Number',
      'ville'                   => 'Text',
      'mail'                    => 'Text',
      'telephone_fixe'          => 'Text',
      'telephone_mobile'        => 'Text',
      'societe'                 => 'Text',
      'tranche_age'             => 'Number',
      'date_naissance'          => 'Date',
      'question'                => 'Text',
      'reponse'                 => 'Text',
      'date_derniere_connexion' => 'Date',
      'nombre_connexion'        => 'Number',
    );
  }
}
