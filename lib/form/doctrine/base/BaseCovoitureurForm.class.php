<?php

/**
 * Covoitureur form base class.
 *
 * @method Covoitureur getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_utilisateur'              => new sfWidgetFormInputHidden(),
      'cle'                         => new sfWidgetFormInputText(),
      'etat'                        => new sfWidgetFormInputText(),
      'etat_site_client_validation' => new sfWidgetFormInputText(),
      'date_creation'               => new sfWidgetFormDateTime(),
      'date_modification'           => new sfWidgetFormDateTime(),
      'date_fin'                    => new sfWidgetFormDateTime(),
      'inscription_minute'          => new sfWidgetFormInputText(),
      'identifiant'                 => new sfWidgetFormInputText(),
      'mot_de_passe'                => new sfWidgetFormInputText(),
      'sexe'                        => new sfWidgetFormInputText(),
      'civilite'                    => new sfWidgetFormInputText(),
      'nom'                         => new sfWidgetFormInputText(),
      'prenom'                      => new sfWidgetFormInputText(),
      'adresse'                     => new sfWidgetFormInputText(),
      'code_postal'                 => new sfWidgetFormInputText(),
      'ville'                       => new sfWidgetFormInputText(),
      'mail'                        => new sfWidgetFormInputText(),
      'mail_perso'                  => new sfWidgetFormInputText(),
      'telephone_mobile'            => new sfWidgetFormInputText(),
      'telephone'                   => new sfWidgetFormInputText(),
      'telephone_visible'           => new sfWidgetFormInputText(),
      'telephone_autre'             => new sfWidgetFormInputText(),
      'societe'                     => new sfWidgetFormInputText(),
      'matricule'                   => new sfWidgetFormInputText(),
      'service'                     => new sfWidgetFormInputText(),
      'tranche_age'                 => new sfWidgetFormInputText(),
      'date_naissance'              => new sfWidgetFormDate(),
      'isMajeur'                    => new sfWidgetFormInputText(),
      'question'                    => new sfWidgetFormInputText(),
      'reponse'                     => new sfWidgetFormInputText(),
      'date_derniere_connexion'     => new sfWidgetFormDateTime(),
      'nombre_connexion'            => new sfWidgetFormInputText(),
      'permanente_connexion'        => new sfWidgetFormInputText(),
      'id_partenaire'               => new sfWidgetFormInputText(),
      'id_site_client'              => new sfWidgetFormInputText(),
      'id_site_site'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'etat_photo'                  => new sfWidgetFormInputText(),
      'file_photo'                  => new sfWidgetFormInputText(),
      'photo_ext'                   => new sfWidgetFormInputText(),
      'etat_video'                  => new sfWidgetFormInputText(),
      'newsletter'                  => new sfWidgetFormInputText(),
      'tolere_fumeur'               => new sfWidgetFormInputText(),
      'tolere_animaux'              => new sfWidgetFormInputText(),
      'tolere_bagage'               => new sfWidgetFormInputText(),
      'tolere_musique'              => new sfWidgetFormInputText(),
      'tolere_discussion'           => new sfWidgetFormInputText(),
      'note'                        => new sfWidgetFormInputText(),
      'dirgrp'                      => new sfWidgetFormTextarea(),
      'dptag'                       => new sfWidgetFormTextarea(),
      'svcpdv'                      => new sfWidgetFormTextarea(),
      'bascule'                     => new sfWidgetFormInputText(),
      'id_facebook'                 => new sfWidgetFormInputText(),
      'mise_en_relation_sms'        => new sfWidgetFormInputText(),
      'rsa'                         => new sfWidgetFormInputText(),
      'id_covoitureur_lien_site'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CovoitureurLienSite'), 'add_empty' => true)),
      'id_covoitureur_fonction'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CovoitureurFonction'), 'add_empty' => true)),
      'cp_etablissement_horaire_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'add_empty' => true)),
      'cp_etablissement_secteur_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'add_empty' => true)),
      'cp_etablissement_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'add_empty' => true)),
      'id_csp'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Csp'), 'add_empty' => true)),
      'lu_charte'                   => new sfWidgetFormInputText(),
      'ss_mail'                     => new sfWidgetFormInputText(),
      'ss_contact_covoit'           => new sfWidgetFormInputText(),
      'anonymat'                    => new sfWidgetFormInputText(),
      'possede_vehicule'            => new sfWidgetFormInputText(),
      'remarque'                    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_utilisateur'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_utilisateur')), 'empty_value' => $this->getObject()->get('id_utilisateur'), 'required' => false)),
      'cle'                         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'etat'                        => new sfValidatorInteger(array('required' => false)),
      'etat_site_client_validation' => new sfValidatorInteger(array('required' => false)),
      'date_creation'               => new sfValidatorDateTime(array('required' => false)),
      'date_modification'           => new sfValidatorDateTime(array('required' => false)),
      'date_fin'                    => new sfValidatorDateTime(array('required' => false)),
      'inscription_minute'          => new sfValidatorInteger(array('required' => false)),
      'identifiant'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mot_de_passe'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'sexe'                        => new sfValidatorInteger(array('required' => false)),
      'civilite'                    => new sfValidatorInteger(array('required' => false)),
      'nom'                         => new sfValidatorString(array('max_length' => 255)),
      'prenom'                      => new sfValidatorString(array('max_length' => 200)),
      'adresse'                     => new sfValidatorString(array('max_length' => 255)),
      'code_postal'                 => new sfValidatorInteger(),
      'ville'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail_perso'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone_mobile'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telephone'                   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'telephone_visible'           => new sfValidatorInteger(array('required' => false)),
      'telephone_autre'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'societe'                     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'matricule'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'service'                     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tranche_age'                 => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'date_naissance'              => new sfValidatorDate(array('required' => false)),
      'isMajeur'                    => new sfValidatorInteger(),
      'question'                    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'reponse'                     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'date_derniere_connexion'     => new sfValidatorDateTime(array('required' => false)),
      'nombre_connexion'            => new sfValidatorInteger(array('required' => false)),
      'permanente_connexion'        => new sfValidatorInteger(array('required' => false)),
      'id_partenaire'               => new sfValidatorInteger(array('required' => false)),
      'id_site_client'              => new sfValidatorInteger(array('required' => false)),
      'id_site_site'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'etat_photo'                  => new sfValidatorInteger(array('required' => false)),
      'file_photo'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo_ext'                   => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'etat_video'                  => new sfValidatorInteger(array('required' => false)),
      'newsletter'                  => new sfValidatorInteger(array('required' => false)),
      'tolere_fumeur'               => new sfValidatorInteger(array('required' => false)),
      'tolere_animaux'              => new sfValidatorInteger(array('required' => false)),
      'tolere_bagage'               => new sfValidatorInteger(array('required' => false)),
      'tolere_musique'              => new sfValidatorInteger(array('required' => false)),
      'tolere_discussion'           => new sfValidatorInteger(array('required' => false)),
      'note'                        => new sfValidatorInteger(array('required' => false)),
      'dirgrp'                      => new sfValidatorString(array('required' => false)),
      'dptag'                       => new sfValidatorString(array('required' => false)),
      'svcpdv'                      => new sfValidatorString(array('required' => false)),
      'bascule'                     => new sfValidatorInteger(array('required' => false)),
      'id_facebook'                 => new sfValidatorInteger(array('required' => false)),
      'mise_en_relation_sms'        => new sfValidatorInteger(array('required' => false)),
      'rsa'                         => new sfValidatorInteger(array('required' => false)),
      'id_covoitureur_lien_site'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CovoitureurLienSite'), 'required' => false)),
      'id_covoitureur_fonction'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CovoitureurFonction'), 'required' => false)),
      'cp_etablissement_horaire_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementHoraire'), 'required' => false)),
      'cp_etablissement_secteur_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissementSecteur'), 'required' => false)),
      'cp_etablissement_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CpEtablissement'), 'required' => false)),
      'id_csp'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Csp'), 'required' => false)),
      'lu_charte'                   => new sfValidatorInteger(array('required' => false)),
      'ss_mail'                     => new sfValidatorInteger(array('required' => false)),
      'ss_contact_covoit'           => new sfValidatorInteger(array('required' => false)),
      'anonymat'                    => new sfValidatorInteger(array('required' => false)),
      'possede_vehicule'            => new sfValidatorInteger(array('required' => false)),
      'remarque'                    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Covoitureur';
  }

}
