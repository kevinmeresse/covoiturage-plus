<?php

/**
 * covoitureur actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureurActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //$this->forward('default', 'module');
    }

    /*     * *************************************************************** */
    /*   Methode liées à la création d'un covoitureur    */
    /*     * *************************************************************** */

    public function executeNew(sfWebRequest $request) {
//

        $covoitureur = new Covoitureur();



        //tables pour l'autocompletion
        $this->tab_covoitureur_autoc = array();
        $this->tab_ville_autoc = array();
        
        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {

            //gestion des parametres recupérés par autocompletion
            $formnew = $request->getParameter('covoitureurFront');
            $this->tab_covoitureur_autoc['ville'] = $formnew['ville'];
        } else {
            $this->tab_covoitureur_autoc['ville'] = '';
        }
        
        //recupération des informations liées à l'établissement passe en parametre
        if ($request->getParameter('cp_etablissement_id')) {
            $this->forward404Unless($etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('cp_etablissement_id')));
            $this->tab_ville_autoc['etablissement'] = $etablissement->getNomEtablissementRaisonSocialeId();
        } else {
            $this->tab_ville_autoc['etablissement'] = '';
        }

        //test PSA
        if($this->getUser()->getAttribute('Psa') == '1'){
            $covoitureur->setCpEtablissementId(sfConfig::get('sf_id_etablissement_psa'));
        }


        $this->form = new CovoitureurFrontForm($covoitureur);
        
        $this->getResponse()->addStylesheet('print-charte', '', array('media' => 'print'));
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CovoitureurFrontForm();

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('covoitureurFront');

        //tableau des parametres passé en autocomplétion
        $this->tab_covoitureur_autoc = array();
        $this->tab_covoitureur_autoc['ville'] = $formnew['ville'];
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['etablissement'] = $formnew['etablissement'];

        $this->processForm($request, $this->form);

        //$this->mot_valid = $formnew['valid_motdepasse'];
        //$this->mot_valid2 = $formnew['mot_de_passe'];

        $this->setTemplate('new');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $annee_naissance = $form->getValue('annee_naissance');

            $covoitureur = $form->save();

            //date
            $now = date("Y-m-d H:i:s");
            if ($newInd == 1) {
                $covoitureur->setDateCreation($now);

                //mise à jour du site
                $covoitureur->setIdSiteClient(sfConfig::get('sf_id_site_client'));

                //mise à jour de l'état 
                $covoitureur->setEtat(1);

                //mise à jour de l'état 
                $covoitureur->setEtatSiteClientValidation(0);
            }
            $covoitureur->setDateModification($now);


            //mise à jour de la date de naissance
            $covoitureur->setDateNaissance($annee_naissance . '-01-01');
            
            //gestion de l'établissement
            if ($form->getValue('etablissement') != '') {
                $outil = New Util();
                //extraction des informations entre parenthese de l'établissement  (id de l'etab)
                $etabExtraitId = $outil->extractIdCpEtablissement($form->getValue('etablissement'));
                $covoitureur->setCpEtablissementId($etabExtraitId);           
            } else {
                $covoitureur->setCpEtablissementId(0);
            }
            
            $covoitureur->save();

            if ($form->getValue('ss_mail') == 0) {
                $this->redirect('covoitureur/covoitCreateSsMail?id_utilisateur=' . $covoitureur->getIdUtilisateur());
            } else {//gestion du cas d'enregistrement d'un covoitureur AVEC mail
                //mise en session de l'utilisateur
                $this->getUser()->setAttribute('id_covoitureur', $covoitureur->getIdUtilisateur());
                //Test Psa
                if ($covoitureur->getCpEtablissementId() == sfConfig::get('sf_id_etablissement_psa')) {
                    $this->getUser()->setAttribute('Psa', '1');
                } else {
                    $this->getUser()->setAttribute('Psa', '0');
                }
                
                $this->getUser()->setFlash('notice', sprintf('Votre compte vient d\'être modifié.'));
                $this->redirect('covoitureur/covoitCreateEtIdent?id_utilisateur=' . $covoitureur->getIdUtilisateur());
            }
        }
    }

    //apres creation d'un covoitureur, afficahge d'un message et connexion direct au compte
    public function executeCovoitCreateEtIdent(sfWebRequest $request) {
        //recuperation id covoitureur
        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object contenu_actualite does not exist (%s).', $request->getParameter('id_utilisateur')));

        $this->civilite = $covoitureur->getCivilite();
        $this->nom = $covoitureur->getNom();
        $this->prenom = $covoitureur->getPrenom();

        //Preparation du mail
        $params['subject'] = "Inscription validée Covoiturage+";
        $params['to'] = $covoitureur->getMail();
        $params['from'] = sfConfig::get('sf_mail_envoi');
        $params["identifiant"] = $covoitureur->getMail();
        $params["password"] = $covoitureur->getMotDePasse();



        //envoi mail
        $outil = New Util();
        $outil->envoi_mail($this, "mailInscriptionInfo", $params);

        //envoi du mail au covoitureur
    }

    //apres creation d'un covoitureur, afficahge d'un message et connexion direct au compte
    //pour covoitureur sans Mail
    public function executeCovoitCreateSsMail(sfWebRequest $request) {
        $id_utilisateur = $request->getParameter('id_utilisateur');

        //envoi du mail auxadministrateurs
    }

    /*     * *************************************************************** */
    /*   Methode liées à la modification du profil d'un covoitureur    */
    /*     * *************************************************************** */

    /*
     * fonctions liées visualisation et mise à jour des données covoitureurs
     *   => modification du profil
     */

    public function executeCovoitureurEdit(sfWebRequest $request) {
//

        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));

//date
        $now = date("Ymd H:i:s");
        $covoitureur->setDateCreation($now);

        $this->form = new CovoitureurProfilFrontForm($covoitureur);
    }

    /*
     * fonctions liées visualisation et mise à jour des données covoitureurs
     *   => modification du profil
     */

    public function executeCovoitureurEditProfil(sfWebRequest $request) {

        //recupération de l'id du covoitureur
        $id_utilisateur = $this->getUser()->getAttribute('id_covoitureur');

        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur)), sprintf('Object covoitureur does not exist (%s).', $id_utilisateur));

        //tableau des parametres passé en autocomplétion
        $this->tab_covoitureur_autoc = array();
        $this->tab_covoitureur_autoc['ville'] = $this->covoitureur->getVille();
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['etablissement'] = $this->covoitureur->getCpEtablissement()->getNomEtablissementRaisonSocialeId();

        $this->form = new CovoitureurProfilFrontForm($this->covoitureur);

        //traitement de l'annee de naissance
        $annee_naissance = substr($this->covoitureur->getDateNaissance(), 0, 4);
        $this->form->setDefault('annee_naissance', $annee_naissance);

        //covoitureur
        //$this->covoitureur = $covoitureur;
    }

    /*
     * update du profil covoitureur
     */

    public function executeCovoitureurUpdateProfil(sfWebRequest $request) {
        //recupération de l'id du covoitureur
        $id_utilisateur = $this->getUser()->getAttribute('id_covoitureur');
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur)), sprintf('Object covoitureur does not exist (%s).', $id_utilisateur));
        $this->form = new CovoitureurProfilFrontForm($this->covoitureur);

        //tableau des parametres passé en autocomplétion
        //$this->tab_covoitureur_autoc = array();
        //$this->tab_covoitureur_autoc['ville'] = $covoitureur->getVille();

        $formnew = $request->getParameter('covoitureurFront');

        //tableau des parametres passé en autocomplétion
        $this->tab_covoitureur_autoc = array();
        $this->tab_covoitureur_autoc['ville'] = $formnew['ville'];
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['etablissement'] = $formnew['etablissement'];

        $this->processCovoitureurForm($request, $this->form);

        $this->setTemplate('covoitureurEditProfil');
    }

    public function executeCovoitureurView(sfWebRequest $request) {
//

        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));
        $this->covoitureur = $covoitureur;
    }

    /*
      public function executeCovoitureurUpdate(sfWebRequest $request) {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));
      $this->form = new CovoitureurProfilFrontForm($covoitureur);

      $this->processCovoitureurForm($request, $this->form);

      $this->setTemplate('edit');
      }
     * 
     */

    public function executeCovoitureurDeleteProfil(sfWebRequest $request) {

        //recupération de l'id du covoitureur
        $id_utilisateur = $this->getUser()->getAttribute('id_covoitureur');

        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur)), sprintf('Object covoitureur does not exist (%s).', $id_utilisateur));

        $covoitureur->setEtatInactifCovoitureur();
        $covoitureur->save();

        //message de type flash (session)
        $this->getUser()->setFlash('notice', sfConfig::get('app_covoit_supp_profil_msg'));

        //redirection vers deconnexion
        $this->forward('covoitureur', 'monCompteDeconnexion');
    }

    protected function processCovoitureurForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $annee_naissance = $form->getValue('annee_naissance');

            $covoitureur = $form->save();

            //date
            $now = date("Y-m-d H:i:s");

            $covoitureur->setDateModification($now);

            
            //gestion de l'établissement
            if ( $form->getValue('etablissement') != '') {

                $outil = New Util();
                
                //extraction des informations entre parenthese de l'établissement  (id de l'etab)
                $etabExtraitId = $outil->extractIdCpEtablissement($form->getValue('etablissement'));
                
                $this->etabId = $etabExtraitId;
                
                $covoitureur->setCpEtablissementId($etabExtraitId);
                                
            }else{
                $covoitureur->setCpEtablissementId(0);
            }

            //mise à jour de la date de naissance
            $covoitureur->setDateNaissance($annee_naissance . '-01-01');
            $covoitureur->save();
            //Test PSA
            if ($covoitureur->getCpEtablissementId() == sfConfig::get('sf_id_etablissement_psa')) {
                $this->getUser()->setAttribute('Psa', '1');
            } else {
                $this->getUser()->setAttribute('Psa', '0');
            }
            
            $this->getUser()->setFlash('notice', sprintf('Votre compte vient d\'être modifié.'));

            $this->redirect('covoitureur/covoitureurEditProfil');
        }
    }

    /*     * ************************************************************** */
    /*   Methode liées à la visualisation des menus du profil covoitureur    */
    /*     * ************************************************************** */

    public function executeMonCompteTrajets(sfWebRequest $request) {
        //redirection vers la fonction trajet
        $this->redirect('trajet/listeTrajetCovoitureur');
    }

    /*     * ************************************************************** */
    /*   Methode liées à la visualisation des actions liée au covoitureur    */
    /*     * ************************************************************** */

    /*
     * fonctions liées à la sélection, mise à jour
     * des véhicules du covoitureur
     */

    public function executeMonCompteVehicules(sfWebRequest $request) {
        $covoitureur_vehicule_list = new CovoitureurVehicule();

        $this->covoitureur_vehicule_liste = $covoitureur_vehicule_list->getListeVehicule($this->getUser()->getAttribute('id_covoitureur'));



//compteur du nombre de résultat retourné pour la  liste des véhicules
        $this->comptVehiList = count($this->covoitureur_vehicule_list);

//passage de l'id utilisateur
        $this->id_utilisateur = $request->getParameter('id_utilisateur');
    }

//création d'un nouveau véhicule
    public function executeNewVehicule(sfWebRequest $request) {
        //insertion des données initiales à l'enregistrement
        // cle => generée
        //etat => 1
        //date => date du jour

        $covoitvehicule = new CovoitureurVehicule();

        //génération de la clé
        $cle = new Util();
        $covoitvehicule->setCle($cle->genereCle('', ''));

        //génération de l'état
        $covoitvehicule->setEtat(1);

        //indication de l'utilisateur
        $covoitvehicule->setIdUtilisateur($this->getUser()->getAttribute('id_covoitureur'));

        //génération de la date du jour
        $covoitvehicule->setDateCreation(date("Y-m-d H:m:s"));

        $this->form = new CovoitureurVehiculeFrontForm($covoitvehicule);

        //recuperation de l'id covoitureur
        //$this->id_utilisateur = $request->getParameter('id_utilisateur');
    }

    public function executeCreateVehicule(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CovoitureurVehiculeFrontForm();

        $this->processVehiculeForm($request, $this->form);

        $this->setTemplate('newVehicule');
    }

    public function executeUpdateVehicule(sfWebRequest $request) {

        //ré&cupération du paramètre de véhicule
        $formnew = $request->getParameter('covoitureur_vehicule');
        $id_vehicule = $formnew['id_vehicule'];

        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($id_vehicule)), sprintf('Object covoitureur_vehicule does not exist (%s).', $request->getParameter('id_vehicule')));
        $this->form = new CovoitureurVehiculeFrontForm($covoitureur_vehicule);

        $this->processVehiculeForm($request, $this->form);

        $this->setTemplate('editVehicule');
    }

//édition d'un  véhicule
    public function executeEditVehicule(sfWebRequest $request) {
        //$this->forward('default', 'module');
        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($request->getParameter('id_vehicule'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_vehicule')));
        $this->form = new CovoitureurVehiculeFrontForm($covoitureur_vehicule);
    }

//suppression d'un  véhicule
    public function executeDeleteVehicule(sfWebRequest $request) {
        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($request->getParameter('id_vehicule'))), sprintf('Object covoitureur_vehicule does not exist (%s).', $request->getParameter('id_vehicule')));
        $covoitureur_vehicule->delete();

        $this->redirect('covoitureur/monCompteVehicules');
    }

    protected function processVehiculeForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $covoitureur_vehicule = $form->save();

            //date
            $now = date("Y-m-d H:i:s");

            $covoitureur_vehicule->setDateCreation($now);

            $covoitureur_vehicule->setEtat(1);

            $covoitureur_vehicule->save();

            $this->getUser()->setFlash('notice', sprintf('Votre véhicule vient d\'être enregistré.'));
            $this->redirect('covoitureur/editVehicule?id_vehicule=' . $covoitureur_vehicule->getIdVehicule());
        }
    }

    public function executeListVehiculeModeleParMarque(sfWebRequest $request) {
        //passage de la marque du véhicule
        $this->idmarque = $request->getParameter('idmarque');

        //passage du nom et id du composant formulaire
        $this->idComposantForm = $request->getParameter('idComposantForm');
        $this->nomComposantForm = $request->getParameter('nomComposantForm');

        $this->setLayout(false);
    }

    /*     * ********************************************************************** */
    /*                    Identification et Mon Compte                       */
    /*     * ********************************************************************** */

    // méthode permettant la connexion et la vérification du covoitureur
    public function executeTestIdent(sfWebRequest $request) {

        //récupération de l'url pour redirection vers la nouvelle page
        $this->getUser()->setAttribute('urlFrom', $request->getReferer());

        $this->form = new CovoitureurIdentificationForm();
        $this->test = 'NOK';
        $this->id = 0;

        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {

            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {

                $formnew = $request->getParameter('CovoitureurIdentification');

                $covoitureur_id = Doctrine_Core::getTable('Covoitureur')->getCovoitureurIdentification($formnew['mail'], $formnew['mot_de_passe']);
                //$this->test = 'OK';
                $this->test = $formnew['mot_de_passe'];
                $this->id = $covoitureur_id;

                if ($covoitureur_id != 0) {
                    $this->getUser()->setAttribute('id_covoitureur', $covoitureur_id);

                    //Test PSA
                    $covoitureur = Doctrine_Core::getTable('Covoitureur')->find($covoitureur_id);
                    if ($covoitureur->getCpEtablissement()->getCpEtablissementEtablissementPereId() == sfConfig::get('sf_id_etablissement_psa_RS')) {
                        $this->getUser()->setAttribute('Psa', '1');
                    } else {
                        $this->getUser()->setAttribute('Psa', '0');
                    }

                    //redirection vers la page initiale
                    //$this->redirect($this->getUser()->getAttribute('urlFrom')? $this->getUser()->getAttribute('urlFrom') : 'homepage');
                } else {
                    $this->message_erreur = sfConfig::get('app_ident_mesg_erreur');
                }
            } else {
                $this->message_erreur = sfConfig::get('app_ident_mesg_erreur');
            }
        }
    }

    // méthode permettant la deconnexion  du covoitureur
    public function executeMonCompteDeconnexion(sfWebRequest $request) {

        $this->getUser()->getAttributeHolder()->remove('id_covoitureur');
        $this->id = $this->getUser()->getAttribute('id_covoitureur');

        //redirection vers la home page    
        $this->redirect('homepage');
    }

    //demande de mot de passe oublié    
    public function executeFormMdpOublie(sfWebRequest $request) {

        $this->form = new CovoitureurMdpOublieForm();
    }

    //gestion de la demande de mot de passe oublié    
    public function executeEnvoiMdpOublie(sfWebRequest $request) {

        $this->form = new CovoitureurMdpOublieForm();

        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {

            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {

                //récupération des informations du covoitureur
                $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->findCovoitureurByMail($this->form->getValue('mail')), sprintf('Object covoitureur does not exist (%s).', $this->getUser()->getAttribute('id_covoitureur')));


                //regenération d'un mot de passe
                $outil = new Util();
                $mdp = $outil->genereMotDePasse(8);

                //enregistrement du nouveau mot de passe en base
                $covoitureur->setMotDePasse($mdp);
                $covoitureur->save();

                //envoi du mail avec nouveau mot de passe 
                //Preparation du mail
                $params['subject'] = "Mot de passe oublié";
                $params['to'] = $covoitureur->getMail();
                $params['from'] = sfConfig::get('sf_mail_envoi');
                $params["identifiant"] = $covoitureur->getMail();
                $params["password"] = $mdp;



                //envoi mail
                //$outil = New Util();
                $outil->envoi_mail($this, "mailMdpOublie", $params);
            }
        }
        //$this->setTemplate('formMdpOublie');
    }

    //demande de modification de mot de passe oublié    
    public function executeFormMdpModif(sfWebRequest $request) {

        $this->form = new CovoitureurMdpModifForm();
    }

    //gestion de la demande de mot de passe oublié    
    public function executeUpdateMdpModif(sfWebRequest $request) {

        $this->form = new CovoitureurMdpModifForm();

        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {

            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {

                //enregistrement du nouveau mot de passe en base
                //recupération de l'id du covoitureur
                $id_utilisateur = $this->getUser()->getAttribute('id_covoitureur');

                $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur)), sprintf('Object covoitureur does not exist (%s).', $id_utilisateur));
                $covoitureur->setMotDePasse($this->form->getValue('mot_de_passe_new'));
                $covoitureur->save();

                $this->redirect('covoitureur/covoitureurEditProfil');
            }
        }
        $this->setTemplate('formMdpModif');
    }

    /*     * *********************************************************** */

    public function executeAutocompleteVille(sfWebRequest $request) {

        $ville = new VilleFr;
        $this->results = $ville->getVilleAutocomplet($request->getParameter('q'));
        $this->setLayout(false);
    }

    //récupère la liste des modeles d'un véhicule pour une marque fournie
    public function executeListeModeleVehicule(sfWebRequest $request) {

        $vehicule_modeles = new VehiculeModele();
        $this->results = $vehicule_modeles->getVehiculeModeleListe($request->getParameter('q'));
        $this->setLayout(false);
    }

    // méthode permettant la deconnexion  du covoitureur
    public function executePsa(sfWebRequest $request) {

        $this->getUser()->setAttribute('Psa', '1');

        //redirection vers la home page    
        $this->redirect('homepage');
    }

}
