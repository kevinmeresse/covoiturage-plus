<?php

/**
 * covoitureur_vehicule actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur_vehicule
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureur_vehiculeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        /*
          $this->covoitureur_vehicules = Doctrine_Core::getTable('CovoitureurVehicule')
          ->createQuery('a')
          ->execute();
         */
        $this->forward('covoitureur', 'list');
    }

    //liste des véhicules par covoitureurs avec gestion de la pagination
    public function executeList(sfWebRequest $request) {
        if ($request->getParameter('id_utilisateur') == 0 || $request->getParameter('id_utilisateur') == null || !$request->getParameter('id_utilisateur')) {
            $this->redirect('@homepage');
        }
        $this->pager = new sfDoctrinePager(
                        'CovoitureurVehicule',
                        sfConfig::get('app_max_covoitureur_vehicule_list')
        );

        $this->pager->setQuery(Doctrine::getTable('CovoitureurVehicule')->getVehiculeCovoitureur($request->getParameter('id_utilisateur')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
        //passage du parametre id_utilisateur
        $this->id_utilisateur = $request->getParameter('id_utilisateur');


    }

    public function executeNew(sfWebRequest $request) {
        if($request->getParameter('id_utilisateur') == 0 || $request->getParameter('id_utilisateur') == null || !$request->getParameter('id_utilisateur')){
            $this->redirect('@homepage');
        }
        
        $covoitureurvehicule = new CovoitureurVehicule();
        $covoitureurvehicule->setIdUtilisateur($request->getParameter('id_utilisateur'));

        $this->form = new CovoitureurVehiculeForm($covoitureurvehicule);
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $covoitureurvehicule = New CovoitureurVehicule();
        //génération de la clé
        $outil = New Util();
        $covoitureurvehicule->setCle($outil->genereCle('', ''));

        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $covoitureurvehicule->setDateCreation($now);

        $this->form = new CovoitureurVehiculeForm($covoitureurvehicule);

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($request->getParameter('id_vehicule'))), sprintf('Object covoitureur_vehicule does not exist (%s).', $request->getParameter('id_vehicule')));
        //$this->form = new CovoitureurVehiculeEditForm($covoitureur_vehicule);
        $this->form = new CovoitureurVehiculeForm($covoitureur_vehicule);

        //récupération du nom de l'utilisateur
        $this->nomUtilisateur = $covoitureur_vehicule->getCovoitureur()->getNom() . " " . $covoitureur_vehicule->getCovoitureur()->getPrenom();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($request->getParameter('id_vehicule'))), sprintf('Object covoitureur_vehicule does not exist (%s).', $request->getParameter('id_vehicule')));
        $this->form = new CovoitureurVehiculeForm($covoitureur_vehicule);

        $this->processForm($request, $this->form);

        //récupération du nom de l'utilisateur
        $this->nomUtilisateur = $covoitureur_vehicule->getCovoitureur()->getNom();

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($covoitureur_vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find(array($request->getParameter('id_vehicule'))), sprintf('Object covoitureur_vehicule does not exist (%s).', $request->getParameter('id_vehicule')));
        $covoitureur_vehicule->delete();

        $this->redirect('covoitureur_vehicule/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $covoitureur_vehicule = $form->save();

            $this->redirect('covoitureur_vehicule/edit?id_vehicule=' . $covoitureur_vehicule->getIdVehicule());
        }
    }

}
