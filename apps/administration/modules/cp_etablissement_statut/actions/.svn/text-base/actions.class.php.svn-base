<?php

/**
 * cp_etablissement_statut actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_etablissement_statut
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_etablissement_statutActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->cp_etablissement_statuts = Doctrine_Core::getTable('CpEtablissementStatut')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CpEtablissementStatutForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpEtablissementStatutForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement_statut = Doctrine_Core::getTable('CpEtablissementStatut')->find(array($request->getParameter('cp_etablissement_statut_id'))), sprintf('Object cp_etablissement_statut does not exist (%s).', $request->getParameter('cp_etablissement_statut_id')));
        $this->form = new CpEtablissementStatutForm($cp_etablissement_statut);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_etablissement_statut = Doctrine_Core::getTable('CpEtablissementStatut')->find(array($request->getParameter('cp_etablissement_statut_id'))), sprintf('Object cp_etablissement_statut does not exist (%s).', $request->getParameter('cp_etablissement_statut_id')));
        $this->form = new CpEtablissementStatutForm($cp_etablissement_statut);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($cp_etablissement_statut = Doctrine_Core::getTable('CpEtablissementStatut')->find(array($request->getParameter('cp_etablissement_statut_id'))), sprintf('Object cp_etablissement_statut does not exist (%s).', $request->getParameter('cp_etablissement_statut_id')));
        $cp_etablissement_statut->delete();

        $this->redirect('cp_etablissement_statut/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");            

            $cp_etablissement_statut = $form->save();

            $cp_etablissement_statut->setCpEtablissementStatutDateModification($now);
            $cp_etablissement_statut->save();
            
            $this->redirect('cp_etablissement_statut/edit?cp_etablissement_statut_id=' . $cp_etablissement_statut->getCpEtablissementStatutId());
        }
    }

}
