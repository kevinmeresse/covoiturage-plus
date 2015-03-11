<?php

/**
 * SiteClient form base class.
 *
 * @method SiteClient getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSiteClientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_site_client'           => new sfWidgetFormInputHidden(),
      'id_site_parent'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'id_filiale'               => new sfWidgetFormInputText(),
      'cle'                      => new sfWidgetFormInputText(),
      'etat'                     => new sfWidgetFormInputText(),
      'visible'                  => new sfWidgetFormInputText(),
      'date_creation'            => new sfWidgetFormDateTime(),
      'date_publication'         => new sfWidgetFormDateTime(),
      'date_depublication'       => new sfWidgetFormDateTime(),
      'societe'                  => new sfWidgetFormInputText(),
      'url_application'          => new sfWidgetFormInputText(),
      'dossier_application'      => new sfWidgetFormInputText(),
      'identifiant'              => new sfWidgetFormInputText(),
      'mot_de_passe'             => new sfWidgetFormInputText(),
      'identifiant2'             => new sfWidgetFormInputText(),
      'mot_de_passe2'            => new sfWidgetFormInputText(),
      'mail_referent2'           => new sfWidgetFormInputText(),
      'confidentiel'             => new sfWidgetFormInputText(),
      'validation_compte'        => new sfWidgetFormInputText(),
      'adresse'                  => new sfWidgetFormInputText(),
      'code_postal'              => new sfWidgetFormInputText(),
      'id_ville'                 => new sfWidgetFormInputText(),
      'ville'                    => new sfWidgetFormInputText(),
      'logo'                     => new sfWidgetFormInputText(),
      'bandeau'                  => new sfWidgetFormInputText(),
      'html_header'              => new sfWidgetFormTextarea(),
      'html_haut'                => new sfWidgetFormTextarea(),
      'html_bas'                 => new sfWidgetFormTextarea(),
      'html_gauche'              => new sfWidgetFormTextarea(),
      'html_droit'               => new sfWidgetFormTextarea(),
      'couleur1'                 => new sfWidgetFormInputText(),
      'couleur2'                 => new sfWidgetFormInputText(),
      'couleur3'                 => new sfWidgetFormInputText(),
      'carte_position_latitude'  => new sfWidgetFormInputText(),
      'carte_position_longitude' => new sfWidgetFormInputText(),
      'carte_position_hauteur'   => new sfWidgetFormInputText(),
      'cle_googlemaps'           => new sfWidgetFormInputText(),
      'nom_referent'             => new sfWidgetFormInputText(),
      'prenom_referent'          => new sfWidgetFormInputText(),
      'mail_referent'            => new sfWidgetFormInputText(),
      'telephone'                => new sfWidgetFormInputText(),
      'fax'                      => new sfWidgetFormInputText(),
      'date_derniere_connexion'  => new sfWidgetFormDateTime(),
      'nombre_connexion'         => new sfWidgetFormInputText(),
      'version'                  => new sfWidgetFormInputText(),
      'admin_v2'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_site_client'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_site_client')), 'empty_value' => $this->getObject()->get('id_site_client'), 'required' => false)),
      'id_site_parent'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'id_filiale'               => new sfValidatorInteger(array('required' => false)),
      'cle'                      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                     => new sfValidatorInteger(array('required' => false)),
      'visible'                  => new sfValidatorInteger(array('required' => false)),
      'date_creation'            => new sfValidatorDateTime(array('required' => false)),
      'date_publication'         => new sfValidatorDateTime(array('required' => false)),
      'date_depublication'       => new sfValidatorDateTime(array('required' => false)),
      'societe'                  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'url_application'          => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'dossier_application'      => new sfValidatorString(array('max_length' => 100)),
      'identifiant'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mot_de_passe'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'identifiant2'             => new sfValidatorString(array('max_length' => 50)),
      'mot_de_passe2'            => new sfValidatorString(array('max_length' => 50)),
      'mail_referent2'           => new sfValidatorString(array('max_length' => 255)),
      'confidentiel'             => new sfValidatorInteger(),
      'validation_compte'        => new sfValidatorInteger(array('required' => false)),
      'adresse'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'code_postal'              => new sfValidatorInteger(array('required' => false)),
      'id_ville'                 => new sfValidatorInteger(array('required' => false)),
      'ville'                    => new sfValidatorString(array('max_length' => 255)),
      'logo'                     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'bandeau'                  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'html_header'              => new sfValidatorString(array('required' => false)),
      'html_haut'                => new sfValidatorString(array('required' => false)),
      'html_bas'                 => new sfValidatorString(array('required' => false)),
      'html_gauche'              => new sfValidatorString(array('required' => false)),
      'html_droit'               => new sfValidatorString(array('required' => false)),
      'couleur1'                 => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'couleur2'                 => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'couleur3'                 => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'carte_position_latitude'  => new sfValidatorNumber(array('required' => false)),
      'carte_position_longitude' => new sfValidatorNumber(array('required' => false)),
      'carte_position_hauteur'   => new sfValidatorString(array('max_length' => 250)),
      'cle_googlemaps'           => new sfValidatorString(array('max_length' => 250)),
      'nom_referent'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prenom_referent'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'mail_referent'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fax'                      => new sfValidatorString(array('max_length' => 20)),
      'date_derniere_connexion'  => new sfValidatorDateTime(array('required' => false)),
      'nombre_connexion'         => new sfValidatorInteger(array('required' => false)),
      'version'                  => new sfValidatorInteger(array('required' => false)),
      'admin_v2'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('site_client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteClient';
  }

}
