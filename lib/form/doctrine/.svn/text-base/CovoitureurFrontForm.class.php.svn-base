<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurFrontForm extends BaseCovoitureurForm {

    public function configure() {
        //désactivation de certains champs
        unset(
                //$this['id_utilisateur'], 
                $this['cle'], $this['etat'], $this['etat_site_client_validation'], $this['identifiant'], $this['mail_perso '], $this['date_creation'], $this['date_fin'], $this['inscription_minute'], $this['tranche_age'], $this['nombre_connexion'], $this['id_site_client'], $this['id_site_site'], $this['photo_ext'], $this['etat_video'], $this['note'], $this['dirgrp'], $this['dptag'], $this['bascule '], $this['tolere_musique '], $this['tolere_discussion '], $this['date_naissance '], $this['cp_etablissement_id']
        );


        //gestion du champ "ss_mail" qui indique si le cocoitureur possede ou non un mail

        $this->widgetSchema['ss_mail'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        //gestion de la valeur par défaut du champ ss_mail si le formulaire est en création ou en édition
        if (!$this->isNew) {
            if ($this->getObject()->getMail() != '') {
                //$this->setDefault('ss_mail', 1);
                $this->getObject()->setSsMail(1);
            } else {
                $this->setDefault('ss_mail', 0);
            }
        } else {
            $this->setDefault('ss_mail', 1);
        }
        $this->setDefault('ss_mail', 1);

        $this->widgetSchema['ss_mail']->setLabel('Je dispose d\'un mail');
        $this->validatorSchema['ss_mail'] = new sfValidatorInteger(array('required' => false));


        $this->widgetSchema['mail'] = new sfWidgetFormInputText();
        //$this->validatorSchema['mail'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez saisir votre mail :'.$this->getValue('nom') ));
        $this->validatorSchema['mail'] = new sfValidatorEmail(array('required' => false));
        //validation du form "mail" par appel à fonction extérieur
        /*
          $this->validatorSchema['mail']= new sfValidatorCallback(
          array(
          'callback' => array($this, 'checkRequiredFields'),
          'arguments' => array('isNew' => $this->isNew),
          )
          );
         */

        $this->widgetSchema['valid_mail'] = new sfWidgetFormInputText();
        $this->widgetSchema['valid_mail']->setLabel('Retapez votre mail pour validation');

        //vlidation des champs mail si le covoitureur possede un mail (case "ss_mail" décochée)
        $this->validatorSchema['valid_mail'] = new sfValidatorEmail(array('required' => false));
        //$this->validatorSchema['valid_mail'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez re-saisir votre mail' ));

        /*
          //validation que les champs mail et valid_mail sont identiques
          $this->validatorSchema->setPostValidator(
          new sfValidatorSchemaCompare('mail', sfValidatorSchemaCompare::EQUAL, 'valid_mail',
          array(),
          array('invalid' => 'Les deux saisies de mail doivent etre identiques')
          )
          );

          //validation que le mail n'est pas déjà présent dans la base

          $this->validatorSchema->setPostValidator(
          new sfValidatorDoctrineUnique(array('model' => 'Covoitureur', 'column' => array('mail'))), array('invalid' => 'le mail existe deja en base de données)')
          );


          //}
         */
        
        //initialisation des widget particuliers aux champs etablissement (en autocompletion)-
        $this->widgetSchema['etablissement'] = new sfWidgetFormInputText();
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

        $this->widgetSchema ['mot_de_passe'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['mot_de_passe'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['valid_motdepasse'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['valid_motdepasse'] = new sfValidatorString(array('required' => false));
        //$this->widgetSchema['valid_motdepasse'] = new sfWidgetFormInputText();
        $this->widgetSchema['valid_motdepasse']->setLabel('Retapez votre mot de passe pour validation');
        //$this->validatorSchema['valid_motdepasse'] = new sfValidatorEmail(array('required' => false),array('invalid'=>'miet'));
        //$this->validatorSchema['valid_motdepasse'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez re-saisir votre mot de passe' ));
        /*
          //validation que les champs mail et valid_mail sont identiques
          $this->validatorSchema->setPostValidator(
          new sfValidatorSchemaCompare('mot_de_passe', sfValidatorSchemaCompare::EQUAL, 'valid_motdepasse',
          array('throw_global_error' => true),
          array('invalid' => 'Les deux saisies de mot de passe doivent etre identiques')
          )
          );
         */


        //gestion de la postvalidation avec plusieurs postvalidator        
        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(
                    /*
                      new sfValidatorSchemaCompare('mail', sfValidatorSchemaCompare::EQUAL, 'valid_mail',
                      array(),
                      array('invalid' => 'Les deux saisies de mail doivent etre identiques')
                      ),
                      new sfValidatorDoctrineUnique(
                      array('model' => 'Covoitureur', 'column' => array('mail')),
                      array('invalid' => 'le mail existe deja en base de données)')
                      ),

                      new sfValidatorSchemaCompare('mot_de_passe', sfValidatorSchemaCompare::EQUAL, 'valid_motdepasse',
                      array('throw_global_error' => true),
                      array('invalid' => 'Les deux saisies de mot de passe doivent etre identiques')
                      ),
                     * 
                     */
                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkRequiredFields'),
                                'arguments' => array('isNew' => $this->isNew, 'id_utilisateur' => $this->getObject()->getIdUtilisateur()),
                            )
                    )
                ))
        );




        $this->widgetSchema['sexe'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'Homme', 2 => 'Femme'),
                ));
        $this->validatorSchema['sexe'] = new sfValidatorInteger(array('required' => true));

        $this->widgetSchema['civilite'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'M.', 2 => 'Mme.', 3 => 'Mlle.'),
                ));

        $this->widgetSchema['telephone_visible'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));


        $this->widgetSchema['tranche_age'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('18-30' => '18-30', '31-50' => '31-50', '51 et plus' => '51 et plus'),
                ));

        $this->widgetSchema['tolere_fumeur'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));

        $this->widgetSchema['tolere_animaux'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));

        $this->widgetSchema['tolere_bagage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));

        $this->widgetSchema['tolere_musique'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->validatorSchema['tolere_musique'] = new sfValidatorInteger(array('required' => true));

        $this->widgetSchema['tolere_discussion'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->validatorSchema['tolere_discussion'] = new sfValidatorInteger(array('required' => true));

        $this->widgetSchema['mise_en_relation_sms'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        $this->widgetSchema['newsletter'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));



        //gestion de la date de naissance
        $annee_debut = date("Y") - 100;
        $annee_fin = date("Y") - 18;
        $years = range($annee_debut, $annee_fin); //On crée par exemple un tableau de valeur
        $years_list = array_combine($years, $years);
        $this->widgetSchema['annee_naissance'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $years_list,
                ));
        $this->widgetSchema['annee_naissance']->setLabel('Année de naissance');
        $this->validatorSchema['annee_naissance'] = new sfValidatorInteger(array('required' => true));

        /*
          $this->widgetSchema['date_naissance'] = new sfWidgetFormI18nDate(array(
          'culture' => 'fr_FR',
          'format' => '%year%',
          'years' => $years_list
          ));

          $this->widgetSchema['date_naissance']->setDefault('01-01-1950');

          $this->widgetSchema['date_naissance']->setLabel('Année de naissance');

          $this->validatorSchema['date_naissance'] = new sfValidatorDate(array('min' => '01-01-1900', 'max' => '01-01-2000', 'date_format' => '?P<year>'));
         */


        //gestion du champ "bénéficiaire du RSA"
        $this->widgetSchema['rsa'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));

        $this->widgetSchema['rsa']->setLabel('Bénéficiaire du RSA?');

        //gestion du champ id_covoitureur_lien_site en fonction du site client (connaisannce du site par ...)
        $this->widgetSchema['id_covoitureur_lien_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CovoitureurLienSite'),
                    'query' => Doctrine::getTable('CovoitureurLienSite')->getCovoitureurLienSite(),
                    'add_empty' => true,
                ));
        $this->widgetSchema['id_covoitureur_lien_site']->setLabel('connaissance de l\'association');

        //gestion du champ cp_etablissement_id  (organisme, entreprise)  sauf l'entreprise peugeot
        /*$this->widgetSchema['cp_etablissement_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissement'),
                    //'query' => Doctrine::getTable('CpEtablissement'),
                    'add_empty' => 'particulier',
                    'default' => '19',
                ));
        */
        $this->widgetSchema['cp_etablissement_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpEtablissement',
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    //'query' => Doctrine::getTable('CpEtablissement'),
                    'add_empty' => true,
                ));
        //Test si personne de PSA
        if (sfContext::getInstance()->getUser()->getAttribute('Psa') == '1') {
            $this->widgetSchema['cp_etablissement_id']->addOption('default', '10');
        }

        //$this->widgetSchema['cp_etablissement_id']->setLabel(sfContext::getInstance()->getUser()->getAttribute('Psa'));
        //$this->widgetSchema['cp_etablissement_id']->setDefault(10);

        $this->widgetSchema['cp_etablissement_id']->setLabel($this->widgetSchema['cp_etablissement_id']->getDefault());

        //Test PSA
        //if (sfContext::getInstance()->getUser()->getAttribute('Psa') == '1') {
            //$this->widgetSchema['cp_etablissement_id']->setDefault('19');
        //}
        //gestion du champ "lu_charte"
        $this->widgetSchema['lu_charte'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('1' => 'Oui, je reconnais avoir lu la charte de covoiturage et en accepte les termes'),
                ));
        //$this->widgetSchema['lu_charte']->setLabel('Oui, je reconnais avoir lu la charte');

        $this->validatorSchema['lu_charte'] = new sfValidatorString(array(
                    'required' => $this->isNew), array('required' => 'Vous devez lire la charte et l\'accepter en cochant la case ci-dessous'));




        //gestion du champ "ss_contact_covoit"
        $this->widgetSchema['ss_contact_covoit'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['ss_contact_covoit']->setLabel('Je souhaite pouvoir être contacté par les covoitureurs');
        $this->validatorSchema['ss_contact_covoit'] = new sfValidatorInteger(array('required' => false));


        //gestion du champ "anonymat"
        $this->widgetSchema['anonymat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['anonymat']->setLabel('Je souhaite rester anonyme');
        $this->validatorSchema['anonymat'] = new sfValidatorInteger(array('required' => false));

        //gestion du champ "permanente_connexion"
        $this->widgetSchema['permanente_connexion'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['permanente_connexion']->setLabel('Je souhaite être connecté automatiquement');
        $this->validatorSchema['permanente_connexion'] = new sfValidatorInteger(array('required' => false));
        ;

        //modification du label "is_majeur"
        $this->widgetSchema['isMajeur'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['isMajeur']->setLabel('Déclare être majeur');
        $this->validatorSchema['isMajeur'] = new sfValidatorInteger(array('min' => 1));
        $this->validatorSchema['isMajeur']->setMessage('min', 'Vous devez être majeur');


        //si le compte existe deja et le champ est non renseigné, on force le champ à 1
        if (!$this->isNew) {
            if ($this->getObject()->getDateCreation() != '0000-00-00 00:00:00') {
                if ($this->getObject()->getisMajeur() == 0) {
                    $this->getObject()->setisMajeur(1);
                }
            }
        }


        //gestion du champ id_covoitureur_fonction  (fonction du covoitureur)
        $this->widgetSchema['id_covoitureur_fonction'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CovoitureurFonction'),
                    'query' => Doctrine::getTable('CovoitureurFonction')->getCovoitureurFonctionSite(),
                    'add_empty' => true,
                ));


        $this->widgetSchema['id_covoitureur_fonction']->setLabel('Fonction');

        $this->validatorSchema['tolere_musique'] = new sfValidatorInteger(array('required' => false));
        $this->validatorSchema['tolere_discussion'] = new sfValidatorInteger(array('required' => false));

        $this->widgetSchema['code_postal'] = new sfWidgetFormInputText(array(),array('maxlength' => 5, 'size' => 5));
        $this->validatorSchema['code_postal'] =  new sfValidatorInteger(array('required' => false), array('invalid' => 'Le code postal doit être un nombre de 5 chiffres'));
        
        $this->validatorSchema['ville'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['telephone'] = new sfValidatorString(array('required' => true));
        
        //widget d'ajout de photo
        $this->widgetSchema['file_photo'] = new sfWidgetFormInputFile();
        $this->validatorSchema['file_photo'] = new sfValidatorFile(array('required' => false));
        $this->widgetSchema['file_photo']->setLabel('Photo');

        $this->widgetSchema->setNameFormat('covoitureurFront[%s]');
    }

    //test de la présence du mail et du champ de verification de mail 
    // si le formulaire est en creation (nouveau covoitureur)
    //  et si le champ ss_mail n'est pas activé

    public function checkRequiredFields($validator, $values, $arguments) {
        $errors = array();

        //vérification des mails
        if ($values['ss_mail'] == 1) {
            if ($values['mail'] == '') {
                //$this->validatorSchema['mail'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez saisir votre mail :'.$this->getValue('nom') ));
                $error = new sfValidatorError($validator, 'Vous devez saisir votre mail');
                $errors['mail'] = $error;
            }
            if ($values['mail'] != '') {
                //$exit_covoit = Doctrine_Core::getTable('Covoitureur')->findByMail($values['mail']);
                $exit_covoit = Doctrine_Core::getTable('Covoitureur')->getCovoitureurProfilVerifMail($values['mail'], $arguments['id_utilisateur']);
                $text_erreur = 'NOK';
                if ($exit_covoit != 0) {
                    $error = new sfValidatorError($validator, 'Ce mail existe déjà en base de données');
                    $errors['mail'] = $error;
                }
                if (isset($arguments['isNew']) && $arguments['isNew'] != null) {
                    if ($values['valid_mail'] != $values['mail']) {
                        $error = new sfValidatorError($validator, 'Les deux saisies de mail doivent être identiques');
                        $errors['valid_mail'] = $error;
                    }
                }
                //$error = new sfValidatorError($validator, 'Ce mail existe deja en base'.$arguments['id_utilisateur']."-".$exit_covoit."mail : ".$values['mail']." ".$values['ss_mail']);
                //$errors['mail'] = $error;
            }
        }

        //vérification des mots de passes si le compte comprend un mail
        if ($values['ss_mail'] == 1) {
            if ($values['mot_de_passe'] == '') {
                //$this->validatorSchema['mail'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez saisir votre mail :'.$this->getValue('nom') ));
                $error = new sfValidatorError($validator, 'Vous devez saisir votre mot de passe');
                $errors['mot_de_passe'] = $error;
            }

            if ($values['valid_motdepasse'] == '') {
                //$this->validatorSchema['mail'] = new sfValidatorString(array ('required' => $this->isNew ), array ('required' => 'Vous devez saisir votre mail :'.$this->getValue('nom') ));
                $error = new sfValidatorError($validator, 'Vous devez re-saisir votre mot de passe');
                $errors['valid_motdepasse'] = $error;
            }
            if ($values['mot_de_passe'] != '' && $values['valid_motdepasse'] != '') {
                if ($values['mot_de_passe'] != $values['valid_motdepasse']) {
                    $error = new sfValidatorError($validator, 'Les deux saisies de mot de passe doivent être identiques');
                    $errors['valid_motdepasse'] = $error;
                }
            }
        }


        /**
         * more depency checking here
         */
        /**
         * if there is errors
         */
        if (count($errors)) {
            throw new sfValidatorErrorSchema($validator, $errors);
        }
        //throw new sfValidatorError($validator, array('mail',$error));
        /**
         * dont forget to return values !
         */
        return $values;
    }
    
    public function renderIntroError() {
        if ($this->isBound() && !$this->isValid()) {
            return "<div class='error_intro'>
                        <img src='/images/picto/caution.png' alt='Attention !'>
                        Oups ! Nous avons découvert quelques erreurs dans votre saisie. Veuillez reparcourir le formulaire pour les corriger.
                    </div>";
        }
        return "";
    }
    
    public function save($con = null) {
        $covoitureur = parent::save($con);
        if (!is_null($this->getValue('file_photo'))) {
            $file = $this->getValue('file_photo');
            $filename = sfConfig::get('sf_web_dir').$covoitureur->setCheminPhotoCovoitureur();
            $thumbfilename = sfConfig::get('sf_web_dir').$covoitureur->setThumbnailPhotoCovoitureur();
            $file->save($filename);
            
            $covoitureur->setEtatPhoto('2');
            $covoitureur->setFilePhoto($filename);
            $covoitureur->save();
        }
        
        return $covoitureur;
    }

}

