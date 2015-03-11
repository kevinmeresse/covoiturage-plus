<?php

/**
 * contenu_actualite_rubrique actions.
 *
 * @package    roulezmailn_v3
 * @subpackage contenu_actualite_rubrique
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenu_actualite_rubriqueActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {


        $this->pager = new sfDoctrinePager(
                        'ContenuActualiteRubrique',
                        sfConfig::get('app_max_actualite_rubrique_list')
        );
        $this->pager->setQuery(Doctrine::getTable('ContenuActualiteRubrique')->getActualiteRubriqueSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        $this->contenu_actualite_rubrique = Doctrine_Core::getTable('ContenuActualiteRubrique')->find(array($request->getParameter('id_actualite_rubrique')));
        $this->forward404Unless($this->contenu_actualite_rubrique);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new ContenuActualiteRubriqueForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ContenuActualiteRubriqueForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($contenu_actualite_rubrique = Doctrine_Core::getTable('ContenuActualiteRubrique')->find(array($request->getParameter('id_actualite_rubrique'))), sprintf('Object contenu_actualite_rubrique does not exist (%s).', $request->getParameter('id_actualite_rubrique')));
        $this->form = new ContenuActualiteRubriqueForm($contenu_actualite_rubrique);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($contenu_actualite_rubrique = Doctrine_Core::getTable('ContenuActualiteRubrique')->find(array($request->getParameter('id_actualite_rubrique'))), sprintf('Object contenu_actualite_rubrique does not exist (%s).', $request->getParameter('id_actualite_rubrique')));
        $this->form = new ContenuActualiteRubriqueForm($contenu_actualite_rubrique);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($contenu_actualite_rubrique = Doctrine_Core::getTable('ContenuActualiteRubrique')->find(array($request->getParameter('id_actualite_rubrique'))), sprintf('Object contenu_actualite_rubrique does not exist (%s).', $request->getParameter('id_actualite_rubrique')));
        $contenu_actualite_rubrique->delete();

        $this->redirect('contenu_actualite_rubrique/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $contenu_actualite_rubrique = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $contenu_actualite_rubrique->setDateCreation($now);

                //génération de la clé
                $outil = New Util();
                $contenu_actualite_rubrique->setCle($outil->genereCle('', ''));

                //mise &agrave; jour du créateur                
                $contenu_actualite_rubrique->setIdCreateur($this->getUser()->getGuardUser()->getId());

                //mise &agrave; jour du site
                $contenu_actualite_rubrique->setIdSite(sfConfig::get('sf_id_site_client'));
            }

            //mise &agrave; jour de la date de modification
            $contenu_actualite_rubrique->setDateModification($now);

            $contenu_actualite_rubrique->save();

            $this->redirect('contenu_actualite_rubrique/edit?id_actualite_rubrique=' . $contenu_actualite_rubrique->getIdActualiteRubrique());
        }
    }

}
