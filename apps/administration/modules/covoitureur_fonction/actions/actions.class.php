<?php

/**
 * covoitureur_fonction actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur_fonction
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureur_fonctionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

    $this->pager = new sfDoctrinePager(
                        'CovoitureurFonction',
                        sfConfig::get('app_max_covoitureur_fonction_list')
        );
        $this->pager->setQuery(Doctrine::getTable('CovoitureurFonction')->getCovoitureurFonctionSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->covoitureur_fonction = Doctrine_Core::getTable('CovoitureurFonction')->find(array($request->getParameter('id_covoitureur_fonction')));
    $this->forward404Unless($this->covoitureur_fonction);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CovoitureurFonctionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CovoitureurFonctionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($covoitureur_fonction = Doctrine_Core::getTable('CovoitureurFonction')->find(array($request->getParameter('id_covoitureur_fonction'))), sprintf('Object covoitureur_fonction does not exist (%s).', $request->getParameter('id_covoitureur_fonction')));
    $this->form = new CovoitureurFonctionForm($covoitureur_fonction);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($covoitureur_fonction = Doctrine_Core::getTable('CovoitureurFonction')->find(array($request->getParameter('id_covoitureur_fonction'))), sprintf('Object covoitureur_fonction does not exist (%s).', $request->getParameter('id_covoitureur_fonction')));
    $this->form = new CovoitureurFonctionForm($covoitureur_fonction);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($covoitureur_fonction = Doctrine_Core::getTable('CovoitureurFonction')->find(array($request->getParameter('id_covoitureur_fonction'))), sprintf('Object covoitureur_fonction does not exist (%s).', $request->getParameter('id_covoitureur_fonction')));
    $covoitureur_fonction->delete();

    $this->redirect('covoitureur_fonction/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }
      

      
      
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $covoitureur_fonction = $form->save();
      
      //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $covoitureur_fonction->setDateCreation($now);

                //mise &agrave; jour du site
                $covoitureur_fonction->setIdSiteClient(sfConfig::get('sf_id_site_client'));
            }

            $covoitureur_fonction->save();

      $this->redirect('covoitureur_fonction/edit?id_covoitureur_fonction='.$covoitureur_fonction->getIdCovoitureurFonction());
    }
  }
}
