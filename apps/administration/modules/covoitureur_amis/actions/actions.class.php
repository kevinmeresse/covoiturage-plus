<?php

/**
 * covoitureur_amis actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur_amis
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureur_amisActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->pager = new sfDoctrinePager(
                        'CovoitureurAmis',
                        sfConfig::get('app_max_covoitureur_list')
        );
        $this->pager->setQuery(Doctrine::getTable('CovoitureurAmis')->getCovoitureurAmisSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        /*
          foreach($this->pager->getResults() as $value)
          {
          $this->value = print_r($value);
          }
         */
    }

    public function executeShow(sfWebRequest $request) {

        $this->covoitureur_amis = Doctrine_Core::getTable('CovoitureurAmis')->getCovoitureurAmisInfo($request->getParameter('id_covoitureur'), $request->getParameter('id_covoitureur_amis'));


        $this->forward404Unless($this->covoitureur_amis);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CovoitureurAmisForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CovoitureurAmisForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {

        $this->forward404Unless($covoitureur_amis = Doctrine_Core::getTable('CovoitureurAmis')->getCovoitureurAmisInfo($request->getParameter('id_covoitureur'), $request->getParameter('id_covoitureur_amis')), sprintf('Object covoitureur_amis does not exist (%s).', $request->getParameter('id_covoitureur'), $request->getParameter('id_covoitureur_amis')));

        $this->form = new CovoitureurAmisForm($covoitureur_amis);
        $this->form->setDefault('id_covoitureur_amis', $request->getParameter('id_covoitureur_amis'));


        //passage des éléments nécessitant un affichage
        $this->tabCovoitureur = array();
        $this->tabCovoitureur['covoitureur1'] = $covoitureur_amis->getNomc1() . " " . $covoitureur_amis->getPrenomc1();
        $this->tabCovoitureur['covoitureur2'] = $covoitureur_amis->getNomc2() . " " . $covoitureur_amis->getPrenomc2();
        $this->tabCovoitureur['idcovoitureur1'] = $request->getParameter('id_covoitureur');
        $this->tabCovoitureur['idcovoitureur2'] = $request->getParameter('id_covoitureur_amis');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($covoitureur_amis = Doctrine_Core::getTable('CovoitureurAmis')->find(array($request->getParameter('id_covoitureur'),
                    $request->getParameter('id_covoitureur_amis'))), sprintf('Object covoitureur_amis does not exist (%s).', $request->getParameter('id_covoitureur'), $request->getParameter('id_covoitureur_amis')));
        $this->form = new CovoitureurAmisForm($covoitureur_amis);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($covoitureur_amis = Doctrine_Core::getTable('CovoitureurAmis')->find(array($request->getParameter('id_covoitureur'),
                    $request->getParameter('id_covoitureur_amis'))), sprintf('Object covoitureur_amis does not exist (%s).', $request->getParameter('id_covoitureur'), $request->getParameter('id_covoitureur_amis')));
        $covoitureur_amis->delete();

        $this->redirect('covoitureur_amis/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $covoitureur_amis = $form->save();

            $this->redirect('covoitureur_amis/edit?id_covoitureur=' . $covoitureur_amis->getIdCovoitureur() . '&id_covoitureur_amis=' . $covoitureur_amis->getIdCovoitureurAmis());
        }
    }

}
