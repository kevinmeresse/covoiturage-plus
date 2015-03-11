<?php

/**
 * trajet_mise_en_relation actions.
 *
 * @package    roulezmailn_v3
 * @subpackage trajet_mise_en_relation
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trajet_mise_en_relationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //appel du form de recherche sur l'etat de la MER
      $this->form = new TrajetMiseEnRelationRechercheForm();

      //variable correspondante au parametre de recherche
      $this->parEtat = null;

    if($request->isMethod(sfRequest::POST)){//passage par le formulaire de recherche
        $formnew = $request->getParameter('trajet_mise_en_relation');
        $this->parEtat = $formnew['etat'];
        $this->form->setDefault('etat',$this->parEtat);
    }




    $this->pager = new sfDoctrinePager(
                        'TrajetMiseEnRelation',
                        sfConfig::get('app_max_trajet_mer_list')
        );
        $this->pager->setQuery(Doctrine::getTable('TrajetMiseEnRelation')->getTrajetMerSite(null,$this->parEtat ));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->trajet_mise_en_relation = Doctrine_Core::getTable('TrajetMiseEnRelation')->find(array($request->getParameter('id_trajet_mise_en_relation')));
    $this->forward404Unless($this->trajet_mise_en_relation);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TrajetMiseEnRelationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TrajetMiseEnRelationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($trajet_mise_en_relation = Doctrine_Core::getTable('TrajetMiseEnRelation')->find(array($request->getParameter('id_trajet_mise_en_relation'))), sprintf('Object trajet_mise_en_relation does not exist (%s).', $request->getParameter('id_trajet_mise_en_relation')));
    $this->form = new TrajetMiseEnRelationForm($trajet_mise_en_relation);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($trajet_mise_en_relation = Doctrine_Core::getTable('TrajetMiseEnRelation')->find(array($request->getParameter('id_trajet_mise_en_relation'))), sprintf('Object trajet_mise_en_relation does not exist (%s).', $request->getParameter('id_trajet_mise_en_relation')));
    $this->form = new TrajetMiseEnRelationForm($trajet_mise_en_relation);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($trajet_mise_en_relation = Doctrine_Core::getTable('TrajetMiseEnRelation')->find(array($request->getParameter('id_trajet_mise_en_relation'))), sprintf('Object trajet_mise_en_relation does not exist (%s).', $request->getParameter('id_trajet_mise_en_relation')));
    $trajet_mise_en_relation->delete();

    $this->redirect('trajet_mise_en_relation/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $trajet_mise_en_relation = $form->save();

      $this->redirect('trajet_mise_en_relation/edit?id_trajet_mise_en_relation='.$trajet_mise_en_relation->getIdTrajetMiseEnRelation());
    }
  }
}
