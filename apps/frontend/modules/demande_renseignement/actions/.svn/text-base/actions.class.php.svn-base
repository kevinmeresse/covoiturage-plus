<?php

/**
 * demande_renseignement actions.
 *
 * @package    roulezmailn_v3
 * @subpackage demande_renseignement
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class demande_renseignementActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->form = new DemandeRenseignementForm();
    }

    public function executeShow(sfWebRequest $request) {
        $this->demande_renseignement = Doctrine_Core::getTable('DemandeRenseignement')->find(array($request->getParameter('demande_renseignement_id')));
        $this->forward404Unless($this->demande_renseignement);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new DemandeRenseignementForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new DemandeRenseignementForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('index');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($demande_renseignement = Doctrine_Core::getTable('DemandeRenseignement')->find(array($request->getParameter('demande_renseignement_id'))), sprintf('Object demande_renseignement does not exist (%s).', $request->getParameter('demande_renseignement_id')));
        $this->form = new DemandeRenseignementForm($demande_renseignement);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($demande_renseignement = Doctrine_Core::getTable('DemandeRenseignement')->find(array($request->getParameter('demande_renseignement_id'))), sprintf('Object demande_renseignement does not exist (%s).', $request->getParameter('demande_renseignement_id')));
        $this->form = new DemandeRenseignementForm($demande_renseignement);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($demande_renseignement = Doctrine_Core::getTable('DemandeRenseignement')->find(array($request->getParameter('demande_renseignement_id'))), sprintf('Object demande_renseignement does not exist (%s).', $request->getParameter('demande_renseignement_id')));
        $demande_renseignement->delete();

        $this->redirect('demande_renseignement/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $demande_renseignement = $form->save();
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");
            //mise à jour de la date de modification
            $demande_renseignement->setDemandeRenseignementDateInsert($now);
            //Mise à jour du site client
            //A passer en dynamique
            $demande_renseignement->setIdSiteClient(sfConfig::get('sf_id_site_client'));
            $demande_renseignement->save();
            //envoi du mail
          
            
            //Preparation du mail
            $params['subject'] = "Demande de renseignement";
            $params['to'] = "covoiturageplus@covoiturage.asso.fr";
            $params['from'] = sfConfig::get('sf_mail_envoi');
            $params["demandeRenseignementCivilite"] = $demande_renseignement->getDemandeRenseignementCivilite();
            $params["demandeRenseignementNom"] = $demande_renseignement->getDemandeRenseignementNom();
            $params["demandeRenseignementPrenom"] = $demande_renseignement->getDemandeRenseignementPrenom();
            $params["demandeRenseignementSociete"] = $demande_renseignement->getDemandeRenseignementSociete();
            $params["demandeRenseignementCp"] = $demande_renseignement->getDemandeRenseignementCp();
            $params["demandeRenseignementVille"] = $demande_renseignement->getDemandeRenseignementVille();
            $params["demandeRenseignementPays"] = $demande_renseignement->getDemandeRenseignementPays();
            $params["demandeRenseignementTelephone"] = $demande_renseignement->getDemandeRenseignementTelephone();
            $params["demandeRenseignementEmail"] = $demande_renseignement->getDemandeRenseignementEmail();
            $params["demandeRenseignementTexte"] = $demande_renseignement->getDemandeRenseignementTexte();
            
            
            
            
            $outil = New Util();
            $outil->envoi_mail($this, "mailDemandeRenseignement", $params);
            $this->redirect('demande_renseignement/new');
        }
    }

}
