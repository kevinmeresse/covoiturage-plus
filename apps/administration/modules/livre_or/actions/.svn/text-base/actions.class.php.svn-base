<?php

/**
 * livre_or actions.
 *
 * @package    roulezmailn_v3
 * @subpackage livre_or
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class livre_orActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->livre_ors = Doctrine_Core::getTable('LivreOr')->getLivreOrSite();
    $this->livre_ors = Doctrine_Core::getTable('LivreOr')
      ->createQuery('a')
            ->where('id_site_client = ?', sfConfig::get('sf_id_site_client'))
     ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->livre_or = Doctrine_Core::getTable('LivreOr')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->livre_or);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LivreOrForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LivreOrForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($livre_or = Doctrine_Core::getTable('LivreOr')->find(array($request->getParameter('id'))), sprintf('Object livre_or does not exist (%s).', $request->getParameter('id')));
    $this->form = new LivreOrForm($livre_or);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($livre_or = Doctrine_Core::getTable('LivreOr')->find(array($request->getParameter('id'))), sprintf('Object livre_or does not exist (%s).', $request->getParameter('id')));
    $this->form = new LivreOrForm($livre_or);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($livre_or = Doctrine_Core::getTable('LivreOr')->find(array($request->getParameter('id'))), sprintf('Object livre_or does not exist (%s).', $request->getParameter('id')));
    $livre_or->delete();

    $this->redirect('livre_or/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $livre_or = $form->save();

      $this->redirect('livre_or/edit?id='.$livre_or->getId());
    }
  }
}
