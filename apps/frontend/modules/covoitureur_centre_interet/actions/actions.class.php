<?php

/**
 * covoitureur_centre_interet actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur_centre_interet
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureur_centre_interetActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->covoitureur_centre_interets = Doctrine_Core::getTable('CovoitureurCentreInteret')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->covoitureur_centre_interet = Doctrine_Core::getTable('CovoitureurCentreInteret')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->covoitureur_centre_interet);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CovoitureurCentreInteretForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CovoitureurCentreInteretForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($covoitureur_centre_interet = Doctrine_Core::getTable('CovoitureurCentreInteret')->find(array($request->getParameter('id'))), sprintf('Object covoitureur_centre_interet does not exist (%s).', $request->getParameter('id')));
    $this->form = new CovoitureurCentreInteretForm($covoitureur_centre_interet);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($covoitureur_centre_interet = Doctrine_Core::getTable('CovoitureurCentreInteret')->find(array($request->getParameter('id'))), sprintf('Object covoitureur_centre_interet does not exist (%s).', $request->getParameter('id')));
    $this->form = new CovoitureurCentreInteretForm($covoitureur_centre_interet);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($covoitureur_centre_interet = Doctrine_Core::getTable('CovoitureurCentreInteret')->find(array($request->getParameter('id'))), sprintf('Object covoitureur_centre_interet does not exist (%s).', $request->getParameter('id')));
    $covoitureur_centre_interet->delete();

    $this->redirect('covoitureur_centre_interet/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $covoitureur_centre_interet = $form->save();

      $this->redirect('covoitureur_centre_interet/edit?id='.$covoitureur_centre_interet->getId());
    }
  }
}
