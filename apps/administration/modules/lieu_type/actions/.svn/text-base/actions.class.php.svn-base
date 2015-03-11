<?php

/**
 * lieu_type actions.
 *
 * @package    roulezmailn_v3
 * @subpackage lieu_type
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class lieu_typeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->lieu_types = Doctrine_Core::getTable('LieuType')
        ->createQuery('l')
        ->where('l.id_site_client = ?', sfConfig::get('sf_id_site_client'))
        ->andWhere('l.evenement = 0')
        ->execute();
    }
    public function executeIndexEvenement(sfWebRequest $request) {
        $this->lieu_types = Doctrine_Core::getTable('LieuType')
        ->createQuery('l')
        ->where('l.id_site_client = ?', sfConfig::get('sf_id_site_client'))
        ->andWhere('l.evenement = 1')        
        ->execute();
    }

    public function executeShow(sfWebRequest $request) {
        $this->lieu_type = Doctrine_Core::getTable('LieuType')->find(array($request->getParameter('id_lieu_type')));
        $this->forward404Unless($this->lieu_type);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new LieuTypeForm();
        
        if($request->getParameter('evenement') == 0){
            $this->form->setDefault('evenement', 0);
        }  else {
            $this->form->setDefault('evenement', 1);
        }
        
    }
    
    public function executeNewEvenement(sfWebRequest $request) {
        $this->form = new LieuTypeForm();
        $this->form->setDefault('evenement', 1);
        
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new LieuTypeForm();

        $this->processForm($request, $this->form);
        

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($lieu_type = Doctrine_Core::getTable('LieuType')->find(array($request->getParameter('id_lieu_type'))), sprintf('Object lieu_type does not exist (%s).', $request->getParameter('id_lieu_type')));
        $this->form = new LieuTypeForm($lieu_type);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($lieu_type = Doctrine_Core::getTable('LieuType')->find(array($request->getParameter('id_lieu_type'))), sprintf('Object lieu_type does not exist (%s).', $request->getParameter('id_lieu_type')));
        $this->form = new LieuTypeForm($lieu_type);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($lieu_type = Doctrine_Core::getTable('LieuType')->find(array($request->getParameter('id_lieu_type'))), sprintf('Object lieu_type does not exist (%s).', $request->getParameter('id_lieu_type')));
        $lieu_type->delete();
        
        if($request->getParameter('evenement') == 0){
            $this->redirect('lieu_type/index');
        }else{
            $this->redirect('lieu_type/indexEvenement');
        }

        
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $lieu_type = $form->save();

            if ($newInd == 1) {
                $lieu_type->setIdSiteClient(sfConfig::get('sf_id_site_client'));
            }
            $lieu_type->save();

            $this->redirect('lieu_type/edit?id_lieu_type=' . $lieu_type->getIdLieuType());
        }
    }

}
