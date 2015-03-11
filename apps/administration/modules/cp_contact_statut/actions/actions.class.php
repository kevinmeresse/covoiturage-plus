<?php

/**
 * cp_contact_statut actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_contact_statut
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_contact_statutActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cp_contact_statuts = Doctrine_Core::getTable('CpContactStatut')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CpContactStatutForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CpContactStatutForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cp_contact_statut = Doctrine_Core::getTable('CpContactStatut')->find(array($request->getParameter('cp_contact_statut_id'))), sprintf('Object cp_contact_statut does not exist (%s).', $request->getParameter('cp_contact_statut_id')));
    $this->form = new CpContactStatutForm($cp_contact_statut);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cp_contact_statut = Doctrine_Core::getTable('CpContactStatut')->find(array($request->getParameter('cp_contact_statut_id'))), sprintf('Object cp_contact_statut does not exist (%s).', $request->getParameter('cp_contact_statut_id')));
    $this->form = new CpContactStatutForm($cp_contact_statut);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cp_contact_statut = Doctrine_Core::getTable('CpContactStatut')->find(array($request->getParameter('cp_contact_statut_id'))), sprintf('Object cp_contact_statut does not exist (%s).', $request->getParameter('cp_contact_statut_id')));
    $cp_contact_statut->delete();

    $this->redirect('cp_contact_statut/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cp_contact_statut = $form->save();

      $this->redirect('cp_contact_statut/edit?cp_contact_statut_id='.$cp_contact_statut->getCpContactStatutId());
    }
  }
}
