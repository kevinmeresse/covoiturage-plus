<?php

/**
 * csp actions.
 *
 * @package    roulezmailn_v3
 * @subpackage csp
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cspActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager(
                        'Csp',
                        sfConfig::get('app_max_csp_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Csp')->createQuery('a'));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->csp = Doctrine_Core::getTable('Csp')->find(array($request->getParameter('id_csp')));
    $this->forward404Unless($this->csp);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CspForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CspForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($csp = Doctrine_Core::getTable('Csp')->find(array($request->getParameter('id_csp'))), sprintf('Object csp does not exist (%s).', $request->getParameter('id_csp')));
    $this->form = new CspForm($csp);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($csp = Doctrine_Core::getTable('Csp')->find(array($request->getParameter('id_csp'))), sprintf('Object csp does not exist (%s).', $request->getParameter('id_csp')));
    $this->form = new CspForm($csp);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($csp = Doctrine_Core::getTable('Csp')->find(array($request->getParameter('id_csp'))), sprintf('Object csp does not exist (%s).', $request->getParameter('id_csp')));
    $csp->delete();

    $this->redirect('csp/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $csp = $form->save();

      $this->redirect('csp/edit?id_csp='.$csp->getIdCsp());
    }
  }
}
