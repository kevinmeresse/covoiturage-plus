<?php

/**
 * cp_contact actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_contact
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_contactActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->cp_contacts = Doctrine_Core::getTable('CpContact')
                        ->createQuery('a')
                        ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CpContactForm();
    }

    public function executeNewEtb(sfWebRequest $request) {

        /*
         * recuperation de l'id et du nom de l'établissement
         */
        //$this->etb = $request->getParameter('etb');
        $cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('etb')));

        $this->contactEtb = new CpContact();
        $this->contactEtb->setCpContactCpEtablissementId($request->getParameter('etb'));

        //gestion de la date
        $now = date("Ymd H:i:s");

        $this->contactEtb->setCpContactDateCreation($now);
        $this->contactEtb->setCpContactDateModification($now);


        //$this->form = new CpActionEtb1Form(null, array('id_etb' => $request->getParameter('etb')));
        $this->form = new CpContactEtbForm($this->contactEtb);
        
        //différenciation en fonction de la provenance
        if($request->getParameter('prov') && $request->getParameter('prov') == 'rs'){
            $this->etb_name = $cp_etablissement['cp_etablissement_raison_social'];
            $this->prov = $request->getParameter('prov');
        }else{
            $this->etb_name = $cp_etablissement['cp_etablissement_etablissement_nom'];
            $this->prov = 'etb';
        }

        
        $this->etb_id = $cp_etablissement['cp_etablissement_id'];
        $this->etb_value = $request->getParameter('etb');

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }


        $this->setTemplate('new1');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpContactForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeCreateEtb(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpContactEtbForm();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processFormEtb($request, $this->form);

        $this->setTemplate('new1');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));
        $this->form = new CpContactForm($cp_contact);

        //retourne l'identifiant du contact pour l'appel au component action
        $this->ctc = $request->getParameter('cp_contact_id');
    }

    public function executeEditEtb(sfWebRequest $request) {
        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));

        //gestion de la date
        $now = date("Ymd H:i:s");
        $cp_contact->setCpContactDateModification($now);

        $this->form = new CpContactEtbForm($cp_contact);

        //retourne l'identifiant du contact pour l'appel au component action
        $this->ctc = $request->getParameter('cp_contact_id');

        //donne le nom de l'etablissement concerné
        //différenciation en fonction de la provenance
        if($request->getParameter('prov') && $request->getParameter('prov') == 'rs'){
            $this->etb_name = $cp_contact->getCpEtablissement()->getCpEtablissementRaisonSocial();
            $this->prov = $request->getParameter('prov');
        }else{
            $this->etb_name = $cp_contact->getCpEtablissement()->getCpEtablissementEtablissementNom();
            $this->prov = 'etb';
        }
        //$this->etb_name = $cp_contact->getCpEtablissement()->getCpEtablissementEtablissementNom();

        //indique l'id de l'établissement
        $this->etb_id = $cp_contact->getCpEtablissement()->getCpEtablissementId();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //$this->setTemplate('edit');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));
        $this->form = new CpContactForm($cp_contact);

        $this->processForm($request, $this->form);

        $this->setTemplate('editEtb');
    }

    public function executeUpdateEtb(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));

        //gestion de la date
        $now = date("Ymd H:i:s");
        $cp_contact->setCpContactDateModification($now);

        $this->form = new CpContactEtbForm($cp_contact);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processFormEtb($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));
        $cp_contact->delete();

        $this->redirect('cp_contact/index');
    }

    public function executeDelete1(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact does not exist (%s).', $request->getParameter('cp_contact_id')));

        //récupération de l'id de l'établissement
        $ctc_id = $cp_contact->getCpContactCpEtablissementId();

        $cp_contact->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = sfConfig::get('app_mess_supp_contact_etb');

        $this->setTemplate('suppEtb');

        //redirection vers la page etablissement
        //$this->redirect('cp_etablissement/edit?cp_etablissement_id=' . $ctc_id);
    }

    /*
     * visualisation de la fiche contact pour l'etablissement
     */
    public function executeVisuEtb(sfWebRequest $request) {
        $this->forward404Unless($this->cp_contact_etb
                = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('cp_contact_id'))), sprintf('Object cp_contact_etb does not exist (%s).', $request->getParameter('cp_contact_id')));

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        //switch en tre etablissement et raison sociale
        if ($request->getParameter('prov') && $request->getParameter('prov') == 'rs') {
            $this->prov = $request->getParameter('prov');
        }else{
            $this->prov = 'etb';
        }

        //retourne l'identifiant du contact pour l'appel au component action
        $this->ctc = $request->getParameter('cp_contact_id');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_contact = $form->save();

            $this->redirect('cp_contact/edit?cp_contact_id=' . $cp_contact->getCpContactId());
        }
    }

    protected function processFormEtb(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_contact = $form->save();


            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                    $this->redirect('cp_contact/visuEtb?popup=1&cp_contact_id=' . $cp_contact->getCpContactId());
               }else{
                    $this->redirect('cp_contact/visuEtb?cp_contact_id=' . $cp_contact->getCpContactId());
               }
        }
    }

}
