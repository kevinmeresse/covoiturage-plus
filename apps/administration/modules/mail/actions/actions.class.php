<?php

/**
 * mail actions.
 *
 * @package    roulezmailn_v3
 * @subpackage mail
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeNewMerMail(sfWebRequest $request) {
        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_covoitureur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_covoitureur')));

        $this->form = new MailForm();
        /*
          $this->form->setDefault('id_trajet',$this->id_trajet);
          $this->form->setDefault('id_covoitureur',$this->id_covoitureur);
         */
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->id_covoitureur = $request->getParameter('id_covoitureur');
        $this->mail_covoitureur = $request->getParameter('mail_covoitureur');

        $this->form->setDefault('id_trajet', $this->id_trajet);
        $this->form->setDefault('id_covoitureur', $this->id_covoitureur);
        $this->form->setDefault('mail_covoitureur', $this->mail_covoitureur);
        $this->form->setDefault('mail_subject', sfConfig::get('app_new_mer_mail_subject'));
        $this->form->setDefault('texte', sfConfig::get('app_new_mer_mail_texte'));

        $this->setLayout('layout-popup');
    }
    
    /*
     * creation d'un mail à partir d'une MER
     */

    public function executeCreateNewMerMail(sfWebRequest $request) {


        $formnew = $request->getParameter('mail');

        $this->forward404Unless($this->id_trajet = $formnew['id_trajet']);
        $this->forward404Unless($this->id_covoitureur = $formnew['id_covoitureur']);
        $this->forward404Unless($this->mail_covoitureur = $formnew['mail_covoitureur']);


        /*
          //vérification de la présence de message
          if ($formnew['mail_covoitureur'] == '' || $formnew['mail_covoitureur'] == null) {
          $this->form = new MailForm();
          $this->form->setDefault('id_trajet', $this->id_trajet);
          $this->form->setDefault('id_covoitureur', $this->id_covoitureur);
          $this->form->setDefault('mail_covoitureur', $this->mail_covoitureur);
          }
         * *
         */
        $this->form = new MailForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('newMerMail');
    }
    
    /**
     * creation d'un mail à partir d'une action auto générée 
     *
     * @param sfRequest $request A request object
     */
    public function executeNewMailAction(sfWebRequest $request) {
        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_covoitureur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_covoitureur')));

        $this->form = new MailActionForm();
 
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->id_covoitureur = $request->getParameter('id_covoitureur');
        $this->mail_covoitureur = $request->getParameter('mail_covoitureur');


        $this->form->setDefault('routageModule', $request->getParameter('routageModule'));
        $this->form->setDefault('routageAction', $request->getParameter('routageAction'));
        $this->form->setDefault('id_equipage', $request->getParameter('id_equipage'));
        $this->form->setDefault('id_trajet', $this->id_trajet);
        $this->form->setDefault('id_covoitureur', $this->id_covoitureur);
        $this->form->setDefault('cp_type_action_id', $request->getParameter('cp_type_action_id'));
        $this->form->setDefault('cp_type_action_statut_id', $request->getParameter('cp_type_action_statut_id'));
        $this->form->setDefault('id_statut_init', $request->getParameter('id_statut_init'));

        $this->form->setDefault('mail_covoitureur', $this->covoitureur->getMail());
        $this->form->setDefault('mail_subject', sfConfig::get('app_new_mer_mail_subject'));
        $this->form->setDefault('texte', sfConfig::get('app_new_mer_mail_texte'));

        $this->setLayout('layout-popup');
    }
    
    
     /*
     * creation d'un mail à partir d'une action (equipage)
     */

    public function executeCreateNewMailAction(sfWebRequest $request) {


        $formnew = $request->getParameter('mailaction');

        $this->forward404Unless($this->id_trajet = $formnew['id_trajet']);
        $this->forward404Unless($this->id_covoitureur = $formnew['id_covoitureur']);
        $this->forward404Unless($this->mail_covoitureur = $formnew['mail_covoitureur']);


        $this->form = new MailActionForm();

        $this->processFormMailAction($request, $this->form);

        $this->setTemplate('newMailAction');
    }
    

    /*
     * annulation d'un mail à partir d'une action (equipage)
     */

    public function executeCreateNewMailActionAnnul(sfWebRequest $request) {


        $formnew = $request->getParameter('mailaction');

        //generation du message pour l'utilisateur
        $this->getUser()->setFlash('notice', sprintf(sfConfig::get('sf_message_action_annule')));
 

        $this->redirect($formnew['routageModule'].'/'.$formnew['routageAction'].'?popup=1&id_equipage='.$formnew['id_equipage']);
    }
    
    /*
     * mail envoyé correctement
     */

    public function executeMail(sfWebRequest $request) {
        $this->setLayout('layout-popup');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            //Preparation du mail         
            
            //récupération des informations du covoitureur 
            $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($form->getValue('id_covoitureur')), sprintf('Object covoitureur does not exist (%s).', $form->getValue('id_covoitureur')));

            $params['subject'] = $form->getValue('mail_subject');
            $params['to'] = $covoitureur->getMail();
            $params['from'] = sfConfig::get('sf_mail_envoi');
            $params["message"] = $form->getValue('texte');

            //envoi mail
            $outil = New Util();
            $outil->envoi_mail($this, "mailRelanceCovoiturage", $params);

            //enregistrement dans action
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");
            
            //date future (+15 jours)
        
            $dateEcheance = date("Y-m-d H:i:s",strtotime("+15 day"));
            
            $newAction = new CpActionCv();
            $newAction->setCpActionCvDateCreation($now);
            $newAction->setCpActionCvDateModification($now);
            $newAction->setCpActionCvDateEcheance($dateEcheance);
            $newAction->setCpActionCvDetail("Relance par mail : ".$form->getValue('texte'));
            $newAction->setCpActionCvCovoitureurId($form->getValue('id_covoitureur'));
            $newAction->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());
            $newAction->setCpActionCvCpTypeActionId(3);
            
            $newAction->save();

            $this->redirect('mail/mail');
            //$this->setTemplate('mail');
        }
    }
    
    //process pour les mail venanty des cations
    protected function processFormMailAction(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            //Preparation du mail         
            
            //récupération des informations du covoitureur 
            $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($form->getValue('id_covoitureur')), sprintf('Object covoitureur does not exist (%s).', $form->getValue('id_covoitureur')));

            $params['subject'] = $form->getValue('mail_subject');
            $params['to'] = $form->getValue('mail_covoitureur');
            $params['from'] = sfConfig::get('sf_mail_envoi');
            $params["message"] = $form->getValue('texte');

            //envoi mail
            $outil = New Util();
            $outil->envoi_mail($this, "mailRelanceCovoiturage", $params);
            
            
            //redirection pour la création de l'action
            $this->redirect('cp_action_cv/createAutoApresMail?popup=1&id_equipage=' . $form->getValue('id_equipage')
                            .'&id_covoitureur='.$form->getValue('id_covoitureur')
                            .'&id_trajet='.$form->getValue('id_trajet')
                            .'&cp_type_action_id='.$form->getValue('cp_type_action_id')
                            .'&cp_type_action_statut_id='.$form->getValue('cp_type_action_statut_id')
                            .'&id_statut_init='.$form->getValue('id_statut_init')
                            );


        }
    }

}
