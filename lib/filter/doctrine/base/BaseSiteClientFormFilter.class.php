<?php

/**
 * SiteClient filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSiteClientFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site_parent'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'id_filiale'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cle'                      => new sfWidgetFormFilterInput(),
      'etat'                     => new sfWidgetFormFilterInput(),
      'visible'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_creation'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_publication'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_depublication'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'societe'                  => new sfWidgetFormFilterInput(),
      'url_application'          => new sfWidgetFormFilterInput(),
      'dossier_application'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'identifiant'              => new sfWidgetFormFilterInput(),
      'mot_de_passe'             => new sfWidgetFormFilterInput(),
      'identifiant2'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mot_de_passe2'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail_referent2'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'confidentiel'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'validation_compte'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adresse'                  => new sfWidgetFormFilterInput(),
      'code_postal'              => new sfWidgetFormFilterInput(),
      'id_ville'                 => new sfWidgetFormFilterInput(),
      'ville'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logo'                     => new sfWidgetFormFilterInput(),
      'bandeau'                  => new sfWidgetFormFilterInput(),
      'html_header'              => new sfWidgetFormFilterInput(),
      'html_haut'                => new sfWidgetFormFilterInput(),
      'html_bas'                 => new sfWidgetFormFilterInput(),
      'html_gauche'              => new sfWidgetFormFilterInput(),
      'html_droit'               => new sfWidgetFormFilterInput(),
      'couleur1'                 => new sfWidgetFormFilterInput(),
      'couleur2'                 => new sfWidgetFormFilterInput(),
      'couleur3'                 => new sfWidgetFormFilterInput(),
      'carte_position_latitude'  => new sfWidgetFormFilterInput(),
      'carte_position_longitude' => new sfWidgetFormFilterInput(),
      'carte_position_hauteur'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cle_googlemaps'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom_referent'             => new sfWidgetFormFilterInput(),
      'prenom_referent'          => new sfWidgetFormFilterInput(),
      'mail_referent'            => new sfWidgetFormFilterInput(),
      'telephone'                => new sfWidgetFormFilterInput(),
      'fax'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date_derniere_connexion'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre_connexion'         => new sfWidgetFormFilterInput(),
      'version'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'admin_v2'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_site_parent'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SiteClient'), 'column' => 'id_site_client')),
      'id_filiale'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cle'                      => new sfValidatorPass(array('required' => false)),
      'etat'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visible'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_creation'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_publication'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_depublication'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'societe'                  => new sfValidatorPass(array('required' => false)),
      'url_application'          => new sfValidatorPass(array('required' => false)),
      'dossier_application'      => new sfValidatorPass(array('required' => false)),
      'identifiant'              => new sfValidatorPass(array('required' => false)),
      'mot_de_passe'             => new sfValidatorPass(array('required' => false)),
      'identifiant2'             => new sfValidatorPass(array('required' => false)),
      'mot_de_passe2'            => new sfValidatorPass(array('required' => false)),
      'mail_referent2'           => new sfValidatorPass(array('required' => false)),
      'confidentiel'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'validation_compte'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adresse'                  => new sfValidatorPass(array('required' => false)),
      'code_postal'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_ville'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ville'                    => new sfValidatorPass(array('required' => false)),
      'logo'                     => new sfValidatorPass(array('required' => false)),
      'bandeau'                  => new sfValidatorPass(array('required' => false)),
      'html_header'              => new sfValidatorPass(array('required' => false)),
      'html_haut'                => new sfValidatorPass(array('required' => false)),
      'html_bas'                 => new sfValidatorPass(array('required' => false)),
      'html_gauche'              => new sfValidatorPass(array('required' => false)),
      'html_droit'               => new sfValidatorPass(array('required' => false)),
      'couleur1'                 => new sfValidatorPass(array('required' => false)),
      'couleur2'                 => new sfValidatorPass(array('required' => false)),
      'couleur3'                 => new sfValidatorPass(array('required' => false)),
      'carte_position_latitude'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'carte_position_longitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'carte_position_hauteur'   => new sfValidatorPass(array('required' => false)),
      'cle_googlemaps'           => new sfValidatorPass(array('required' => false)),
      'nom_referent'             => new sfValidatorPass(array('required' => false)),
      'prenom_referent'          => new sfValidatorPass(array('required' => false)),
      'mail_referent'            => new sfValidatorPass(array('required' => false)),
      'telephone'                => new sfValidatorPass(array('required' => false)),
      'fax'                      => new sfValidatorPass(array('required' => false)),
      'date_derniere_connexion'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre_connexion'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'version'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'admin_v2'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('site_client_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteClient';
  }

  public function getFields()
  {
    return array(
      'id_site_client'           => 'Number',
      'id_site_parent'           => 'ForeignKey',
      'id_filiale'               => 'Number',
      'cle'                      => 'Text',
      'etat'                     => 'Number',
      'visible'                  => 'Number',
      'date_creation'            => 'Date',
      'date_publication'         => 'Date',
      'date_depublication'       => 'Date',
      'societe'                  => 'Text',
      'url_application'          => 'Text',
      'dossier_application'      => 'Text',
      'identifiant'              => 'Text',
      'mot_de_passe'             => 'Text',
      'identifiant2'             => 'Text',
      'mot_de_passe2'            => 'Text',
      'mail_referent2'           => 'Text',
      'confidentiel'             => 'Number',
      'validation_compte'        => 'Number',
      'adresse'                  => 'Text',
      'code_postal'              => 'Number',
      'id_ville'                 => 'Number',
      'ville'                    => 'Text',
      'logo'                     => 'Text',
      'bandeau'                  => 'Text',
      'html_header'              => 'Text',
      'html_haut'                => 'Text',
      'html_bas'                 => 'Text',
      'html_gauche'              => 'Text',
      'html_droit'               => 'Text',
      'couleur1'                 => 'Text',
      'couleur2'                 => 'Text',
      'couleur3'                 => 'Text',
      'carte_position_latitude'  => 'Number',
      'carte_position_longitude' => 'Number',
      'carte_position_hauteur'   => 'Text',
      'cle_googlemaps'           => 'Text',
      'nom_referent'             => 'Text',
      'prenom_referent'          => 'Text',
      'mail_referent'            => 'Text',
      'telephone'                => 'Text',
      'fax'                      => 'Text',
      'date_derniere_connexion'  => 'Date',
      'nombre_connexion'         => 'Number',
      'version'                  => 'Number',
      'admin_v2'                 => 'Number',
    );
  }
}
