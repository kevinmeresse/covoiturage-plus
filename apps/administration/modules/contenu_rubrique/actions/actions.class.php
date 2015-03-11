<?php

/**
 * contenu_rubrique actions.
 *
 * @package    roulezmailn_v3
 * @subpackage contenu_rubrique
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenu_rubriqueActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->pager = new sfDoctrinePager(
                        'ContenuRubrique',
                        sfConfig::get('app_max_rubrique_list')
        );
        $this->pager->setQuery(Doctrine::getTable('ContenuRubrique')->getRubriqueSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        $this->contenu_rubrique = Doctrine_Core::getTable('ContenuRubrique')->find(array($request->getParameter('id_rubrique')));
        $this->forward404Unless($this->contenu_rubrique);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new ContenuRubriqueForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ContenuRubriqueForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($contenu_rubrique = Doctrine_Core::getTable('ContenuRubrique')->find(array($request->getParameter('id_rubrique'))), sprintf('Object contenu_rubrique does not exist (%s).', $request->getParameter('id_rubrique')));
        $this->form = new ContenuRubriqueForm($contenu_rubrique);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($contenu_rubrique = Doctrine_Core::getTable('ContenuRubrique')->find(array($request->getParameter('id_rubrique'))), sprintf('Object contenu_rubrique does not exist (%s).', $request->getParameter('id_rubrique')));
        $this->form = new ContenuRubriqueForm($contenu_rubrique);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($contenu_rubrique = Doctrine_Core::getTable('ContenuRubrique')->find(array($request->getParameter('id_rubrique'))), sprintf('Object contenu_rubrique does not exist (%s).', $request->getParameter('id_rubrique')));
        $contenu_rubrique->delete();

        $this->redirect('contenu_rubrique/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }


        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $contenu_rubrique = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $contenu_rubrique->setDateCreation($now);

                //mise &agrave; jour du créateur                
                $contenu_rubrique->setIdAdministrateur($this->getUser()->getGuardUser()->getId());

                //mise &agrave; jour du site
                $contenu_rubrique->setIdSite(sfConfig::get('sf_id_site_client'));
                

                //mise &agrave; jour des permissions si l'utilisateur n'est pas admin
                if(!$this->getUser()->hasCredential("admin")){
                    $contenu_rubrique->setIdPerm(2);
                }
                
            }

            //mise &agrave; jour de la date de modification
            $contenu_rubrique->setDateModification($now);

            $contenu_rubrique->save();

            $this->redirect('contenu_rubrique/edit?id_rubrique=' . $contenu_rubrique->getIdRubrique());
        }
    }

}
