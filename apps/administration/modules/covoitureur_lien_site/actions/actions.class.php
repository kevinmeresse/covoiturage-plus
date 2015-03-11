<?php

/**
 * covoitureur_lien_site actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur_lien_site
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureur_lien_siteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

    $this->pager = new sfDoctrinePager(
                        'CovoitureurLienSite',
                        sfConfig::get('app_max_lien_site_list')
        );
        $this->pager->setQuery(Doctrine::getTable('CovoitureurLienSite')->getCovoitureurLienSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->covoitureur_lien_site = Doctrine_Core::getTable('CovoitureurLienSite')->find(array($request->getParameter('id_covoitureur_lien_site')));
    $this->forward404Unless($this->covoitureur_lien_site);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CovoitureurLienSiteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CovoitureurLienSiteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($covoitureur_lien_site = Doctrine_Core::getTable('CovoitureurLienSite')->find(array($request->getParameter('id_covoitureur_lien_site'))), sprintf('Object covoitureur_lien_site does not exist (%s).', $request->getParameter('id_covoitureur_lien_site')));
    $this->form = new CovoitureurLienSiteForm($covoitureur_lien_site);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($covoitureur_lien_site = Doctrine_Core::getTable('CovoitureurLienSite')->find(array($request->getParameter('id_covoitureur_lien_site'))), sprintf('Object covoitureur_lien_site does not exist (%s).', $request->getParameter('id_covoitureur_lien_site')));
    $this->form = new CovoitureurLienSiteForm($covoitureur_lien_site);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($covoitureur_lien_site = Doctrine_Core::getTable('CovoitureurLienSite')->find(array($request->getParameter('id_covoitureur_lien_site'))), sprintf('Object covoitureur_lien_site does not exist (%s).', $request->getParameter('id_covoitureur_lien_site')));
    $covoitureur_lien_site->delete();

    $this->redirect('covoitureur_lien_site/index');
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
      $covoitureur_lien_site = $form->save();
      
      //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $covoitureur_lien_site->setDateCreation($now);

                //mise &agrave; jour du site
                $covoitureur_lien_site->setIdSiteClient(sfConfig::get('sf_id_site_client'));
            }

            $covoitureur_lien_site->save();

      $this->redirect('covoitureur_lien_site/edit?id_covoitureur_lien_site='.$covoitureur_lien_site->getIdCovoitureurLienSite());
    }
  }
}
