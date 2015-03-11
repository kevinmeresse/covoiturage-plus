<?php

/**
 * cp_action_etb actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_action_etb
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_action_etbActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->cp_action_etbs = Doctrine_Core::getTable('CpActionEtb')
                        ->createQuery('a')
                        ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CpActionEtbForm();
    }

    public function executeNewEtb(sfWebRequest $request) {

        /*
         * recuperation de l'id et du nom de l'établissement
         */
        //$this->etb = $request->getParameter('etb');
        $cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('etb')));

        $this->actionEtb = new CpActionEtb();
        $this->actionEtb->setCpActionEtbCpEtablissementId($request->getParameter('etb'));

        //gestion de la date
        $now = date("Ymd H:i:s");

        $this->actionEtb->setCpActionEtbDateCreation($now);
        $this->actionEtb->setCpActionEtbDateModification($now);


        //$this->form = new CpActionEtb1Form(null, array('id_etb' => $request->getParameter('etb')));
        $this->form = new CpActionEtb1Form($this->actionEtb);
        
        //différenciation en fonction de la provenance
        if($request->getParameter('prov') && $request->getParameter('prov') == 'rs'){
            $this->etb_name = $cp_etablissement['cp_etablissement_raison_social'];
            $this->prov = $request->getParameter('prov');
        }else{
            $this->etb_name = $cp_etablissement['cp_etablissement_etablissement_nom'];
            $this->prov = 'etb';
        }

        //$this->etb_name = $cp_etablissement['cp_etablissement_etablissement_nom'];
        $this->etb_id = $cp_etablissement['cp_etablissement_id'];
        $this->etb_value = $request->getParameter('etb');

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }


        $this->setTemplate('newEtb');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpActionEtbForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeCreateEtb(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpActionEtb1Form();

        $this->processFormEtb($request, $this->form);

        $this->setTemplate('newEtb');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));

        //gestion de la date
        $now = date("Ymd H:i:s");

        $this->actionEtb->setCpActionEtbDateModification($now);


        $this->form = new CpActionEtbForm($cp_action_etb);
    }

    public function executeEditEtb(sfWebRequest $request) {
        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));

        //gestion de la date
        $now = date("Ymd H:i:s");
        $cp_action_etb->setCpActionEtbDateModification($now);


        $this->form = new CpActionEtb1Form($cp_action_etb);

        //indication du nom de l'établissement pour affichage dans le formulaire (form1)
        //différenciation en fonction de la provenance
        if($request->getParameter('prov') && $request->getParameter('prov') == 'rs'){
            $this->etb_name = $cp_action_etb->getCpEtablissement()->getCpEtablissementRaisonSocial();
            $this->prov = $request->getParameter('prov');
        }else{
            $this->etb_name = $cp_action_etb->getCpEtablissement()->getCpEtablissementEtablissementNom()." (".$cp_action_etb->getCpEtablissement()->getRSEtablissementRaisonSociale().")";
            $this->prov = 'etb';
        }
        //$this->etb_name = $cp_action_etb->getCpEtablissement()->getCpEtablissementEtablissementNom();

        //indication du id de l'établissement pour affichage dans le formulaire (form1)
        $this->etb_id = $cp_action_etb->getCpActionEtbCpEtablissementId();

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
        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));
        $this->form = new CpActionEtbForm($cp_action_etb);



        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

         $this->processForm($request, $this->form);


        $this->setTemplate('edit');
    }

    public function executeUpdateEtb(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));
        $this->form = new CpActionEtb1Form($cp_action_etb);

        

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processFormEtb($request, $this->form);


        $this->setTemplate('editEtb');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));
        $cp_action_etb->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //$this->redirect('cp_action_etb/index');

        $this->message = sfConfig::get('app_mess_supp_action_etb');

        $this->setTemplate('suppEtb');
    }

    public function executeDelete1(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_action_etb = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));

        //recupération de l'id de l'établissement
        $ctc_id = $cp_action_etb->getCpActionEtbCpEtablissementId();

        $cp_action_etb->delete();

        //$this->redirect('cp_action_etb/index');
        //redirection vers l'edition de l'établissement

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        $this->message = sfConfig::get('app_mess_supp_action_etb');

        $this->setTemplate('suppEtb');

        //$this->redirect('cp_etablissement/edit?cp_etablissement_id=' . $ctc_id);
    }

    /*
     * visualisation de la fiche action pour l'etablissement
     */

    public function executeVisuEtb(sfWebRequest $request) {
        $this->forward404Unless($this->cp_action_etb
                = Doctrine_Core::getTable('CpActionEtb')->find(array($request->getParameter('cp_action_etb_id'))), sprintf('Object cp_action_etb does not exist (%s).', $request->getParameter('cp_action_etb_id')));

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        if($request->getParameter('prov') && $request->getParameter('prov') == 'rs'){
            $this->prov = $request->getParameter('prov');
        }else{
            $this->prov = 'etb';
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_action_etb = $form->save();
               if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                   $this->redirect('cp_action_etb/visu?popup=1&cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId());
               }else{
                   $this->redirect('cp_action_etb/visu?cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId());
               }

        }
    }

    protected function processFormEtb(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_action_etb = $form->save();
            
        /*         * ************************************* */
        /*   creation de l'action pour le contact associé  */
        /*         * ************************************* */
        $actionCt = new CpActionCtc();

        //gestion de la date de modification et de la date de création            
        $now = date("Y-m-d H:i:s");
        
        //gestion de la date de modification
        $actionCt->setCpActionCtcDateCreation($now);
        $actionCt->setCpActionCtcDateModification($now);
        $actionCt->setCpActionCtcDateEcheance($cp_action_etb->getCpActionEtbDateEcheance());
        
        $actionCt->setCpActionCtcCpContactId($cp_action_etb->getCpActionEtbCpContactId());
        
        
        $actionCt->setCpActionCtcCpTypeActionId($cp_action_etb->getCpActionEtbCpTypeActionId());
        $actionCt->setCpActionCtcDetail($cp_action_etb->getCpActionEtbDetail());

        $actionCt->setCpActionCtcUserId($this->getUser()->getGuardUser()->getId());


        $actionCt->save();

            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                   $this->redirect('cp_action_etb/visuEtb?popup=1&cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId());
               }else{
                   $this->redirect('cp_action_etb/visuEtb?cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId());
               }

            //$this->redirect('cp_action_etb/editEtb?cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId());
        }
    }

}
