<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurForm extends BaseCovoitureurForm {

    public function configure() {

        //désactivation de certains champs
        unset(
                $this['photo_ext'],
                //$this['etat_site_client_validation'], 
                $this['inscription_minute'], 
                $this['date_fin'],
                $this['identifiant'],
                $this['civilite'],
                $this['tranche_age'],
                $this['nombre_connexion'],
                $this['permanente_connexion'],
                $this['note'],
                $this['mise_en_relation_sms'],
                $this['bascule'],
                $this['mot_de_passe'],
                //$this['mail_perso'],
                //$this['telephone_mobile'],
                $this['question'],
                $this['reponse'],
                $this['id_partenaire'],
                $this['id_site_client'],
                $this['id_site_site'],
                $this['etat_video'],
                //$this['dirgrp'],
                $this['dptag'],
                $this['svcpdv'],
                $this['date_naissance'],
                $this['id_facebook'],
                $this['date_derniere_connexion'],
                $this['cp_etablissement_id']
        );


        //rendre caché certains champs
        $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['date_creation'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['id_site_client'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cle'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['photo_ext'] = new sfWidgetFormInputHidden();
        //
        //nouveaux champs pour la création du covoitureur
        /*
        $this->widgetSchema['valid_mail'] = new sfWidgetFormInputText();
        $this->widgetSchema['valid_mail']->setLabel('Retapez votre mail pour validation');
        $this->validatorSchema['valid_mail'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        */

        /*
          //validation que les champs mail et valid_mail sont identiques
          $this->validatorSchema->setPostValidator(
          new sfValidatorSchemaCompare('mail', sfValidatorSchemaCompare::EQUAL, 'valid_mail ',
          array('throw_global_error' => true),
          array('invalid' => 'Les deux saisie de mail doivent etre identiques)')
          )
          );

          //validation que le mail n'est pas déjà présent dans la base
          $this->validatorSchema->setPostValidator(
          new sfValidatorDoctrineUnique(array('model' => 'Covoitureur', 'column' => array('mail')))
          );
         * 
         */

        //gestion de la postvalidation avec plusieurs postvalidator
        /*
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
        /*
                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkRequiredFields'),
                                'arguments' => array('isNew' => $this->isNew, 'id_utilisateur' => $this->getObject()->getIdUtilisateur()),
                            )
                    )
                ))
        );
        */

        //verification de l'unicité du mail
         $this->validatorSchema->setPostValidator(
                new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkMailUnique'),
                                'arguments' => array('isNew' => $this->isNew, 'id_utilisateur' => $this->getObject()->getIdUtilisateur()),
                            )
                    )
        );

        /*
         * adaptation du formulaire
         */

        //initialisation des widget particuliers aux champs ville (en autocompletion)-
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
        $this->widgetSchema['code_postal'] = new sfWidgetFormInputText(array(),array('maxlength' => 5, 'size' => 5));
        $this->validatorSchema['code_postal'] =  new sfValidatorInteger(array('required' => false));
        
        //initialisation des widget particuliers aux champs etablissement (en autocompletion)-
        $this->widgetSchema['etablissement'] = new sfWidgetFormInputText();
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

        $this->widgetSchema['remarque'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));

        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'désactivé', 1 => 'activé'),

                ));
        $this->setDefault('etat', 1);

        //modification des widgets du formulaire
        $this->widgetSchema['etat_site_client_validation'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non validé', 1 => 'validé'),

                ));
        $this->setDefault('etat_site_client_validation', 1);


        $this->widgetSchema['ss_mail'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),

                ));
        $this->setDefault('ss_mail', 1);

        $this->widgetSchema['ss_mail']->setLabel('L\'inscrit dispose d\'un mail');
        $this->validatorSchema['ss_mail'] = new sfValidatorInteger(array('required' => false));


        $this->widgetSchema['sexe'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'M', 2 => 'F'),
                ));

       /*
        $this->widgetSchema['civilite'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => 'M.', 2 => 'Mme.', 3 => 'Mlle.'),
                ));
        * 
        */

        /*
        $this->widgetSchema['telephone_visible'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->setDefault('telephone_visible', 0);

         *
         */
        $this->widgetSchema['telephone_visible'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));

        $this->widgetSchema['isMajeur'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
        $this->setDefault('isMajeur', 1);

        /*
        $this->widgetSchema['tranche_age'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('18-30' => '18-30', '31-50' => '31-50', '51 et plus' => '51 et plus'),
                ));
         * 
         */

        $this->widgetSchema['tolere_fumeur'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        $this->widgetSchema['tolere_animaux'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        $this->widgetSchema['tolere_bagage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        $this->widgetSchema['tolere_musique'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        $this->widgetSchema['tolere_discussion'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));

        /*
        $this->widgetSchema['mise_en_relation_sms'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
         * 
         */

        $this->widgetSchema['newsletter'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                ));
         $this->setDefault('newsletter', 1);


        $this->widgetSchema['etat_photo'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => ' non Validée', 2 => ' Validée'),
                ));

        $this->widgetSchema['etat_video'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(1 => ' non Validée', 2 => ' Validée'),
                ));


        //widget d'ajout de photo
        $this->widgetSchema['file_photo'] = new sfWidgetFormInputFile();

        //champ desactivé en création
        /*
        if ($this->getObject()->isNew()) {
            $this->widgetSchema['file_photo']->setDefault('');
            $this->widgetSchema['file_photo']->setAttribute('disabled', 'disabled');
        }
         * 
         */

        $this->validatorSchema['file_photo'] = new sfValidatorFile(array('required' => false));
        $this->widgetSchema['file_photo']->setLabel('Photo');

        //widget de demande de suppression de photo
        /*
          if($this->getObject()->getEtatPhoto() == 0){
          $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'Non', 1 => 'Oui'),
          'default' => 0,
          ));
          $this->widgetSchema['supp_photo']->setAttribute('disabled', 'disabled');
          }else{
          $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'Non', 1 => 'Oui'),
          'default' => 0,
          ));
          }
         * 
         */
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

        $this->widgetSchema['supp_photo']->setLabel('Suppression de la photo?');

        $this->validatorSchema['supp_photo'] = new sfValidatorInteger();


        //gestion de la date de naissance
        $annee_debut = date("Y") - 100;
        $annee_fin = date("Y") - 18;
        //$years = range($annee_debut, $annee_fin); //On crée par exemple un tableau de valeur
        $yearsKey = range($annee_debut, $annee_fin);
        array_unshift($yearsKey, "NP");
        $yearsValue = range($annee_debut, $annee_fin);
        array_unshift($yearsValue, "0000");
        //$years_list = array_combine($years, $years);
        $years_list = array_combine( $yearsValue,$yearsKey);
        $this->widgetSchema['annee_naissance'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $years_list,
                ));
        $this->widgetSchema['annee_naissance']->setLabel('Année de naissance');
        $this->validatorSchema['annee_naissance'] = new sfValidatorInteger(array('required' => true));

        //gestion de la sélection de l'année de naissance quand l'utilisateur existe
        if (!$this->getObject()->isNew()) {
            $naiss_an = substr($this->getObject()->getDateNaissance(), 0,4);
            $this->setDefault('annee_naissance', $naiss_an);
        }


        //gestion des dates
        /*
          $this->widgetSchema['date_fin'] = new sfWidgetFormI18nDateTime(array(
          'culture' => 'fr_FR'
          ));
         * 
         
        $this->widgetSchema['date_fin'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
*/

        /*
          $this->widgetSchema['date_derniere_connexion'] = new sfWidgetFormI18nDateTime(array(
          'culture' => 'fr_FR'
          ));
         */



        //gestion du champ "bénéficiaire du RSA"
        $this->widgetSchema['rsa'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));

        $this->widgetSchema['rsa']->setLabel('Bénéficiaire du RSA?');

        $this->validatorSchema['rsa'] = new sfValidatorChoice(array('choices' => array(0, 1)));

        //gestion du champ id_covoitureur_fonction en fonction du site client
        $this->widgetSchema['id_covoitureur_fonction'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CovoitureurFonction'),
                    'query' => Doctrine::getTable('CovoitureurFonction')->getCovoitureurFonctionSite(),
                    'add_empty' => true,
                ));

        //gestion du champ id_covoitureur_lien_site en fonction du site client
        $this->widgetSchema['id_covoitureur_lien_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CovoitureurLienSite'),
                    'query' => Doctrine::getTable('CovoitureurLienSite')->getCovoitureurLienSite(),
                    'add_empty' => true,
                ));

        //gestion du champ "lu_charte"
        $this->widgetSchema['lu_charte'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->widgetSchema['lu_charte']->setLabel('Avez-vous lu la charte ?');



        //gestion du champ "ss_contact_covoit"
        /*
        $this->widgetSchema['ss_contact_covoit'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('Ne souhaite pas être contacté par les covoitureurs'),
                    'default' => 0,
                ));
         *
         */
        //$this->widgetSchema['ss_contact_covoit'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        $this->widgetSchema['ss_contact_covoit'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        
        if($this->getObject()->isNew()){
            $this->widgetSchema['possede_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));
        }else{
            $this->widgetSchema['possede_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        }
        //$this->widgetSchema['possede_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));


        //$this->widgetSchema['ss_contact_covoit']->setLabel('Je ne souhaite pas etre contacté par les covoitureurs');

        //gestion du champ "anonymat"
        /*
        $this->widgetSchema['anonymat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array(1 => 'souhaite etre'),
                    'default' => false,
                ));
         *
         */
         

        //$this->widgetSchema['anonymat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));

        $this->widgetSchema['anonymat'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));



        //gestion du champ cp_etablissement_id  (organisme, entreprise)  sauf l'entreprise peugeot
        $this->widgetSchema['cp_etablissement_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpEtablissement'),
                    'query' => Doctrine::getTable('CpEtablissement')->getEtablissementEtb(),
                    'method' => 'getNomEtablissementEtRaisonSociale',
                    'add_empty' => 'particulier',
                ));
        $this->widgetSchema['cp_etablissement_id']->setLabel('Vous faites partie d\'un des établissements suivants');
        
        //champ texte réservé à C+
        $this->widgetSchema['remarque'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor','rows'=>'10' ,'cols'=>'50'));
        
    }

    /*
     * surcharge de la méthode save pour enregistrer la photo du covoitureur
     */
/*
    public function save($con = null) {
//gestion des erreur
        $erreur = 0;

//un fichier photo est proposé en téléchargement
        if (!is_null($this->getValue('file_photo'))) {
            $file = $this->getValue('file_photo');

            $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getValue('id_utilisateur')));
            //$filename = sfConfig::get('sf_photo_covoitureur_prefixe') . $this->getValue('id_utilisateur') . $file->getExtension($file->getOriginalExtension());
            //$filename = sfConfig::get('sf_photo_covoitureur_prefixe') . $this->getValue('id_utilisateur') . sfConfig::get('extension_fichier_image');
            //$filename = sfConfig::get('sf_chemin_base') . $covoitureur->setCheminPhotoCovoitureur();
            $filename = sfConfig::get('sf_web_dir') . $covoitureur->setCheminPhotoCovoitureur();
            $thumbfilename = sfConfig::get('sf_chemin_base') . $covoitureur->setThumbnailPhotoCovoitureur();

            $file->save($filename);
            $outil = new Util();
            $outil->thumbnailPhotoEtEnreg($this->getValue('file_photo'), $thumbfilename);

            $covoitureur->setPhotoExt(sfConfig::get('sf_extension_fichier_image'));
            $covoitureur->setEtatPhoto('1');
            $covoitureur->save();
            $this->setDefault('etat_photo ', '1');
        } else {//pas de fichier photo proposé en téléchargement
            //$this->setDefault('file_photo','');
            //l'etat_photo est à 0 en base , => forcage etat_photo à zéro et suppression de la photo
            //  si elle existe
            if ($this->getObject()->getEtatPhoto() == 0) {
                $this->setDefault('etat_photo ', '0');
                $this->setDefault('supp_photo', '0');
                $this->setDefault('file_photo', '');
            } else {// etat_photo diff de 0 => fichier photo existe
                //gestion de la suppression de la photo  et du thumbnail      
                if (($this->getValue('supp_photo')) == 1) {
                    $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getValue('id_utilisateur')));


                    $cheminPhoto = $covoitureur->getCheminPhotoCovoitureur1();
                    //unlink(sfConfig::get('sf_chemin_base') . $covoitureur->setCheminPhotoCovoitureur());
                    unlink(sfConfig::get('sf_web_dir') . $covoitureur->setCheminPhotoCovoitureur());

                    //suppression du thumnail de la photo
                    if (!$covoitureur->deleteThumnailPhotoCovoitureur()) {
                        $erreur = 1;
                    }


                    $covoitureur->setPhotoExt('');
                    $covoitureur->setEtatPhoto('0');
                    $covoitureur->setFilePhoto('');
                    $covoitureur->save();
                    $this->setDefault('supp_photo', '0');
                    $this->setDefault('etat_photo ', '0');
                } else { // gestion de la vérificatin de présence photo
                }
            }
        }

        return parent::save($con);
    }
 * 
 */

    //forcage du champ etat_photo
    public function updateObject($values = null) {
        $object = parent::updateObject($values);
        if ($this->getValue('supp_photo') == 1) {
            $object->setEtatPhoto(0);
        }
        if (!is_null($this->getValue('file_photo'))) {
            $object->setEtatPhoto(1);
        }


        return $object;
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
                    $error = new sfValidatorError($validator, 'Ce mail existe déjà en base');
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

     public function checkMailUnique($validator, $values, $arguments) {
        $errors = array();

        //vérification des mails
            if ($values['mail'] != '') {
                //$exit_covoit = Doctrine_Core::getTable('Covoitureur')->findByMail($values['mail']);
                $exit_covoit = Doctrine_Core::getTable('Covoitureur')->getCovoitureurProfilVerifMail($values['mail'], $arguments['id_utilisateur']);
                $text_erreur = 'NOK';
                if ($exit_covoit != 0) {
                    $error = new sfValidatorError($validator, 'Ce mail existe déjà en base');
                    $errors['mail'] = $error;
                }

            }

        if (count($errors)) {
            throw new sfValidatorErrorSchema($validator, $errors);
        }

        return $values;
    }

}
