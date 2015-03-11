<?php

/**
 * contenu actions.
 *
 * @package    roulezmailn_v3
 * @subpackage contenu
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenuActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->pager = new sfDoctrinePager(
                        'Contenu',
                        sfConfig::get('app_max_contenu_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Contenu')->getContenuSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        $this->contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu')));
        $this->forward404Unless($this->contenu);
    }
    
    public function executeVisualisation(sfWebRequest $request) {
        $this->contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu')));
        $this->forward404Unless($this->contenu);
        $this->setLayout('layout-visu');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new ContenuForm();

    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ContenuForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu'))), sprintf('Object contenu does not exist (%s).', $request->getParameter('id_contenu')));
        $this->form = new ContenuForm($contenu);
        

    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu'))), sprintf('Object contenu does not exist (%s).', $request->getParameter('id_contenu')));
        $this->form = new ContenuForm($contenu);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu'))), sprintf('Object contenu does not exist (%s).', $request->getParameter('id_contenu')));
        $contenu->delete();

        $this->redirect('contenu/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $contenu = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $contenu->setDateCreation($now);

                //génération de la clé
                $outil = New Util();
                $contenu->setCle($outil->genereCle('', ''));
                
                $contenu->setEtat(1);

                //mise à jour du créateur                
                $contenu->setIdCreateur($this->getUser()->getGuardUser()->getId());

                //mise à jour du site
                $contenu->setIdSite(sfConfig::get('sf_id_site_client'));
                
                //mise à jour des permissions si l'utilisateur n'est pas admin
                if(!$this->getUser()->hasCredential("admin")){
                    $contenu->setIdPerm(2);
                }
            }

            //mise à jour de la date de modification
            $contenu->setDateModification($now);

            $contenu->save();

            $this->redirect('contenu/edit?id_contenu=' . $contenu->getIdContenu());
        }
    }

}
