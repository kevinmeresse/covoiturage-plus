<?php

/**
 * evenement actions.
 *
 * @package    roulezmailn_v3
 * @subpackage evenement
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evenementActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->pager = new sfDoctrinePager(
                        'Evenement',
                        sfConfig::get('app_max_evenement_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Evenement')->getEvenementSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        $this->evenement = Doctrine_Core::getTable('Evenement')->find(array($request->getParameter('id_evenement')));
        $this->forward404Unless($this->evenement);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new EvenementForm();

        //initialisation des parametres par défaut pour les en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new EvenementForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($evenement = Doctrine_Core::getTable('Evenement')->find(array($request->getParameter('id_evenement'))), sprintf('Object evenement does not exist (%s).', $request->getParameter('id_evenement')));
        $this->form = new EvenementForm($evenement);

        //initialisation des parametres par défaut pour les en autocomplétion
        $this->tab_ville_autoc = array();
        
        if ($evenement->getIdCommune() != 0) {
            $ville = Doctrine_Core::getTable('VilleFr')->findOneByCodeInsee($evenement->getIdCommune());
            $this->tab_ville_autoc['ville'] = $ville->getNomVille();
        } else {
            $this->tab_ville_autoc['ville'] = '';
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($evenement = Doctrine_Core::getTable('Evenement')->find(array($request->getParameter('id_evenement'))), sprintf('Object evenement does not exist (%s).', $request->getParameter('id_evenement')));
        $this->form = new EvenementForm($evenement);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($evenement = Doctrine_Core::getTable('Evenement')->find(array($request->getParameter('id_evenement'))), sprintf('Object evenement does not exist (%s).', $request->getParameter('id_evenement')));
        $evenement->delete();

        $this->redirect('evenement/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $evenement = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $evenement->setDateCreation($now);

                //mise à jour du site
                $evenement->setIdSite(sfConfig::get('sf_id_site_client'));
            }

            //mise à jour de la date de modification
            $evenement->setDateModification($now);

            //extraction des infos entre parentheses
            $outil = new Util();

            //mise à jour des informations liées aux villes
            //ville départ
            $chaine = $outil->extractCpLibelle($form->getValue('ville'));
            $ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            $evenement->setIdCommune($ville->getCodeInsee());

            $evenement->save();

            $this->redirect('evenement/edit?id_evenement=' . $evenement->getIdEvenement());
        }
    }

}
