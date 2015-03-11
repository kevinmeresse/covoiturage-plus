<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurProfilFrontForm extends BaseCovoitureurForm {

    public function configure() {
        //désactivation de certains champs
        unset(
                //$this['id_utilisateur'], 
                $this['cle'], 
                $this['etat'], 
                $this['etat_site_client_validation'], 
                $this['ss_mail'], 
                $this['identifiant'], 
                $this['mot_de_passe'],
                $this['mail_perso '], 
                $this['date_creation'], 
                $this['date_fin'], 
                $this['inscription_minute'], 
                $this['tranche_age'], 
                $this['nombre_connexion'], 
                $this['id_site_client'], 
                $this['id_site_site'], 
                $this['photo_ext'], 
                $this['etat_video'], 
                $this['note'], 
                $this['dirgrp'], 
                $this['dptag'], 
                $this['bascule '], 
                $this['date_naissance '],
                $this['cp_etablissement_id']
        );


        


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
        $this->widgetSchema['valid_mail']->setLabel('Retapez votre adresse mail pour validation');

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
        $this->widgetSchema['cp_etablissement_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissement'),
                    //'query' => Doctrine::getTable('CpEtablissement'),
                    'add_empty' => 'particulier',
                ));
        $this->widgetSchema['cp_etablissement_id']->setLabel('Vous faites partie d\'un des établissements suivants');

        //gestion du champ "lu_charte"
        $this->widgetSchema['lu_charte'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('1' => 'Oui, je reconnais avoir lu la charte de covoiturage et en accepte les termes'),
                ));
        //$this->widgetSchema['lu_charte']->setLabel('Oui, je reconnais avoir lu la charte');

        $this->validatorSchema['lu_charte'] = new sfValidatorString(array(
                    'required' => $this->isNew), array('required' => 'Vous devez lire la charte et cocher la case'));




        //gestion du champ "ss_contact_covoit"
        $this->widgetSchema['ss_contact_covoit'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['ss_contact_covoit']->setLabel('Je souhaite pouvoir etre contacté par les covoitureurs');
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
        $this->widgetSchema['permanente_connexion']->setLabel('Je souhaite etre connecter automatiquement');
        $this->validatorSchema['permanente_connexion'] = new sfValidatorInteger(array('required' => false));
        ;

        //modification du label "is_majeur"
        $this->widgetSchema['isMajeur'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->widgetSchema['isMajeur']->setLabel('Déclare etre majeure');

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

        //$this->widgetSchema->setNameFormat('covoitureurfront[%s]');
        
        /************************************************************/
        /***         Gestion de la photo                     ********/
        /************************************************************/
        
        //widget d'ajout de photo
        $this->widgetSchema['file_photo'] = new sfWidgetFormInputFile();

        //champ desactivé en création
        if ($this->getObject()->isNew()) {
            $this->widgetSchema['file_photo']->setDefault('');
            $this->widgetSchema['file_photo']->setAttribute('disabled', 'disabled');
        }

        $this->validatorSchema['file_photo'] = new sfValidatorFile(array('required' => false));
        $this->widgetSchema['file_photo']->setLabel('Photo');

        /*
        if ($this->getObject()->getEtatPhoto() == 0) {
            $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non'),
                        'default' => 0,
                    ));
        } else {
            $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non', 1 => 'Oui'),
                        'default' => 0,
                    ));
        }
         * 
         */
        
        $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non', 1 => 'Oui'),
                        'default' => 0,
                    ));

        $this->widgetSchema['supp_photo']->setLabel('Suppresion de la photo ?');

        $this->validatorSchema['supp_photo'] = new sfValidatorInteger();
        
        //initialisation des widget particuliers aux champs etablissement (en autocompletion)-
        $this->widgetSchema['etablissement'] = new sfWidgetFormInputText();
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        $this->validatorSchema['ville'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['telephone'] = new sfValidatorString(array('required' => true));
        
        $this->widgetSchema->setNameFormat('covoitureurFront[%s]');
    }

    //test de la présence du mail et du champ de verification de mail 
    // si le formulaire est en creation (nouveau covoitureur)
    //  et si le champ ss_mail n'est pas activé

    public function checkRequiredFields($validator, $values, $arguments) {
        $errors = array();

        //vérification des mails
       // if ($values['ss_mail'] == 1) {
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
        //}

        


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
    
    /*
     * surcharge de la méthode save pour enregistrer la photo du covoitureur
     */

    public function save($con = null) {
        //gestion des erreur
        $erreur = 0;

        //un fichier photo est proposé en téléchargement
        if (!is_null($this->getValue('file_photo'))) {
            $file = $this->getValue('file_photo');

            $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getObject()->getIdUtilisateur()));
            
            //verification si une photo existe deja et suppression avant enregistrement de la nouvelle
            if($covoitureur->getFilePhoto() != ''){
                //suppression de la photo
                    if (!$covoitureur->deletePhotoCovoitureur()) {
                        $erreur = 1;
                    }
            }
            $filename = sfConfig::get('sf_web_dir').$covoitureur->setCheminPhotoCovoitureur();
            $thumbfilename = sfConfig::get('sf_web_dir').$covoitureur->setThumbnailPhotoCovoitureur();
            //$filename =  $covoitureur->setCheminPhotoCovoitureur();
            //$thumbfilename =  $covoitureur->setThumbnailPhotoCovoitureur();

            $file->save($filename);
            //$outil = new Util();
            //$outil->thumbnailPhotoEtEnreg($this->getValue('photo_resume'), $thumbfilename);

            //$actualite->setPhotoExt(sfConfig::get('sf_extension_fichier_image'));
            $covoitureur->setEtatPhoto('1');
            $covoitureur->save();
            //$this->setDefault('etat_photo ', '1');
        } else {//pas de fichier photo proposé en téléchargement

                //gestion de la suppression de la photo  et du thumbnail      
                if (($this->getValue('supp_photo')) == 1) {
                    $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getObject()->getIdUtilisateur()));

                    //suppression de la photo
                    if (!$covoitureur->deletePhotoCovoitureur()) {
                        $erreur = 1;
                    }

                    //suppression du thumnail de la photo
                    /*
                    if (!$actualite->deleteThumnailPhotoActualite()) {
                        $erreur = 1;
                    }
                     * 
                     */
                    $covoitureur->setEtatPhoto('0');
                    $covoitureur->setFilePhoto('');
                    $covoitureur->save();

            }else{
                
            }
        }

        return parent::save($con);
    }

}

