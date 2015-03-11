<?php

/**
 * cp_action_cv actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_action_cv
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_action_cvActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        if($request->getParameter('id_utilisateur') == 0 || $request->getParameter('id_utilisateur') == null || !$request->getParameter('id_utilisateur')){
            $this->redirect('@homepage');
        }
        $this->id_utilisateur = $request->getParameter('id_utilisateur');
    }

    public function executeNew(sfWebRequest $request) {
        if($request->getParameter('id_utilisateur') == 0 || $request->getParameter('id_utilisateur') == null || !$request->getParameter('id_utilisateur')){
            $this->redirect('@homepage');
        }
        
        $cp_action_cv = new CpActionCv();

        //gestion de la date
        $now = date("Ymd H:i:s");

        $cp_action_cv->setCpActionCvDateCreation($now);
        $cp_action_cv->setCpActionCvDateModification($now);

        $cp_action_cv->setCpActionCvCovoitureurId($request->getParameter('id_utilisateur'));

        $this->form = new CpActionCvForm($cp_action_cv);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //$this->form = new CpActionCvForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpActionCvForm();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        
        $this->forward404Unless($cp_action_cv = Doctrine_Core::getTable('CpActionCv')->find(array($request->getParameter('cp_action_cv_id'))), sprintf('Object cp_action_cv does not exist (%s).', $request->getParameter('cp_action_cv_id')));

        //gestion de la date
        $now = date("Ymd H:i:s");

        //$cp_action_cv->setCpActionCvDateCreation($now);

        $this->form = new CpActionCvForm($cp_action_cv);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_action_cv = Doctrine_Core::getTable('CpActionCv')->find(array($request->getParameter('cp_action_cv_id'))), sprintf('Object cp_action_cv does not exist (%s).', $request->getParameter('cp_action_cv_id')));
        $this->form = new CpActionCvForm($cp_action_cv);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_action_cv = Doctrine_Core::getTable('CpActionCv')->find(array($request->getParameter('cp_action_cv_id'))), sprintf('Object cp_action_cv does not exist (%s).', $request->getParameter('cp_action_cv_id')));
        $cp_action_cv->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //$this->redirect('cp_action_cv/index');
        $this->message = sfConfig::get('app_mess_supp_action_cv');

        $this->setTemplate('suppCv');
    }



    /*
     * visualisation de la fiche action pour l'etablissement
     */

    public function executeVisuCv(sfWebRequest $request) {
        $this->forward404Unless($this->cp_action_cv
                = Doctrine_Core::getTable('CpActionCv')->find(array($request->getParameter('cp_action_cv_id'))), sprintf('Object cp_action_cv does not exist (%s).', $request->getParameter('cp_action_etb_id')));

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }
    
    /*
     * cration d'une action pour le covoitureur à partir du formulaire de l'équipage
     * 
     * il est nécessaire d'avoir un statut et une action
     * 
     * modifie egalement le statut du trajet
     * 
     * parametre recupérés :
     * cp_action_cv_cp_action_cv_trajet_id
     * cp_action_cv_cp_action_cv_covoitureur_id
     * cp_action_cv_cp_type_action_statut_id
     * id_action
     * cp_action_cv_id_equipage (permet de retourner sur la page)
     */
    public function executeCreateAuto(sfWebRequest $request) {
        //recuperation des éléments du formulaire
        $formnew = $request->getParameter('cp_action_cv');
        
        //si type action de type à contacter => retour direct à la page equipage
        if($formnew['cp_type_action_statut_id'] == 1){// cas ou le statut est à contacter => retour à la page appelante sans modification
                $this->redirect('equipage/show?popup=1&id_equipage=' . $formnew['id_equipage']);
            }

        
        
        //récupération de l'action afin de savoir si elle est de type mail 
        // si type mail => routage vers écran mail
        // sinon routage vers écran précédent 
         if(($formnew['cp_action_cv_cp_type_action_id'] != null && $formnew['cp_action_cv_cp_type_action_id'] != '' )){
            $this->forward404Unless($cpTypeAction = Doctrine_Core::getTable('CpTypeAction')->find(array($formnew['cp_action_cv_cp_type_action_id'])), sprintf('Object CpTypeAction does not exist (%s).', $formnew['cp_action_cv_cp_type_action_id']));       
         }
            
         
        if (($formnew['id_equipage'] == null || $formnew['id_equipage'] == '') ||
                ($formnew['cp_action_cv_covoitureur_id'] == null || $formnew['cp_action_cv_covoitureur_id'] == '') ||
                ($formnew['cp_action_cv_trajet_id'] == null || $formnew['cp_action_cv_trajet_id'] == '') ||
                ($formnew['cp_action_cv_cp_type_action_id'] == null || $formnew['cp_action_cv_cp_type_action_id'] == '') ||
                ($formnew['cp_type_action_statut_id'] == null || $formnew['cp_type_action_statut_id'] == '') 
                ){
            //$this->redirect('equipage/show?popup=1&id_equipage=' . $cp_action_cv->getCpActionCvId());
            if(($formnew['id_equipage'] == null || $formnew['id_equipage'] == '')){
                $this->forward404();
            }elseif(($formnew['cp_action_cv_cp_type_action_id'] == null || $formnew['cp_action_cv_cp_type_action_id'] == '')){
                $this->getUser()->setFlash('notice', sprintf(sfConfig::get('sf_message_action_pas_action')));
                $this->redirect('equipage/show?popup=1&id_equipage=' . $formnew['id_equipage']);
                
            }else{ //redirection vers la meme page appelante sans modification
                $this->redirect('equipage/show?popup=1&id_equipage=' . $formnew['id_equipage']);
                //$this->forward404();
            }
            
        }else{ //traitement de l'action
            if($formnew['cp_type_action_statut_id'] == 1){// cas ou le statut est à contacter => retour à la page appelante sans modification
                $this->redirect('equipage/show?popup=1&id_equipage=' . $formnew['id_equipage']);
            }else{ // traitement d'une nouvelle action pour le covoitureur sur ce trajet
                
                
                
                //redirect-ion vers page mail si action de type mail 
                if($cpTypeAction->getCpTypeActionTypeMail() == 1){
                    $this->redirect('mail/newMailAction?routageModule=equipage&routageAction=show&popup=1&id_equipage=' . $formnew['id_equipage']
                            .'&id_covoitureur='.$formnew['cp_action_cv_covoitureur_id']
                            .'&id_trajet='.$formnew['cp_action_cv_trajet_id']
                            .'&cp_type_action_id='.$formnew['cp_action_cv_cp_type_action_id']
                            .'&cp_type_action_statut_id='.$formnew['cp_type_action_statut_id']
                            .'&id_statut_init='.$formnew['id_statut_init']
                            );
                }else{
                    
                    $cp_action_cv = new CpActionCv();

                    //gestion de la date
                    $now = date("Y-m-d H:i:s");

                    $cp_action_cv->setCpActionCvDateCreation($now);
                    $cp_action_cv->setCpActionCvDateModification($now);
                    $cp_action_cv->setCpActionCvDateEcheance($now);

                    $cp_action_cv->setCpActionCvCovoitureurId($formnew['cp_action_cv_covoitureur_id']);

                    $cp_action_cv->setCpActionCvDetail(sfConfig::get('app_mess_action_auto_equipage'));

                    $cp_action_cv->setCpActionCvCpTypeActionId($formnew['cp_action_cv_cp_type_action_id']);

                    $cp_action_cv->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());
                    $cp_action_cv->setCpActionCvTrajetId($formnew['cp_action_cv_trajet_id']);

                    $cp_action_cv->save();

                    //modification du trajet pour changement du statut si différent du statut initial
                    if($formnew['cp_type_action_statut_id'] != $formnew['id_statut_init']){
                        //recuperation du trajet et modification
                        $trajet = Doctrine_Core::getTable('Trajet')->find(array($formnew['cp_action_cv_trajet_id'] ));
                        $trajet->setCpTypeActionStatutId($formnew['cp_type_action_statut_id']);
                        $trajet->save();
                    }
                    
                    //message flash pour affichage utilisateur
                    $this->getUser()->setFlash('notice', sprintf(sfConfig::get('sf_message_action_realise')));

                    $this->redirect('equipage/show?popup=1&id_equipage=' . $formnew['id_equipage']);
                }
                
            }
            
        }

    }
    
    /*
     * action de creation d'une action à partir d'une equipage aprtes envoi de mail
     */
    public function executeCreateAutoApresMail(sfWebRequest $request) {
        //récupération des éléments passés
        $id_equipage                = $request->getParameter('id_equipage');
        $id_covoitureur             = $request->getParameter('id_covoitureur');
        $id_trajet                  = $request->getParameter('id_trajet');
        $cp_type_action_id          = $request->getParameter('cp_type_action_id');
        $cp_type_action_statut_id   = $request->getParameter('cp_type_action_statut_id');
        $id_statut_init             = $request->getParameter('id_statut_init');
        
        $this->forward404Unless($cpTypeAction = Doctrine_Core::getTable('CpTypeAction')->find(array($request->getParameter('cp_type_action_id'))), sprintf('Object CpTypeAction does not exist (%s).', $request->getParameter('cp_type_action_id')));       
         
         
        $cp_action_cv = new CpActionCv();

        //gestion de la date
        $now = date("Y-m-d H:i:s");

        $cp_action_cv->setCpActionCvDateCreation($now);
        $cp_action_cv->setCpActionCvDateModification($now);
        $cp_action_cv->setCpActionCvDateEcheance($now);

        $cp_action_cv->setCpActionCvCovoitureurId($id_covoitureur);

        $cp_action_cv->setCpActionCvDetail(sfConfig::get('app_mess_action_auto_equipage'));

        $cp_action_cv->setCpActionCvCpTypeActionId($cp_type_action_id);

        $cp_action_cv->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());
        $cp_action_cv->setCpActionCvTrajetId($id_trajet);

        $cp_action_cv->save();

        //modification du trajet pour changement du statut si différent du statut initial
        if($cp_type_action_statut_id != $id_statut_init){
            //recuperation du trajet et modification
            $trajet = Doctrine_Core::getTable('Trajet')->find(array($id_trajet));
            $trajet->setCpTypeActionStatutId($cp_type_action_statut_id);
            $trajet->save();
        }

        //message flash pour affichage utilisateur
        $this->getUser()->setFlash('notice', sprintf(sfConfig::get('sf_message_action_realise')));

        $this->redirect('equipage/show?popup=1&id_equipage=' . $id_equipage);
    }
    
    /*
     * gère la representation des actions en composant de formulaire
     * avec le statut passé (ajax)
     */
    public function executeListActionParStatut(sfWebRequest $request) {
        //$vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($request->getParameter('idstatut'));
        $typaActions = Doctrine_Core::getTable('CpTypeAction')->getActionParStatutParOrdre(null, $request->getParameter('idstatut'), 1, $execute = 1);
        
         $this->tab_action = array();
        
        foreach ($typaActions as $typaAction){
         
            $this->tab_action[$typaAction['cp_type_action_id']] = $typaAction['cp_type_action_nom'] ;
        }
        /*
         $this->tab_action[1] = $request->getParameter('idstatut');
         $this->tab_action[2] = "TEST 2";
         * 
         */
        
        //la sortie se fait directement dans le partial
        return $this->renderPartial('cp_action_cv/listActionParStatut', array('tab_action' => $this->tab_action, 'idComposantForm' => $request->getParameter('idComposantForm'), 'nomComposantForm' => $request->getParameter('nomComposantForm')));
        
    }
    
    /*
     * gère la representation des actions en composant de formulaire
     * avec le statut passé (ajax) en representant les lignes deja utilise par le covoitureur et le trajet
     * 
     * les fonctionnalités sont dans le compnent associé
     */
    public function executeListActionParStatutPourCovoitEtTrajet(sfWebRequest $request) {
        
        $this->id_statut = $request->getParameter('idstatut');
        $this->id_utilisateur = $request->getParameter('idcovoitureur');
        $this->id_trajet = $request->getParameter('idtrajet');
        $this->last_action = $request->getParameter('lastaction');
                        
    }
    
    /*
     * gère la representation des statut en composant de formulaire
     * avec le statut passé (ajax)
     */
    public function executeListStatutAction(sfWebRequest $request) {
        //$vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($request->getParameter('idstatut'));
        $typaActions = Doctrine_Core::getTable('CpTypeAction')->getActionParStatutParOrdre(null, $request->getParameter('idstatut'), 1, $execute = 1);
        
         $this->tab_action = array();
        
        foreach ($typaActions as $typaAction){
         
            $this->tab_action[$typaAction['cp_type_action_id']] = $typaAction['cp_type_action_nom'] ;
        }

        
        //la sortie se fait directement dans le partial
        return $this->renderPartial('cp_action_cv/listActionParStatut', array('tab_action' => $this->tab_action, 'idComposantForm' => $request->getParameter('idComposantForm'), 'nomComposantForm' => $request->getParameter('nomComposantForm')));
        
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $cp_action_cv = $form->save();
            
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $cp_action_cv->setCpActionCvDateCreation($now);
            }

            $cp_action_cv->setCpActionCvDateModification($now);

            $cp_action_cv->save();


            //$this->redirect('cp_action_cv/edit?cp_action_cv_id=' . $cp_action_cv->getCpActionCvId());

            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->redirect('cp_action_cv/visuCv?popup=1&cp_action_cv_id=' . $cp_action_cv->getCpActionCvId());
            } else {
                $this->redirect('cp_action_cv/visuCv?cp_action_cv_id=' . $cp_action_cv->getCpActionCvId());
            }
        }
    }

}
