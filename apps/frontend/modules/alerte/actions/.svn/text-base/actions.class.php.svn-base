<?php

/**
 * alerte actions.
 *
 * @package    roulezmailn_v3
 * @subpackage alerte
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class alerteActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->pager = new sfDoctrinePager(
                        'TrajetAlerte',
                        '20'
        );

        $this->pager->setQuery(Doctrine::getTable('TrajetAlerte')->getTrajetAlerteCovoitureurId($this->getUser()->getAttribute('id_covoitureur')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new TrajetAlerteForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new TrajetAlerteListForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($trajet_alerte = Doctrine_Core::getTable('TrajetAlerte')->find(array($request->getParameter('id_trajet_alerte'))), sprintf('Object trajet_alerte does not exist (%s).', $request->getParameter('id_trajet_alerte')));
        $this->form = new TrajetAlerteForm($trajet_alerte);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet_alerte = Doctrine_Core::getTable('TrajetAlerte')->find(array($request->getParameter('id_trajet_alerte'))), sprintf('Object trajet_alerte does not exist (%s).', $request->getParameter('id_trajet_alerte')));
        $this->form = new TrajetAlerteForm($trajet_alerte);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
//Validator        
//$request->checkCSRFProtection();

        $this->forward404Unless($trajet_alerte = Doctrine_Core::getTable('TrajetAlerte')->find(array($request->getParameter('id_trajet_alerte'))), sprintf('Object trajet_alerte does not exist (%s).', $request->getParameter('id_trajet_alerte')));
        $trajet_alerte->delete();

        $this->redirect('alerte/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $trajet_alerte = $form->save();
            $now = date("Y-m-d H:i:s");
            //a supprimer
            $trajet_alerte->setDateCreation($now);
            //mise à jour du site
            $trajet_alerte->setIdSite(sfConfig::get('sf_id_site_client'));

            //mise à jour de l'état du trajet (par défaut à 1)
            $trajet_alerte->setEtat(1);

            //extraction des infos entre parentheses
            $outil = new Util();
            $trajet_alerte->setCle($outil->genereCle('', ''));

            //mise a jour id covoitureur
            $trajet_alerte->setIdUtilisateur($this->getUser()->getAttribute('id_covoitureur'));

            //Mise à jour des villes de départs et de destination 
            $elemntRequete = $this->getUser()->getAttribute('elemntRequete');
            if ($elemntRequete['depart_ville'] != '') {

                $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);
                if ($tabCpVille['error_type'] == 0) {
                    $departVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    $trajet_alerte->setIdDepart('FR-'.$departVille[0]["id_ville"]);
                } else {
                    $departVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    $trajet_alerte->setIdDepart('FR-'.$departVille[0]["id_ville"]);
                }
            }

            if ($elemntRequete['destination_ville'] != '') {
                $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                if ($tabCpVille['error_type'] == 0) {
                    $destinationVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    $trajet_alerte->setIdDestination('FR-'.$destinationVille[0]["id_ville"]);
                } else {
                    $destinationVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    $trajet_alerte->setIdDestination('FR-'.$destinationVille[0]["id_ville"]);
                }
            }

            $trajet_alerte->save();





            $this->redirect('trajet/list');
        }
    }

}
