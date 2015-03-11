<?php

/**
 * contenu_actualite actions.
 *
 * @package    roulezmailn_v3
 * @subpackage contenu_actualite
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenu_actualiteActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        
        //indicateur d'inclusion du partial dans la liste des actualité (quand à 1) 
        //   non àdans le gestionnaire de contenu
        $this->ind_include = 0;

        $this->pager = new sfDoctrinePager(
                        'ContenuActualite',
                        sfConfig::get('app_max_actualite_list')
        );
        $this->pager->setQuery(Doctrine::getTable('ContenuActualite')->getActualiteSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        $this->contenu_actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($request->getParameter('id_actualite')));
        $this->forward404Unless($this->contenu_actualite);
        $this->setLayout('layout-visu');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new ContenuActualiteForm();
        
        //passage de parametre d'inclusion
        $this->ind_include = $request->getParameter('ind_include');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ContenuActualiteForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($this->contenu_actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($request->getParameter('id_actualite'))), sprintf('Object contenu_actualite does not exist (%s).', $request->getParameter('id_actualite')));
        $this->form = new ContenuActualiteForm($this->contenu_actualite);
        
        //passage de parametre d'inclusion
        $this->ind_include = $request->getParameter('ind_include');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($contenu_actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($request->getParameter('id_actualite'))), sprintf('Object contenu_actualite does not exist (%s).', $request->getParameter('id_actualite')));
        $this->form = new ContenuActualiteForm($contenu_actualite);
        
        //passage de parametre d'inclusion
        $this->ind_include = $request->getParameter('ind_include');

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($contenu_actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($request->getParameter('id_actualite'))), sprintf('Object contenu_actualite does not exist (%s).', $request->getParameter('id_actualite')));
        $contenu_actualite->delete();

        $this->redirect('contenu_actualite/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $contenu_actualite = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $contenu_actualite->setDateCreation($now);

                //génération de la clé
                $outil = New Util();
                $contenu_actualite->setCle($outil->genereCle('', ''));

                //mise à jour du créateur                
                $contenu_actualite->setIdCreateur($this->getUser()->getGuardUser()->getId());

                //mise à jour du site
                $contenu_actualite->setIdSite(sfConfig::get('sf_id_site_client'));
            }

            //mise à jour de la date de modification
            $contenu_actualite->setDateModification($now);

            $contenu_actualite->save();

            $this->redirect('contenu_actualite/edit?id_actualite=' . $contenu_actualite->getIdActualite());
        }
    }

}
