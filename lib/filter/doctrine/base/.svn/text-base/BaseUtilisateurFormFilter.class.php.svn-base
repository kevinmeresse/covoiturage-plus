<?php

/**
 * Utilisateur filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUtilisateurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cle'                     => new sfWidgetFormFilterInput(),
      'etat'                    => new sfWidgetFormFilterInput(),
      'date_creation'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'identifiant'             => new sfWidgetFormFilterInput(),
      'pass'                    => new sfWidgetFormFilterInput(),
      'nom'                     => new sfWidgetFormFilterInput(),
      'prenom'                  => new sfWidgetFormFilterInput(),
      'mail'                    => new sfWidgetFormFilterInput(),
      'droit'                   => new sfWidgetFormFilterInput(),
      'fonction'                => new sfWidgetFormFilterInput(),
      'date_derniere_connexion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_connexion'        => new sfWidgetFormFilterInput(),
      'id_groupe_utilisateur'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cle'                     => new sfValidatorPass(array('required' => false)),
      'etat'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'identifiant'             => new sfValidatorPass(array('required' => false)),
      'pass'                    => new sfValidatorPass(array('required' => false)),
      'nom'                     => new sfValidatorPass(array('required' => false)),
      'prenom'                  => new sfValidatorPass(array('required' => false)),
      'mail'                    => new sfValidatorPass(array('required' => false)),
      'droit'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fonction'                => new sfValidatorPass(array('required' => false)),
      'date_derniere_connexion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_connexion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_groupe_utilisateur'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('utilisateur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Utilisateur';
  }

  public function getFields()
  {
    return array(
      'id_utilisateur'          => 'Number',
      'cle'                     => 'Text',
      'etat'                    => 'Number',
      'date_creation'           => 'Date',
      'identifiant'             => 'Text',
      'pass'                    => 'Text',
      'nom'                     => 'Text',
      'prenom'                  => 'Text',
      'mail'                    => 'Text',
      'droit'                   => 'Number',
      'fonction'                => 'Text',
      'date_derniere_connexion' => 'Date',
      'nombre_connexion'        => 'Number',
      'id_groupe_utilisateur'   => 'Number',
    );
  }
}
