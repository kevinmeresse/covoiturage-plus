<?php

/**
 * cp_action_ctc actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_action_ctc
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_action_ctcActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->cp_action_ctcs = Doctrine_Core::getTable('CpActionCtc')
                        ->createQuery('a')
                        ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CpActionCtcForm();
    }

    /*
     * fonction de création d'une action liée à un contact précis
     */

    public function executeNewCtc(sfWebRequest $request) {

        /*
         * recuperation de l'id et du nom dcontact
         */
        //$this->etb = $request->getParameter('etb');
        $cp_contact = Doctrine_Core::getTable('CpContact')->find(array($request->getParameter('ctc')));

        $this->actionCtc = new CpActionCtc();
        $this->actionCtc->setCpActionCtcCpContactId($request->getParameter('ctc'));

        //gestion de la date
        $now = date("Ymd H:i:s");
        $this->actionCtc->setCpActionCtcDateCreation($now);
        $this->actionCtc->setCpActionCtcDateModification($now);


        //$this->form = new CpActionEtb1Form(null, array('id_etb' => $request->getParameter('etb')));
        $this->form = new CpActionCtc1Form($this->actionCtc);

        $this->ctc_name = $cp_contact['cp_contact_nom'] . " " . $cp_contact['cp_contact_prenom'];
        $this->ctc_id = $cp_contact['cp_contact_id'];
        $this->ctc_value = $request->getParameter('ctc');

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

        $this->form = new CpActionCtcForm();
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeCreate1(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpActionCtc1Form();
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processFormCtc1($request, $this->form);

        $this->setTemplate('new1');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));
        $this->form = new CpActionCtcForm($cp_action_ctc);
    }

    public function executeEditCtc(sfWebRequest $request) {
        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));
        //gestion de la date
        $now = date("Ymd H:i:s");
        $cp_action_ctc->setCpActionCtcDateModification($now);

        $this->form = new CpActionCtc1Form($cp_action_ctc);

        //retourne l'id et le nom du contact
        $this->ctc_name = $cp_action_ctc->getCpContact()->getCpContactNom() . " " . $cp_action_ctc->getCpContact()->getCpContactPrenom();
        $this->ctc_id = $cp_action_ctc->getCpContact()->getCpContactId();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //$this->setTemplate('edit');
    }

    //visualisation de l'action
    public function executeVisuCtc(sfWebRequest $request) {
        $this->forward404Unless($this->cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));


        //retourne l'id et le nom du contact
        $this->ctc_name = $this->cp_action_ctc->getCpContact()->getCpContactNom() . " " . $this->cp_action_ctc->getCpContact()->getCpContactPrenom();
        $this->ctc_id = $this->cp_action_ctc->getCpContact()->getCpContactId();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));
        $this->form = new CpActionCtcForm($cp_action_ctc);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        //retourne l'id et le nom du contact
        $this->ctc_name = $cp_action_ctc->getCpContact()->getCpContactNom() . " " . $cp_action_ctc->getCpContact()->getCpContactPrenom();
        $this->ctc_id = $cp_action_ctc->getCpActionCtcCpContactId();



        $this->setTemplate('edit');
    }

    public function executeUpdate1(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));
        $this->form = new CpActionCtc1Form($cp_action_ctc);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processFormCtc1($request, $this->form);

        $this->setTemplate('editCtc');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));
        $cp_action_ctc->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = sfConfig::get('app_mess_supp_action_ctc');

        $this->setTemplate('suppCtc');

        //$this->redirect('cp_action_ctc/index');
    }

    public function executeDelete1(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_action_ctc = Doctrine_Core::getTable('CpActionCtc')->find(array($request->getParameter('cp_action_ctc_id'))), sprintf('Object cp_action_ctc does not exist (%s).', $request->getParameter('cp_action_ctc_id')));

        //recupération de l'id du contact
        $ctc_id = $cp_action_ctc->getCpActionCtcCpContactId();

        $cp_action_ctc->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = sfConfig::get('app_mess_supp_action_ctc');

        $this->setTemplate('suppCtc');

        //$this->redirect('cp_action_ctc/index');
        //redirection vers la page contact
        //$this->redirect('cp_contact/editEtb?cp_contact_id=' . $ctc_id);
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_action_ctc = $form->save();

            //$this->redirect('cp_action_ctc/edit?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->redirect('cp_action_ctc/visuCtc?popup=1&cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            } else {
                $this->redirect('cp_action_ctc/visuCtc?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            }
        }
    }

    protected function processFormCtc1(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $cp_action_ctc = $form->save();

            //$this->redirect('cp_action_ctc/editCtc?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->redirect('cp_action_ctc/visuCtc?popup=1&cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            } else {
                $this->redirect('cp_action_ctc/visuCtc?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId());
            }
        }
    }

}
