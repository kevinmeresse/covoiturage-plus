<?php

/**
 * cp_etablissement_horaire actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_etablissement_horaire
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_etablissement_horaireActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cp_etablissement_horaires = Doctrine_Core::getTable('CpEtablissementHoraire')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cp_etablissement_horaire = Doctrine_Core::getTable('CpEtablissementHoraire')->find(array($request->getParameter('cp_etablissement_horaire_id')));
    $this->forward404Unless($this->cp_etablissement_horaire);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CpEtablissementHoraireForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CpEtablissementHoraireForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cp_etablissement_horaire = Doctrine_Core::getTable('CpEtablissementHoraire')->find(array($request->getParameter('cp_etablissement_horaire_id'))), sprintf('Object cp_etablissement_horaire does not exist (%s).', $request->getParameter('cp_etablissement_horaire_id')));
    $this->form = new CpEtablissementHoraireForm($cp_etablissement_horaire);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cp_etablissement_horaire = Doctrine_Core::getTable('CpEtablissementHoraire')->find(array($request->getParameter('cp_etablissement_horaire_id'))), sprintf('Object cp_etablissement_horaire does not exist (%s).', $request->getParameter('cp_etablissement_horaire_id')));
    $this->form = new CpEtablissementHoraireForm($cp_etablissement_horaire);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cp_etablissement_horaire = Doctrine_Core::getTable('CpEtablissementHoraire')->find(array($request->getParameter('cp_etablissement_horaire_id'))), sprintf('Object cp_etablissement_horaire does not exist (%s).', $request->getParameter('cp_etablissement_horaire_id')));
    $cp_etablissement_horaire->delete();

    $this->redirect('cp_etablissement_horaire/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cp_etablissement_horaire = $form->save();

      $this->redirect('cp_etablissement_horaire/edit?cp_etablissement_horaire_id='.$cp_etablissement_horaire->getCpEtablissementHoraireId());
    }
  }
}
