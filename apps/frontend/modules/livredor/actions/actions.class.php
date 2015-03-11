<?php

/**
 * livredor actions.
 *
 * @package    roulezmailn_v3
 * @subpackage livredor
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class livredorActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        //Création de la pagination
        $this->pager = new sfDoctrinePager(
                        'LivreOr',
                        '10'
        );

        $this->pager->setQuery(Doctrine_Query::create()
                        ->from('LivreOr')
                        ->where('etat = 1 and id_site_client = ' . sfConfig::get('sf_id_site_client'))
                        ->orderBy('date_creation DESC'));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        $this->form = new LivreOrFrontForm();
        
        if($request->isMethod(sfRequest::POST)){
            $this->processForm($request, $this->form);
            
        }
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new LivreOrFrontForm();
    }
    
    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));


        $this->form = new LivreOrFrontForm();

        $this->processForm($request, $this->form);

        $this->forward('livredor', 'index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $livre_or = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");
            $livre_or->setDateCreation($now);

            //génération de la clé
            $outil = New Util();
            $livre_or->setCle($outil->genereCle('', ''));
            
            //validation automatique du livre d'or ???
            $livre_or->setEtat('1');

            //mise à jour du site
            $livre_or->setIdSiteClient(sfConfig::get('sf_id_site_client'));

            //Enregistrement des données
            $livre_or->save();

            //Rechargement de la page
            $this->getUser()->setFlash('notice', sprintf('Votre message a bien été publié.'));
            $this->redirect('livredor/index');
        }
    }

}
